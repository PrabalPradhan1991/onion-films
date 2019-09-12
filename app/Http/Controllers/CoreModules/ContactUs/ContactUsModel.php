<?php

namespace App\Http\Controllers\CoreModules\ContactUs;

use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    protected $table = 'core_contact_us';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function getRule($id=NULL) {
    	$rule = [
    		/*'client'	=>	'required',
    		'description'	=>	'required',
    		'ordering'	=>	'required',
    		'asset'	=>	['required', 'mimes:png,webp']*/
    	];

        if($id) {
           /* $rule['asset'] = ['mimes:png,webp'];*/
        }

    	return $rule;
    }

    public function getContactUs() {
        $data = self::first();
        $data = is_null($data) ? new $this : $data;
        return $data;
    }
}