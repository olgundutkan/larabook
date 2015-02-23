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
        $user = User::register($command->username, $command->email, $command->password, $command->title, $command->first_name, $command->last_name, $command->gender, $command->dob, $command->country_id, $command->state_id, $command->city_id, $command->school_department, $command->groups, $command->language_id, $command->is_commercial, 
        $command->profile_picture, $command->activated, $command->activation_code, $command->is_visible_email, $command->is_visible_title, $command->is_visible_first_name, $command->is_visible_last_name, $command->is_visible_gender, $command->is_visible_dob);
        
        $this->repository->save($user);

        // TODO:: başka bir methoda taşı
        $user->privacy->email      = $command->is_visible_email;
        $user->privacy->title      = $command->is_visible_title;
        $user->privacy->first_name = $command->is_visible_first_name;
        $user->privacy->last_name  = $command->is_visible_last_name;
        $user->privacy->gender     = $command->is_visible_gender;
        $user->privacy->dob        = $command->is_visible_dob;
        $user->privacy->save();
        
        // TODO:: refactoring
        $userRole = Role::where('name', 'User')->firstOrFail();
        
        $this->repository->setUserRole($userRole->id, $user);
        
        $this->dispatchEventsFor($user);
        
        return $user;
    }
}
