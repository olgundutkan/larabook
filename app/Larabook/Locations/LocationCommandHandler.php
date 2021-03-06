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
        
        $location = Location::create(['name' => $command->name, 'parent_id' => $command->parent_id]);
        
        $this->repository->save($location);
        
        return $location;
    }
}
