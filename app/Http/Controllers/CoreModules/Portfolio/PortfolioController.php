<?php

namespace App\Http\Controllers\CoreModules\Portfolio;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private $view   = 'core-modules.portfolio.backend.';
    private $frontend_view = 'core-modules.portfolio.frontend.';
    private $model = '\App\Http\Controllers\CoreModules\Portfolio\PortfolioModel';
    private $storage_folder = 'portfolio-asset';

    //

    public function __construct() {
        parent::__construct();
    }

    public function getFrontendPortfolios() {
        $data = $this->model::with('getAssets')->with('getCategories')->orderBy('ordering', 'ASC')->paginate(12);
        $services = \App\Http\Controllers\CoreModules\Service\ServiceModel::orderBy('service', 'ASC')->get();
        return view($this->frontend_view.'portfolios')
                ->with('data', $data)
                ->with('services', $services);
    }
    public function getFrontendPortfolio($id) {
        
        $portfolio = $this->model::with('getAssets')->with('getCategories')->where('id', $id)->firstOrFail();

        return view($this->frontend_view.'portfolio')
                ->with('data', $portfolio);
    }

    public function getListView() {
        $data = PortfolioModel::orderBy('ordering', 'ASC')->get();

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
            \DB::beginTransaction();
                $record = $this->model::create($input['data']);



                if(isset($input['asset']['file'])) {
                    foreach($input['asset']['file'] as $index => $i) {
                        $assets = [];
                        $assets['asset'] = $input['asset']['file'][$index];
                        $assets['type'] = $input['asset']['type'][$index];
                        $assets['mime'] = $input['asset']['mime'][$index];
                        $assets['title'] = $input['asset']['asset_title'][$index];    
                        (new PortfolioAssetsModel)->storeAsset($assets, $record->id);
                    }
                }

                if(isset($input['service_id'])) {
                    
                    (new PortfolioServiceModel)->storeService($input['service_id'], $record->id);
                }

            \DB::commit();

            session()->flash('success-msg', 'Portfolio successfully created!');
            return redirect()->back();
        }
    }

    public function getEditView($id) {
        $data = $this->model::where('id', $id)->firstOrFail();

        $services = PortfolioServiceModel::where('portfolio_id', $id)->pluck('service_id')->toArray();

        return view()->make($this->view.'edit')
                    ->with('data', $data)
                    ->with('services', $services);
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
            $input['service_id'] = isset($input['service_id']) ? $input['service_id'] : [];
            if(isset($input['service_id'])) {
                
                (new PortfolioServiceModel)->storeService($input['service_id'], $data->id);
            }
            $record = $this->model::where('id', $id)->update($input['data']);
            session()->flash('success-msg', 'Portfolio successfully edited!');
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
        session()->flash('success-msg', 'Portfolio successfully deleted');

        return redirect()->back();
    }

    public function getPorfolioAssetListView($portfolio_id) {
        $portfolio = $this->model::where('id', $portfolio_id)->firstOrFail();
        $data = PortfolioAssetsModel::where('portfolio_id', $portfolio->id)->orderBy('ordering', 'ASC')->get();

        return view($this->view.'asset-list')
                ->with('portfolio', $portfolio)
                ->with('data', $data);
    }

    public function postPortfolioAssetAdd($portfolio_id) {
        $portfolio = $this->model::where('id', $portfolio_id)->firstOrFail();
        $input = request()->all();

        \DB::beginTransaction();
            if(isset($input['asset']['file'])) {
                foreach($input['asset']['file'] as $index => $i) {
                    $assets = [];
                    $assets['asset'] = $input['asset']['file'][$index];
                    $assets['type'] = $input['asset']['type'][$index];
                    $assets['mime'] = $input['asset']['mime'][$index];
                    $assets['title'] = $input['asset']['asset_title'][$index];    
                    (new PortfolioAssetsModel)->storeAsset($assets, $portfolio->id);
                }
            }
        \DB::commit();

        session()->flash('success-msg', 'Assets successfully added');

        return redirect()->back();
    }

    public function postPortfolioAssetEdit($portfolio_id) {
        $portfolio = $this->model::where('id', $portfolio_id)->firstOrFail();
        $input = request()->all();

        \DB::beginTransaction();
            foreach($input['data'] as $row_id => $record) {
                PortfolioAssetsModel::where('id', $row_id)->update($record);
            }
        \DB::commit();

        session()->flash('success-msg', 'Assets successfully edited');

        return redirect()->back();
    }

    public function postPortfolioAssetDelete($id) {
        $record = PortfolioAssetsModel::where('id', $id)->first();
        $filename = $record->asset;
        $record->delete();
        try {
            @unlink(storage_path().'/'.'app/'.$this->storage_folder.'/'.$filename);
        } catch(\Exception $e) {
            //do nothing
        }
        session()->flash('success-msg', 'Portfolio successfully deleted');

        return redirect()->back();
    }

    public function postFeaturePortfolio($portfolio_id) {
        $record = PortfolioModel::where('id', $portfolio_id)->firstOrFail();
        $record->is_featured = 'yes';
        $record->save();
        session()->flash('success-msg', 'Portfolio successfully featured');
        return redirect()->back();
    }

    public function postUnfeaturePortfolio($portfolio_id) {
        $record = PortfolioModel::where('id', $portfolio_id)->firstOrFail();
        $record->is_featured = 'no';
        $record->save();
        session()->flash('success-msg', 'Portfolio successfully removed from featured');
        return redirect()->back();
    }
}
