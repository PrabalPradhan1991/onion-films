<?php

namespace App\Http\Controllers\CoreModules\Service;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $view   = 'core-modules.service.backend.';
    private $frontend_view = 'core-modules.service.frontend.';
    private $model = '\App\Http\Controllers\CoreModules\Service\ServiceModel';
    public function getListView() {
        $data = ServiceModel::orderBy('ordering', 'ASC')->get();

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
            $record = $this->model::create($input['data']);
            session()->flash('success-msg', 'Service successfully created!');
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
            $record = $this->model::where('id', $id)->update($input['data']);
            session()->flash('success-msg', 'Service successfully edited!');
            return redirect()->back();
        }
    }

    public function postDeleteView($id) {
        $this->model::where('id', $id)->delete();
        session()->flash('success-msg', 'Service successfully deleted');

        return redirect()->back();
    }
}
