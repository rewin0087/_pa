<?php
namespace App\Queues;

// model
use App\Models\FileUploads as FileUploadModel;
use App\Models\PaperTypes as PaperTypeModel;
use App\Models\PaperSizes as PaperSizeModel;
use App\Models\PaperColors as PaperColorModel;
use App\Models\PaperPricing as PaperPricingModel;

class Pricing {

    /**
    * Organize Data Array
    *
    */
    protected $_data = [];

    /**
    * Prepared Data Array
    *
    */
    protected $_preparedData = [];

    /*
    * Paper Type id
    *
    */
    protected $_paper_type_id = NULL;

    /**
    * Paper type model data
    *
    */
    protected $_paper_type = null;

    /**
    * Errors
    *
    */
    protected $_errors = [];

    /**
    * Upload path
    *
    */
    protected $_uploadPath = NULL;

    /**
    *
    *
    */
    protected $_p = [];

    /**
    * Queue Process
    *
    **/
    public function fire($job, $data)
    {
        # get paper type model
        $this->_paper_type = PaperTypeModel::find($data['paper_type']);
        \Log::info('Pricing queue firing...');
        try {
            \Log::info('Pricing queue starting...');
             $this->_uploadPath = app_path().'/storage/uploads';

            ini_set('memory_limit', '1G');
            
            # run work
            $this->doJob($data['file_pricing']);
            # set pricing file reload to done 
            $this->_paper_type->price_list_reloaded = 2;
            # set errors if there are errors
            if( !empty($this->_errors) )
            {
                $this->_paper_type->price_reload_errors = json_encode($this->_errors);    
            }
            
            # save paper type
            $this->_paper_type->save();
            # delete job
            $job->delete();
            ini_set('memory_limit', '128M');
        } catch (\Exception $e) {
            $this->_paper_type->price_list_reloaded = 2;
            # save paper type
            $this->_paper_type->save();
            
            $job->delete();
            \Log::info($e->getMessage());
        }
    }

    /**
     * resource/product/printing/paper-type/reloading/pricing
     *
     * @return Response
     */
    public function doJob($id) {
        # get the file
        $file = FileUploadModel::find($id);
        # set paper type id
        $this->_paper_type_id = $this->_paper_type->id;
        # locate excel file
        $path = $this->_uploadPath . '/files/excel/' . $file->file_path;

        if( !file_exists($path) )
        {
            \Log::info('Pricing queue: Pricing File does not exist. Please upload an excel file with a format for pricing file');

            return $this->_errors = [
                'message' => ' Pricing File does not exist. Please upload an excel file with a format for pricing file.'
            ];
        }

        # get all worksheet
        $worksheets = \PHPExcel_IOFactory::load($path)->getAllSheets();
        \Log::info('Pricing queue: getting all worksheets');
        # map entire worksheets
        array_map(function($worksheet) {
                $data = $worksheet->toArray(null, false, true, false);
                # get Organize Data
                return $this->_organizeData($data, $worksheet);
        }
        , $worksheets);

        if(isset($this->_inputs['type']) && $this->_inputs['type'] == 'array')
        {
            $this->_println($this->processData());
        }
        else {
            return $this->processData();    
        }

        \Log::info('Pricing queue: Done Job');
    }

    /**
    * Get Paper Size
    *
    * @param string 
    * @return array
    */
    private function _getPaperSizeByDexCode($dex_code)
    {
        $size = PaperSizeModel::dexCode($dex_code)->get()->first();

        if( isset($size->id) )
        {
            \Log::info('Pricing queue: Getting From Database: Size: ' . $size->dex_code);
            return $size;
        }

        \Log::info('Pricing queue: No paper size existed ' . $dex_code);
    }

    /**
    * Get Paper Color
    *
    * @param string 
    * @return array
    */
    private function _getPaperColorByDexCode($dex_code)
    {
        $color = PaperColorModel::dexCode($dex_code)->get()->first();

        if( isset($color->id) )
        {
            \Log::info('Pricing queue: Getting From Database: Color: ' . $color->dex_code);
            return $color;
        }

        \Log::info('Pricing queue: No Paper color existed ' . $dex_code);
    }

    /**
    * Prepare data to be save in the database
    * @return array
    */
    public function processData()
    {
        $data = $this->_data;

        \Log::info('Pricing queue: Start Data Process');

        if( !empty($data) ) 
        {
            \Log::info('Pricing queue: Start Mapping Worksheet');
            # get each worksheet
            array_map(function($worksheet)
            {
                # get data of the worksheet
                foreach($worksheet as $worksheet_name => $worksheet_data)
                {
                    $color = $this->_getPaperColorByDexCode($worksheet_name);

                    # if theres an error return error
                    if( !isset($color->id) )
                    {
                        \Log::info('Pricing queue: ' . ' Paper Color not found: ' . 
                        $worksheet_name . ' , It seems that theres something wrong with the data, please check your ' 
                        . 'file you have uploaded and make sure that the file has the correct format for ' 
                        . 'pricing file or please update paper colors from dex');
                        return $this->_errors = ['message' => ' Paper Color not found: ' . 
                        $worksheet_name . ' , It seems that theres something wrong with the data, please check your ' 
                        . 'file you have uploaded and make sure that the file has the correct format for ' 
                        . 'pricing file or please update paper colors from dex'];
                    }

                    \Log::info('Pricing queue: Getting Paper Color from Database: ' . $worksheet_name);
                    # check if data are not empty
                    if( !empty($worksheet_data) && (isset($worksheet_data['data']) && !empty($worksheet_data['data'])) )
                    {
                        # get params
                        $params = $worksheet_data['params'];
                        # get tat
                        $tat = $worksheet_data['tat'];
                        # get each data from the worksheet
                        foreach($worksheet_data['data'] as $row)
                        {
                            # check if there are values in the data
                            if( isset($row['values']) && !empty($row['values']) )
                            {   

                                # parse values now
                                for($i = 0; $i < $row['count']; $i++)
                                {
                                    $size = $this->_getPaperSizeByDexCode($params['values'][$i]);
                                    \Log::info('Pricing queue: Getting Paper Size -> '. $params['values'][$i]);

                                    if( !isset($size) )
                                    {
                                        return $this->_errors = ['message' =>  ' Paper Size not found: ' . 
                                        $params['values'][$i] . ' , It seems that theres something wrong with the data, ' 
                                        . 'please check your file you have uploaded and make sure that the file has the correct ' 
                                        . 'format for pricing file or please update paper sizes from dex'];
                                    }
                                    else
                                    {
                                        $record = [
                                            'paper_type_id' => $this->_paper_type_id,
                                            'paper_size_id' => $size->id,
                                            'quantity' => $row['quantity'],
                                            'paper_color_id' => $color->id,
                                            'tat' => $tat,
                                            'price' => $row['values'][$i],
                                            'status' => 2,
                                            'color' => $worksheet_name,
                                            'size' => $params['values'][$i]
                                        ];

                                        \Log::info('Pricing queue: pushing to collection: ' . json_encode($record));
                                        $this->_preparedData[] = $record;
                                    }
                                }
                            }
                        }
                    }
                }
            }, $data);
        }
        # if empty send an error
        else
        {
             return $this->_errors = [
                'message' => ' Please Check your file, It seems that theres something wrong or dont ' 
                . 'have the correct format for pricing file, please upload the an excel pricing file with correct format'
            ];
        }

        # save to database
        if( !empty($this->_preparedData) )
        {
            $data = $this->_preparedData;
            array_map(function($data){
                \Log::info('Pricing queue: Storing to pricing: ' . json_encode($data));
                $paperPricing = new PaperPricingModel;
                $paperPricing->fill($data)->save();
           }, $data);
        }

        \Log::info('Pricing queue: Done Data Processing');
        return $this->_preparedData;
    }

    /**
    * Organize data from the worksheet
    * @param array
    * @return self object 
    */
    private function _organizeData($data, $worksheet)
    {
        if( empty($data) && !isset($data[0]) )
        {
            return [];
        }

        # =============== get params array ===============
        $params = array_filter($data[0]);
        # remove first array
        array_shift($data);
        # reindex array params
        $params = array_values($params);
        # get days
        $days = $params[0];
        # remove first index of $params
        array_shift($params);
        
        # organize filtered data
        $organized_values = $this->_organizeDataValues($data, count($params));
        $worksheet_title = explode('|', $worksheet->getTitle());

        if( !isset($worksheet_title[0], $worksheet_title[1])  )
        {
             return $this->_errors = [
                'message' => ' Please Check your file, It seems that theres something wrong or dont have the correct format for pricing file, please upload the an excel pricing file with correct format'
            ];
        }

        $this->_data[] = [
             $worksheet_title[1] => [

                # set params header - Set as the header category of each data values
                'params' => [
                    'days' => $days,
                    'count' => count($params),
                    'values' => $params
                ],

                'tat' => $worksheet_title[0],

                # organized data to be filter
                'data' => $organized_values
            ]
        ];

        return $this;
    }

    /**
    * Organize Pricing data to more scale values
    * @params array
    * @param counter
    * @return array
    */
    private function _organizeDataValues($data, $field_count)
    {
        return array_map(function($row) {
            # get quantity data
            $quantity = $row[0];
            # remove from array now
            array_shift($row);
            # get values
            $values = array_filter($row);
            return [
                'quantity' => $quantity,
                'count' => count($values),
                'values' => $values
            ];
        }, $data);
    }
}