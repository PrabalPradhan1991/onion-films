<?php

namespace App\Http\Controllers\CoreModules\HowWeWork;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HowWeWorkController extends Controller
{
    private $view   = 'core-modules.howwework.backend.';
    private $frontend_view = 'core-modules.howwework.frontend.';
    private $model = '\App\Http\Controllers\CoreModules\HowWeWork\HowWeWorkModel';
    private $storage_folder = 'how-we-work';

    //

    public function __construct() {
        parent::__construct();
    }

    public function getFrontendHowWeWork() {
        $data = (new $this->model)->getHowWeWork();
        return view($this->frontend_view.'how-we-work')
                ->with('data', $data);
    }

    public function getHowWeWork() {
        $data = (new $this->model)->getHowWeWork();
        return view($this->view.'how-we-work')
                ->with('data', $data);
    }

    public function postHowWeWork() {
        $input = request()->all();
        $textarea = [];//['address', 'more_info', 'business_hours'];
        $data = $this->model::first();
        $data = is_null($data) ? (new $this->model) : $data;

        if(request()->has('data.asset')) {
            request()->file('data.asset')->store($this->storage_folder);
            $input['data']['asset'] = request()->file('data.asset')->hashName();  
              
        }
        
        foreach($input['data'] as $property => $value) {

            $data->$property = in_array($property, $textarea) ? nl2br($value) : $value;
        }
        

        $data->save();

        session()->flash('success-msg', 'Successfully updated');

        return redirect()->back();
    }

    
}
