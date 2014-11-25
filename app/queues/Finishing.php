<?php
namespace App\Queues;

// model
use App\Models\FileUploads as FileUploadModel;
use App\Models\PaperTypes as PaperTypeModel;
use App\Models\PaperSizes as PaperSizeModel;
use App\Models\PaperFinishing as PaperFinishingModel;
use App\Models\FinishingProductions as FinishingProductionModel;
use App\Models\FinishingProductionsCategory as FinishingProductionsCategoryModel;

class Finishing {

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
    * finishing productions
    *
    */
    protected $_finishing_productions = [];

    /**
    * finishing productions category
    *
    */
    protected $_finishing_productions_category = [];

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
    * Queue Process
    *
    **/
    public function fire($job, $data)
    {

        # get paper type model
        $this->_paper_type = PaperTypeModel::find($data['paper_type']);
        \Log::info('Finishing queue firing...');

        try {
            \Log::info('Finishing queue starting...');
            $this->_uploadPath = app_path().'/storage/uploads';
            ini_set('memory_limit', '1G');
            # run work
            $this->doJob($data['file_finishing']);
            # set finishing file reload to done 
            $this->_paper_type->finishing_list_reloaded = 2;
            # set errors if there are errors
            if( !empty($this->_errors) )
            {
                $this->_paper_type->finishing_reload_errors = json_encode($this->_errors);    
            }
            
            # save paper type
            $this->_paper_type->save();
            # delete job
            $job->delete();
            ini_set('memory_limit', '128M');
        } catch (\Exception $e) {
            $this->_paper_type->finishing_list_reloaded = 2;
            # save paper type
            $this->_paper_type->save();
            
            $job->delete();
            \Log::info($e->getMessage());
        }
    }

    /**
     * Run the job
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
            \Log::info('Finishing File does not exist. Please upload an excel file with a format for finishing file');
            return $this->_errors = [
                'message' => ' Finishing File does not exist. Please upload an excel file with a format for finishing file.'
            ];
        }
        
        # get all worksheet
        $worksheets = \PHPExcel_IOFactory::load($path)->getAllSheets();
        \Log::info('Finishing queue: gettting all worksheets');
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
        else 
        {
            return $this->processData();    
        }
        
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
            \Log::info('Finishing queue: Getting From Database: Size: ' . $size->dex_code);
            return $size;
        }

        \Log::info('Finishing queue: No Paper size existed ' . $dex_code);
    }

    /**
    * Prepare data to be save in the database
    * @return array
    */
    public function processData()
    {
        $data = $this->_data;

        \Log::info('Finishing queue: Start Data Process');

        if( !empty($data) ) 
        {
            \Log::info('Finishing queue: Start Mapping Worksheet');
            # get each worksheet
            foreach($data as $worksheet)
            {
                # get data of the worksheet
                foreach($worksheet as $worksheet_name => $worksheet_data)
                {
                    \Log::info('Finishing queue: Start Mapping worksheet -> ' . $worksheet_name);
                    # check if data are not empty and process worksheet
                    $processWorksheet = $this->_processWorksheet($worksheet_name, $worksheet_data);

                    # return if theres an error
                    if( isset($processWorksheet) ) 
                    {
                        \Log::info('Finishing queue: Error occured ' . json_encode($processWorksheet) );
                        return $processWorksheet;
                    }
                }
            }
        }

        # if theres a data, save to database
        if( !empty($this->_preparedData['data']) )
        {
            \Log::info('Finishing queue: Saving to Database -> paper finishing');
            # set paper finishing data
            $this->_preparedData['data'] = array_map(function($finishing) {
                $newFinishing = new PaperFinishingModel;
                \Log::info('Finishing queue: Creating ' . json_encode($finishing));
                return $newFinishing->fill($finishing)->save();
            }, $this->_preparedData['data']);

            # set finishing_productions data
            $this->_preparedData['finishing_productions'] = $this->_processFinishingProductions();
            # set finishing_productions_productions data
            $this->_preparedData['finishing_productions_category'] = $this->_processFinishingProductionsCategory();
        }

        return $this->_preparedData;
    }

    /*
    * Process Finishing Productions Category
    *
    */
    private function _processFinishingProductionsCategory()
    {
        $category = [];
        # map entire data
        if( !empty($this->_finishing_productions_category) )
        {
            \Log::info('Finishing queue: Starting to process finishing productions category');
            # map each record and create or return data if exists
            $category = array_map(function($category) {
                \Log::info('Finishing queue: Creating/ Updating' . json_encode($category));
                return FinishingProductionsCategoryModel::firstOrCreate($category);
            }, $this->_finishing_productions_category);
        }

        \Log::info('Finishing queue: Finishing processing finishing production cateogries');
        return $category;
    }
    /**
    * Process Finishing Productions
    *
    */
    private function _processFinishingProductions()
    {
        $production = [];
        # check if main array not empty
        if( !empty($this->_finishing_productions) )
        {
            # map each finishing data
            foreach( $this->_finishing_productions as $finishing )
            {
                # check if finishing data not empty
                if( !empty($finishing) )
                {
                    # extract values
                    foreach($finishing as $category_name => $values)
                    {
                        if( !empty($values) )
                        {
                            # get each values and combine with category_name
                            foreach($values as $value)
                            {
                                \Log::info('Finishing queue: Creating '. $value . ' category: ' . $category_name);
                                $production[] = FinishingProductionModel::firstOrCreate([
                                    'info' => $value,
                                    'category_name' => $category_name
                                ]);

                            }
                        }
                    }
                }
            }
        }

        \Log::info('Finishing queue: Finishing Processing finishing production');
        return $production;
    }

    /**
    * Process organize worksheet data
    * @param string
    * @param array
    * @return void
    */
    private function _processWorksheet($worksheet_name, $worksheet_data)
    {
        # check if data are not empty
        if( !empty($worksheet_data) && (isset($worksheet_data['data']) && !empty($worksheet_data['data'])) )
        {
            \Log::info('Finishing queue: Getting Params');
            # get params
            $params = $worksheet_data['params'];
            \Log::info('Finishing queue: Getting Finishing');
            # get finishing
            $finishing = $worksheet_data['finishing'];
            \Log::info('Finishing queue: Getting min prices');
            # get min price
            $min_price = $worksheet_data['min_price'];
            \Log::info('Finishing queue: Getting min folded size');
            # get min folded size
            $min_folded_size = $worksheet_data['min_folded_size'];
            \Log::info('Finishing queue: Mapping data');
            # get each data from the worksheet
            foreach($worksheet_data['data'] as $row)
            {
                # check if there are values in the data
                if( isset($row['values']) && !empty($row['values']) )
                {   
                    # counter for other array
                    $counter = 0;
                    # parse values now
                    for($i = 0; $i < $row['count']; $i++)
                    {
                        # check if both xby and tat has values
                        if( $i & 1 && ($row['values'][$i - 1] != 'x' && $row['values'][$i] != 'x'))
                        {
                            if( !isset($this->_getPaperSizeByDexCode($row['size'])->id) )
                            {
                                \Log::info('Finishing queue: Error not found ' . $row['size']);
                                return $this->_errors = [
                                    'message' => ' Paper Size not found: ' . $row['size'] . ' , It seems that theres something wrong with the data, please check your file you have uploaded and make sure that the file has the correct format for finishing file or please update paper sizes from dex'
                                ];
                            }
                            else
                            {
                                # set record
                                $record = [
                                    'price_per_copy' => $row['values'][$i - 1],
                                    'turn_around' => $row['values'][$i],
                                    'production_category' => $worksheet_name,
                                    'productions' => $finishing['values'][$counter],
                                    'min_folded_size' => $min_folded_size['values'][$counter],
                                    'minimum_price_needed' => $min_price['values'][$counter],
                                    'paper_type_id' => $this->_paper_type_id,
                                    'paper_size_id' => $this->_getPaperSizeByDexCode($row['size'])->id,
                                    'status' => 2
                                ];

                                \Log::info('Finishing queue: Setting Data: ' . json_encode($record));
                                # save it now to object array
                                $this->_preparedData['data'][] = $record;

                                $counter++;
                            }
                        }
                    }
                }
            }
        }
        else
        {
             return $this->_errors = [
                'message' => ' Please Check your file, It seems that theres something wrong or dont have the correct format for pricing file, please upload the an excel pricing file with correct format'
            ];
        }

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

        # =============== get finishing array ===============
        $finishing = array_filter($data[0]);
        # remove second array
        array_shift($data);
        # get finishing title
        $finishing_title = $finishing[0];
        # remove first index
        array_shift($finishing);

        # =============== get min price array ===============
        $min_price = array_filter($data[0]);
        # remove third array
        array_shift($data);
        # get finishing title
        $min_price_title = $min_price[0];
        # remove first index
        array_shift($min_price);

        # =============== get min folded size array ===============
        $min_folded_size = array_filter($data[0]);
        # remove third array
        array_shift($data);
        # get finishing title
        $min_folded_size_title = $min_folded_size[0];
        # remove first index
        array_shift($min_folded_size);

        # organize filtered data
        $organize_values = $this->_organizeDataValues($data, count($params));

        # set finishing productions
        $this->_finishing_productions[] = [
            $worksheet->getTitle() => $finishing
        ];

        # set finishing productions category name
        $this->_finishing_productions_category[] = [
            'code_name' => $worksheet->getTitle()
        ];

        $this->_data[] = [
             $worksheet->getTitle() => [

                # set params header - Set as the header category of each data values
                'params' => [
                    'count' => count($params),
                    'values' => $params
                ],

                # size / folding header - set as the folding data of each data values 
                'finishing' => [
                    'count' => count($finishing),
                    'title' => $finishing_title,
                    'values' => $finishing
                ],

                # min price header - set as the price of each data values
                'min_price' => [
                    'count' => count($min_price),
                    'title' => $min_price_title,
                    'values' => $min_price
                ],

                # size param header - set as the size param to be use for each data values
                'min_folded_size' => [
                    'count' => count($min_folded_size),
                    'title' => $min_folded_size_title,
                    'values' => $min_folded_size
                ],

                # organize data to be filter
                'data' => $organize_values
            ]
        ];

        return $this;
    }

    /**
    * Organize Finishing data to more scale values
    * @params array
    * @param counter
    * @return array
    */
    private function _organizeDataValues($data, $field_count)
    {
        return array_map(function($row) {
            # get size data
            $size = $row[0];
            # remove from array now
            array_shift($row);
            # get values
            $values = array_filter($row);
            return [
                'size' => $size,
                'count' => count($values),
                'values' => $values
            ];
        }, $data);
    }
}