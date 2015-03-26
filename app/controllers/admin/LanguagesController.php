<?php

namespace Controllers\Admin;

use Larabook\Languages\LanguageRepository;

use Larabook\Languages\CreateLanguageCommand;

use Larabook\Forms\LanguageForm;

use View, Input, Auth, Flash, Redirect;

class LanguagesController extends BaseController
{
	/**
     * @var LanguageForm
     */
    private $languageForm;

    private $languageRepository;
    
    /**
     * Constructor
     *
     * @param LanguageForm $languageForm
     */
    function __construct(LanguageForm $languageForm, LanguageRepository $languageRepository) {
        parent::__construct();
        
        $this->beforeFilter('auth');

        $this->languageForm = $languageForm;

        $this->languageRepository = $languageRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

    	$languages = $this->languageRepository->getAll();

    	return View::make('admin::pages.languages.index', compact('languages'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        
        return View::make('admin::pages.languages.create');
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        
        $this->languageForm->validForCreate($input = Input::only('name', 'slug'));

        $language = $this->execute(CreateLanguageCommand::class);

        Flash::success('Languages successfully created.');

        return Redirect::route('admin.languages.index');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug) {
        
        $language = $this->languageRepository->firstFindBySlug($slug);

        return View::make('admin::pages.languages.show', compact('language'));
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        $language = $this->languageRepository->findById($id);

        return View::make('admin::pages.languages.edit', compact('language'));
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        $this->languageForm->validForUpdate($id, $input = Input::only('name', 'slug'));

        $language = $this->languageRepository->findById($id);

        $language->name = $input['name'];
        $language->slug = $input['slug'];

        $language->save();

        Flash::success('Languages successfully updated.');

        return Redirect::route('admin.languages.index');
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        $language = $this->languageRepository->findById($id);

        $language->delete();

        Flash::success('Languages successfully deleted.');
        
        return Redirect::route('admin.languages.index');
    }
}
