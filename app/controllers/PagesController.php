<?php

use Larabook\Pages\PageRepository;

class PagesController extends \BaseController
{
	/**
     * @var PageRepository
     */
    protected $pageRepository;

    /**
     * @param PageRepository $pageRepository      
     */
    public function __construct(PageRepository $pageRepository)
    {
        parent::__construct();

        $this->pageRepository = $pageRepository;
    }

    public function getPage($slug) {
        $page = $this->pageRepository->getPageBySlug($slug);
        
        return View::make('pages.show', compact('page'));
    }
}
