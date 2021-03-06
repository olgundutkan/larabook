<?php
namespace Larabook\Registration;

use Laracasts\Commander\CommandHandler;

use Larabook\Users\UserRepository;

use Larabook\Users\User;

use Larabook\Roles\Role;

use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserCommandHandler implements CommandHandler
{
    
    use DispatchableTrait;
    
    /**
     * @var UserRepository
     */
    protected $repository;
    
    /**
     * @param UserRepository $repository
     */
    function __construct(UserRepository $repository) {
        $this->repository = $repository;
    }
    
    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command) {
        $user = User::register($command->username, $command->email, $command->password, $command->activated, $command->activation_code);
        
        $this->repository->save($user);        
        
        // TODO:: refactoring
        $userRole = Role::where('name', 'User')->firstOrFail();
        
        $this->repository->setUserRole($userRole->id, $user);
        
        $this->dispatchEventsFor($user);
        
        return $user;
    }
}
