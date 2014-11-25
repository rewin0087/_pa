<?php
namespace App\Controllers\Control\Resource\Features\Utility;

use App\Controllers\Control as Control;
// models
use App\Models\PaperPrinters as PaperPrinterModel;

class PrinterManagement extends Control {

    /**
     * Display a listing of the resource.
     * GET /resource/features/utility/paper-management
     *
     * @return Response
     */
    public function index() {
        //
        return PaperPrinterModel::all();
    }

    /**
     * Store a newly created resource in storage.
     * POST /resource/features/utility/paper-management/
     *
     * @return Response
     */
    public function store() {
        //
        return $this->_save();
    }

    /**
     * Update the specified resource in storage.
     * PUT /resource/features/utility/paper-management/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        return $this->_save(true, $id);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /resource/features/utility/paper-management/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) 
    {
        //
        $printer = PaperPrinterModel::find($id);
        $printer->delete();

        return $printer;
    }

    /**
     * Validation
     *
     * @param array
     * @return object
     */
    private function _validator($data) 
    {
        # set rules
        $rules = [
            'name' => ['required'],
            'description' => ['required'],
            'api_settings' => ['required', 'url']
        ];

        # validator
        return \Validator::make($data, $rules);
    }

    /**
    * Save | Update
    *
    */
    private function _save($update = false, $id = NULL)
    {
        $inputs = $this->_inputs;
        
        # check if there's a data pass
        if( !empty($inputs) )
        {
             # validator
            $validator = $this->_validator($inputs);

            # return error if there are errors
            if($validator->fails())
            {
                return $this->_setResponse([
                    'message' => $validator->messages()->first()
                ], 500);
            }

            # save 
            else
            {
                $printer = null;

                # do update
                if($update)
                {
                    $printer = PaperPrinterModel::find($id);
                }

                # do create new
                else
                {
                    $printer = new PaperPrinterModel;
                }

                $printer->fill($this->_inputs);
                # save now
                $printer->save();
                # return saved data
                return $printer;
            }
        }

        # return error if there are errors
        return $this->_setResponse([
            'message' => 'Configuration must not empty.'
        ], 500);
    }
}
