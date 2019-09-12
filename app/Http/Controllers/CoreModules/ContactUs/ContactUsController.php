<?php

namespace App\Http\Controllers\CoreModules\ContactUs;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private $view   = 'core-modules.contactus.backend.';
    private $frontend_view = 'core-modules.contactus.frontend.';
    private $model = '\App\Http\Controllers\CoreModules\ContactUs\ContactUsModel';
    private $storage_folder = 'contactus';

    //

    public function __construct() {
        parent::__construct();
    }

    public function getFrontendContactUs() {
        $data = (new $this->model)->getContactUs();
        return view($this->frontend_view.'contact-us')
                ->with('data', $data);
    }

    public function getContactUs() {
        $data = (new $this->model)->getContactUs();
        return view($this->view.'contact-us')
                ->with('data', $data);
    }

    public function postContactUs() {
        $input = request()->all();
        $textarea = [];//['address', 'more_info', 'business_hours'];
        $data = $this->model::first();
        $data = is_null($data) ? (new $this->model) : $data;

        foreach($input['data'] as $property => $value) {

            $data->$property = in_array($property, $textarea) ? nl2br($value) : $value;
        }

        $data->save();

        session()->flash('success-msg', 'Details successfully updated');

        return redirect()->back();
    }

    
}
