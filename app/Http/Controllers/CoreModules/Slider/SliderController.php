<?php

namespace App\Http\Controllers\CoreModules\Slider;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    private $view   = 'core-modules.slider.backend.';
    private $frontend_view = 'core-modules.slider.frontend.';
    private $model = '\App\Http\Controllers\CoreModules\Slider\SliderModel';
    private $storage_folder = 'slider';

    //

    public function __construct() {
        parent::__construct();
        \View::share('client_storage_folder', $this->storage_folder);
    }

    public function getListView() {
        $data = SliderModel::orderBy('id', 'DESC')->get();

        return view()->make($this->view.'list')
                    ->with('data', $data);
    }

    public function getCreateView() {
        return view()->make($this->view.'create');
    }

    public function postCreateView() {
        $input = request()->all();

        $validator = \Validator::make($input['data'], (new $this->model)->getRule());

        if($validator->fails()) {
            session()->flash('friendly-error-msg', 'There are some validation errors');
            return redirect()->back()->withErrors($validator)
                                     ->withInput();
        } else {
            request()->file('data.asset')->store($this->storage_folder);
            $input['data']['asset'] = request()->file('data.asset')->hashName();
            $input['data']['mime'] = mime_content_type(base_path().'/storage/app/'.$this->storage_folder.'/'.$input['data']['asset']);
            $record = $this->model::create($input['data']);
            session()->flash('success-msg', 'Slider successfully created!');
            return redirect()->back();
        }
    }

    public function getEditView($id) {
        $data = $this->model::where('id', $id)->firstOrFail();

        return view()->make($this->view.'edit')
                    ->with('data', $data);
    }

    public function postEditView($id) {
        $data = $this->model::where('id', $id)->firstOrFail();
        $input = request()->all();

        $validator = \Validator::make($input['data'], (new $this->model)->getRule($id));

        if($validator->fails()) {
            session()->flash('friendly-error-msg', 'There are some validation errors');
            return redirect()->back()->withErrors($validator)
                                     ->withInput();
        } else {
            if(request()->hasFile('data.asset')) {
                request()->file('data.asset')->store($this->storage_folder);
                $input['data']['asset'] = request()->file('data.asset')->hashName();
                $input['data']['mime'] = mime_content_type(base_path().'/storage/app/'.$this->storage_folder.'/'.$input['data']['asset']);
            }
            $record = $this->model::where('id', $id)->update($input['data']);
            session()->flash('success-msg', 'Slider successfully edited!');
            return redirect()->back();
        }


    }

    public function postDeleteView($id) {
        $record = $this->model::where('id', $id)->first();
        $filename = $record->asset;
        $record->delete();
        try {
            @unlink(storage_path().'/'.'app/'.$this->storage_folder.'/'.$filename);
        } catch(\Exception $e) {
            //do nothing
        }
        session()->flash('success-msg', 'Slider successfully deleted');

        return redirect()->back();
    }
}
