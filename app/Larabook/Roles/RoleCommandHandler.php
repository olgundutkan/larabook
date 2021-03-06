<?php

namespace Larabook\Roles;

use Laracasts\Commander\CommandHandler;

use Laracasts\Commander\Events\DispatchableTrait;

class RoleCommandHandler implements CommandHandler
{
    
    use DispatchableTrait;
    
    /**
     * @var RoleRepository
     */
    protected $repository;
    
    /**
     * @param RoleRepository $repository
     */
    function __construct(RoleRepository $repository) {
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
            $role->description = $command->description;            
        } else {
            $role = Role::register($command->name, $command->description);
        }        
        
        $this->repository->save($role);
        
        return $role;
    }
}
