<?php

use Larabook\Forms\SubjectForm;

use Larabook\Subjects\SubjectRepository;

class SubjectsController extends \BaseController
{
	/**
	 * @var Subject
	 */
	protected $subjectRepository;

	/**
	 * @param SubjectRepository $subjectRepository
	 */
	public function __construct(SubjectRepository $subjectRepository)
	{
		$this->subjectRepository = $subjectRepository;

		$this->beforeFilter('auth');
	}
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
    	$subjects = $this->subjectRepository->getPaginated();
        
        return View::make('subjects.index', compact('subjects'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        // TODO : Validation
        $subject = new \Larabook\Subjects\Subject;

        $subject->user_id = Auth::user()->id;
        $subject->title = Input::get('title');

        $subject->save();

        Flash::message('Your subject has been added!');

        return Redirect::back();
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        
        //
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
        //
        
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
        //
        
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
        //
        
    }
}
