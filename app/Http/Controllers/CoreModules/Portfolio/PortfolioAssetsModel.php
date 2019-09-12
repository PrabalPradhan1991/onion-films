<?php

namespace App\Http\Controllers\CoreModules\Portfolio;

use Illuminate\Database\Eloquent\Model;

class PortfolioAssetsModel extends Model
{
    protected $table = 'core_portfolio_assets';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static $rule = [
    	//'feature_name' => ['required'],
    	//'slug' => ['required', 'unique:pages,slug'],
    	//'display_text' => ['required'],
        //'ordering'  =>  ['integer', 'min:0']
    ];

    public function getRule($id=NULL) {
    	$rule = [
    		'client'	=>	'required',
    		'description'	=>	'required',
    		'ordering'	=>	'required',
    		'asset'	=>	['required', 'mimes:png,webp,jpg']
    	];

        if($id) {
            $rule['asset'] = ['mimes:png,webp,jpg'];
        }

    	return $rule;
    }

    public function storeAsset($asset, $portfolio_id) {
        $asset['portfolio_id'] = $portfolio_id;
        $asset['ordering'] = (int) self::where('portfolio_id', $portfolio_id)->max('ordering') + 1;
        self::create($asset);
    }
}