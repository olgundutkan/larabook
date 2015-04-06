<?php

namespace Controllers\Admin;

use Larabook\Pages\PageRepository;
use Larabook\Pages\PageCommand;
use Larabook\Forms\PageForm;
use View, Redirect, Lang, Input, Flash;

use Larabook\Pages\Page;

class PagesController extends BaseController
{
    
    /**
     * @var PageRepository
     */
    protected $pageRepository;

    /**
     * @var PageForm
     */
    protected $pageForm;

    /**
     * @param PageRepository $pageRepository 
     * @param PageForm       $pageForm       
     */
    public function __construct(PageRepository $pageRepository, PageForm $pageForm)
    {
        parent::__construct();

        $this->pageRepository = $pageRepository;
        $this->pageForm       = $pageForm;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pages = $this->pageRepository->getAllPage();
        
        return View::make('admin.pages.pages.index', compact('pages'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('admin.pages.pages.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $this->pageForm->validForCreate($input = Input::all());
        
        $location = $this->execute(PageCommand::class, [
            'title'   => $input['title'], 
            'slug'    => $input['slug'], 
            'content' => $input['content'], 
            'is_home' => isset($input['is_home']) ? true : false, 
            'status'  => $input['status']
        ]);
        
        Flash::success('Page was successfully added.');
        
        return Redirect::route('admin.pages.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $page = $this->pageRepository->findById($id);
        
        return View::make('admin::pages.pages.show', compact('page'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $page = $this->pageRepository->findById($id);
        
        return View::make('admin.pages.pages.edit', compact('page'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $page = $this->pageRepository->findById($id);
        
        $this->pageForm->validForUpdate($id, $input = Input::all());
        
		$page->title   = $input['title'];
		$page->slug    = $input['slug'];
		$page->content = $input['content'];
		$page->status  = $input['status'];
        
        $page->save();

        Flash::success('Page was successfully updated.');
        
        return Redirect::route('admin.pages.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        $page = $this->pageRepository->findById($id);
        
        $page->delete();

        Flash::success('Page was successfully deleted.');
        
        return Redirect::route('admin.pages.index');
    }
}
