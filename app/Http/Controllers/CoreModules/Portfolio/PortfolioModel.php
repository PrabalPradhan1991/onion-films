<?php

namespace App\Http\Controllers\CoreModules\Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioModel extends Model
{
    protected $table = 'core_portfolios';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function getRule($id=NULL) {
    	$rule = [
    		'client'	=>	['required'],
            'title'    =>  ['required'],
            'portfolio_date'    =>  ['required', 'date', 'date_format:Y-m-d'],
    		'short_description'	=>	[],
            'long_description'  =>  ['required'],
    		'ordering'	=>	'required',
            'website'   =>  []
    		//'asset'	=>	['required', 'mimes:png,webp,jpg']
    	];

        if($id) {
            //$rule['asset'] = ['mimes:png,webp,jpg'];
        }

    	return $rule;
    }

    public function getAssets() {
        return $this->hasMany(PortfolioAssetsModel::class, 'portfolio_id', 'id');
        //return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
    }

    public function getCategories() {
        return $this->hasMany(PortfolioServiceModel::class, 'portfolio_id', 'id');
    }
}