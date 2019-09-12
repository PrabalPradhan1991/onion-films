<?php

namespace App\Http\Controllers\CoreModules\Slider;

use Illuminate\Database\Eloquent\Model;

class SliderModel extends Model
{
    protected $table = 'core_slider';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function getRule($id=NULL) {
    	$rule = [
    		'mime'	=>	[''],
    		'string'	=>	[''],
    		'link'	=>	[''],
    		'asset'	=>	['required', 'mimes:png,webp,jpg,mp4,webm']
    	];

        if($id) {
            $rule['asset'] = ['mimes:png,webp,jpg,mp4,webm'];
        }

    	return $rule;
    }
}