<?php

namespace App\Http\Controllers\CoreModules\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'core_blogs';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function getRule($id=NULL) {
    	$rule = [
    		'title'	=>	'required',
    		'sub_title'	=>	'required',
    		'short_description'	=>	'required',
            'long_description' =>  'required',
            'tags'  =>  'required',
            'is_active' =>  ['required', 'in:yes,no'],
            'author'    =>  ['required'],
            'publish_date'  => ['date', 'date_format:Y-m-d'],
    		'asset'	=>	['required', 'mimes:png,webp,jpeg']
    	];

        if($id) {
            $rule['asset'] = ['mimes:png,webp,jpeg'];
        }

    	return $rule;
    }
}