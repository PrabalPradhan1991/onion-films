<?php

namespace App\Http\Controllers\CoreModules\Events;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EventsController extends Controller
{
    private $view   = 'core-modules.events.backend.';
    private $frontend_view = 'core-modules.events.frontend.';
    private $model = '\App\Http\Controllers\CoreModules\Events\EventsModel';
    private $storage_folder = 'events';

    //

    public function __construct() {
        parent::__construct();
        \View::share('event_storage_folder', $this->storage_folder);
    }

    public function getFrontendSingleEvent($id) {
        $event = $this->model::where('id', $id)->firstOrFail();

        return view($this->frontend_view.'single-event')
                ->with('event', $event);
    }

    public function getFrontendEvents() {
        
        $events = $this->model::orderBy('start_date', 'DESC')->paginate(9);

        return view($this->frontend_view.'events')
                ->with('events', $events);   
    }

    public function getListView() {
        $data = EventsModel::orderBy('ordering', 'ASC')->get();

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
            $record = $this->model::create($input['data']);
            session()->flash('success-msg', 'Client successfully created!');
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
            }
            $record = $this->model::where('id', $id)->update($input['data']);
            session()->flash('success-msg', 'Client successfully edited!');
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
            echo $e->getMessage();
            die('here');
        }
        session()->flash('success-msg', 'Client successfully deleted');

        return redirect()->back();
    }
}
