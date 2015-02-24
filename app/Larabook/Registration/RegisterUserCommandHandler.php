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

        //dd(empty($command->is_visible_email) OR $command->is_visible_email  ? true : false);

        // TODO:: başka bir methoda taşı
        $user->privacy()->email      = !empty($command->is_visible_email) OR $command->is_visible_email  ? true : false;
        $user->privacy()->title      = !empty($command->is_visible_title) OR $command->is_visible_title  ? true : false;
        $user->privacy()->first_name = !empty($command->is_visible_first_name) OR $command->is_visible_first_name  ? true : false;
        $user->privacy()->last_name  = !empty($command->is_visible_last_name) OR $command->is_visible_last_name  ? true : false;
        $user->privacy()->gender     = !empty($command->is_visible_gender) OR $command->is_visible_gender  ? true : false;
        $user->privacy()->dob        = !empty($command->is_visible_dob) OR $command->is_visible_dob  ? true : false;
        $user->privacy()->save();
        
        // TODO:: refactoring
        $userRole = Role::where('name', 'User')->firstOrFail();
        
        $this->repository->setUserRole($userRole->id, $user);
        
        $this->dispatchEventsFor($user);
        
        return $user;
    }
}
