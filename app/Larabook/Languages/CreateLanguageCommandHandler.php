<?php
namespace Larabook\Languages;

use Laracasts\Commander\CommandHandler;

use Laracasts\Commander\Events\DispatchableTrait;

class CreateLanguageCommandHandler implements CommandHandler
{
    
    use DispatchableTrait;
    
    /**
     * @var LanguageRepository
     */
    protected $repository;
    
    /**
     * @param LanguageRepository $repository
     */
    function __construct(LanguageRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command) {

        $language = Language::create(['name' => $command->name, 'slug' => $command->slug]);
        
        //$this->dispatchEventsFor($language);
        
        return $language;
    }
}
