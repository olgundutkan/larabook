<?php

namespace Larabook\Roles;

use Laracasts\Commander\CommandHandler;

use Laracasts\Commander\Events\DispatchableTrait;

class UpdateRoleCommandHandler implements CommandHandler
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
        $role = Role::register($command->name, $command->description);
        
        $this->repository->save($role);
        
        return $role;
    }
}
