<?php

namespace Larabook\Pages;

use Laracasts\Commander\CommandHandler;

use Laracasts\Commander\Events\DispatchableTrait;

class PageCommandHandler implements CommandHandler
{
    
    use DispatchableTrait;
    
    /**
     * @var PageRepository
     */
    protected $repository;
    
    /**
     * @param PageRepository $repository
     */
    function __construct(PageRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command) {
        
        $page = Page::register($command->title, $command->slug, $command->content, $command->is_home, $command->status);
        
        return $page;
    }
}
