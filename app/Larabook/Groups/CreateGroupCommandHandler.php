<?php
namespace Larabook\Groups;

use Laracasts\Commander\CommandHandler;

use Laracasts\Commander\Events\DispatchableTrait;

class CreateGroupCommandHandler implements CommandHandler
{
    
    use DispatchableTrait;
    
    /**
     * @var GroupRepository
     */
    protected $repository;
    
    /**
     * @param GroupRepository $repository
     */
    function __construct(GroupRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command) {

        $group = Group::create(['name' => $command->name, 'slug' => $command->slug]);
        
        //$this->dispatchEventsFor($group);
        
        return $group;
    }
}
