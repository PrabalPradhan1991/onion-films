<?php

namespace App\Http\Controllers\CoreModules\OurTeam;

use Illuminate\Database\Eloquent\Model;

class OurTeamModel extends Model
{
    protected $table = 'core_our_team';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function getRule($id=NULL) {
    	$rule = [
    		'name'	=>	'required',
    		'position'	=>	'required',
    		'ordering'	=>	'',
    		'asset'	=>	['required', 'mimes:png,webp,jpeg'],
            'description'   =>  ['required']
    	];

        if($id) {
            $rule['asset'] = ['mimes:png,webp,jpeg'];
        }

    	return $rule;
    }
}