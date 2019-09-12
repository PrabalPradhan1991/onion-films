<?php

namespace App\Http\Controllers\CoreModules\Events;

use Illuminate\Database\Eloquent\Model;

class EventsModel extends Model
{
    protected $table = 'core_events';
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
    		'short_description'	=>	'',
    		'long_description'	=>	'required',
    		'asset'	=>	['required', 'mimes:png,webp,jpeg'],
            'start_date' => ['required', 'date', 'date_format:Y-m-d'],
            'end_date' => ['required', 'date', 'date_format:Y-m-d'],
            'event_time'    =>  [],
            'location'  =>  ['required'],
            'deadline'  =>  ['required', 'date', 'date_format:Y-m-d']
    	];

        if($id) {
            $rule['asset'] = ['mimes:png,webp,jpeg'];
        }

    	return $rule;
    }
}