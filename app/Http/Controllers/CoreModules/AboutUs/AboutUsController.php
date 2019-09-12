<?php

namespace App\Http\Controllers\CoreModules\AboutUs;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    private $view   = 'core-modules.about-us.backend.';
    private $frontend_view = 'core-modules.about-us.frontend.';
    private $model = '\App\Http\Controllers\CoreModules\AboutUs\AboutUsModel';
    private $storage_folder = 'about-us';

    //

    public function __construct() {
        parent::__construct();
    }

    public function getFrontendAboutUs() {
        $data = (new $this->model)->getAboutUs();
        return view($this->frontend_view.'about-us')
                ->with('data', $data);
    }

    public function getAboutUs() {
        $data = (new $this->model)->getAboutUs();
        return view($this->view.'about-us')
                ->with('data', $data);
    }

    public function postAboutUs() {
        $input = request()->all();
        $textarea = [];//['address', 'more_info', 'business_hours'];
        $data = $this->model::first();
        $data = is_null($data) ? (new $this->model) : $data;

        if(request()->hasFile('data.asset')) {
            request()->file('data.asset')->store('about-us');
            $input['data']['asset'] = request()->file('data.asset')->hashName();
        }
        foreach($input['data'] as $property => $value) {

            $data->$property = in_array($property, $textarea) ? nl2br($value) : $value;
        }

        $data->save();

        session()->flash('success-msg', 'Details successfully updated');

        return redirect()->back();
    }

    
}
