<?php

namespace Larabook\Locations;

use Laracasts\Commander\CommandHandler;

use Laracasts\Commander\Events\DispatchableTrait;

class LocationCommandHandler implements CommandHandler
{
    
    use DispatchableTrait;
    
    /**
     * @var LocationRepository
     */
    protected $repository;
    
    /**
     * @param LocationRepository $repository
     */
    function __construct(LocationRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command) {
        if (isset($command->id)) {            
            $role = $this->repository->findById($command->id);
            $role->name = $command->name;
            $role->parent_id = $command->parent_id;
        } else {
            $role = Location::register($command->name, $command->parent_id);
        }        
        
        $this->repository->save($role);
        
        return $role;
    }
}
