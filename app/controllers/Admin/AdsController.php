<?php

namespace Controllers\Admin;

use Ad;

use Larabook\Forms\Ad as AdForm;

class AdsController extends \BaseController
{
    
    protected $adForm;
    
    public function __construct(AdForm $adForm) {
        
        parent::__construct();
        
        $this->adForm = $adForm;
        // TODO :: Auth filter and admin filter
    }
    
    /**
     * Display a listing of the resource.
     * GET /ads
     *
     * @return Response
     */
    public function index() {
        
        $ads = Ad::all();
        return View::make('ads.index', compact('ads'));
    }
    
    /**
     * Show the form for creating a new resource.
     * GET /ads/create
     *
     * @return Response
     */
    public function create() {

        return View::make('ads.create');
    }
    
    /**
     * Store a newly created resource in storage.
     * POST /ads
     *
     * @return Response
     */
    public function store() {
        
        $this->adForm->validForCreate(Input::all());
        
        $ad = new Ad();
        
        $ad->name        = Input::get('name');
        $ad->widget_code = Input::get('widget_code');
        $ad->url         = Input::get('url');
        $ad->image          = Input::file('image');
        $ad->expires_at  = Input::get('expires_at');
        $ad->published   = Input::get('published');
        
        $ad->save();
        
        return Redirect::route('admin.ads.index')->withSuccess('Ad has been successfully saved.');
    }
    
    /**
     * Show the form for editing the specified resource.
     * GET /ads/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        $ad = Ad::findOrFail($id);
        return View::make('ads.edit', compact('ad'));
    }
    
    /**
     * Update the specified resource in storage.
     * PUT /ads/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        $ad = Ad::findOrFail($id);
        
        $this->adForm->validForUpdate(Input::all());

        $ad->name        = Input::get('name');
        $ad->widget_code = Input::get('widget_code');
        $ad->url         = Input::get('url');
        $ad->ad      = Input::file('ad');
        $ad->expires_at  = Input::get('expires_at');
        $ad->published   = Input::get('published');
        
        $ad->save();
        
        return Redirect::route('admin.ads.index')->withSuccess('Ad has been successfully updated.');
    }
    
    /**
     * Remove the specified resource from storage.
     * DELETE /ads/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        $ad = Ad::findOrFail($id);
        $ad->delete();
        
        return Redirect::back()->withSuccess('Ad has been successfully deleted.');
    }

    public function load() {
        
        $banners = Banner::active()->orderBy(DB::raw('RAND()'))->get();
        
        $ads = [];
        
        if (!empty($banners)) {
            foreach ($banners as $key => $banner) {
                $ads[] = [
                    'id'          => $banner->id, 
                    'banner'      => $banner->banner->url(), 
                    'target'      => $banner->url, 
                    'widget_code' => $banner->widget_code
                    ];
            }
            
            return Response::json($ads);
        }
    }
    
    public function click($id) {
        
        $banner = Banner::find($id);
        if (empty($banner)) return;
        
        $banner->clicks++;
        $banner->save();
        
        return Redirect::to($banner->url);
    }
}
