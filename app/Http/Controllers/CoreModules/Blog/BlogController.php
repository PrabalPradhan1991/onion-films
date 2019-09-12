<?php

namespace App\Http\Controllers\CoreModules\Blog;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $view   = 'core-modules.blog.backend.';
    private $frontend_view = 'core-modules.blog.frontend.';
    private $model = '\App\Http\Controllers\CoreModules\Blog\BlogModel';
    private $storage_folder = 'blog';

    //

    public function __construct() {
        parent::__construct();
    }

    public function getFrontendBlogs() {
        $search = request()->get('search');

        $blogs = $this->model::orderBy('publish_date', 'DESC');
        if(isset($search['author']) && strlen($search['author'])) {
            $blogs = $blogs->where('author', 'LIKE', '%'.$search['author'].'%');
        }

        if(isset($search['start_date']) && strlen($search['start_date'])) {
            $blogs = $blogs->where('publish_date', '>=', $search['start_date']);
        }

        if(isset($search['end_date']) && strlen($search['end_date'])) {
            $blogs = $blogs->where('publish_date', '<=', $search['end_date']);
        }

        if(isset($search['tags']) && strlen($search['tags'])) {
            $tags = \App\Http\Controllers\HelperController::tagEncode($search['tags']);
            $tags = explode(',', $tags);
            foreach($tags as $t) {
                $blogs = $blogs->where('tags', 'LIKE', '%'.$t.'%');    
            }
        }

        $blogs = $blogs->paginate(6);

        return view($this->frontend_view.'blogs')
                ->with('blogs', $blogs);
    }

    public function getFrontendBlog($slug) {
        $blog = $this->model::where('slug', $slug)->firstOrFail();

        return view($this->frontend_view.'blog')
                ->with('blog', $blog);
    }

    public function getListView() {
        $data = BlogModel::orderBy('id', 'DESC')->get();

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
            $input['data']['tags'] = \App\Http\Controllers\HelperController::tagEncode($input['data']['tags']);
            $record = $this->model::create($input['data']);
            $record->slug = str_slug($record->title).'-'.$record->id;
            $record->save();
            session()->flash('success-msg', 'Client successfully created!');
            return redirect()->back();
        }
    }

    public function getEditView($id) {
        $data = $this->model::where('id', $id)->firstOrFail();
        $data->tags = \App\Http\Controllers\HelperController::tagDecode($data->tags);

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
            $input['data']['slug'] = str_slug($input['data']['title']).'-'.$id;
            $input['data']['tags'] = \App\Http\Controllers\HelperController::tagEncode($input['data']['tags']);
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
        }
        session()->flash('success-msg', 'Client successfully deleted');

        return redirect()->back();
    }
}
