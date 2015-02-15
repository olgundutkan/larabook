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
        if (is_null($command->id)) {
            $role = Role::register($command->name, $command->description);
        } else {
            $role = $this->repository->findById($command->id);
            $role->name = $command->name;
            $role->description = $command->description;
        }        
        
        $this->repository->save($role);
        
        return $role;
    }
}
