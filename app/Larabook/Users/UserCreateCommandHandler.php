<?php
namespace Larabook\Users;

use Laracasts\Commander\CommandHandler;

use Larabook\Roles\Role;

use Laracasts\Commander\Events\DispatchableTrait;

class UserCreateCommandHandler implements CommandHandler
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
        $user = User::create([
            'username'          => $command->username, 
            'email'             => $command->email, 
            'password'          => $command->password,
            'title'             => $command->title,
            'first_name'        => $command->first_name, 
            'last_name'         => $command->last_name, 
            'gender'            => $command->gender, 
            'dob'               => $command->dob, 
            'country_id'        => $command->country_id, 
            'state_id'          => $command->state_id, 
            'city_id'           => $command->city_id, 
            'school_department' => $command->school_department, 
            'is_commercial'     => $command->is_commercial, 
            'language_id'       => $command->language_id, 
            'activated'         => $command->activated, 
            'activation_code'   => $command->activation_code, 
            'profile_picture'   => $command->profile_picture
            ]);       
        
        // TODO:: refactoring
        $userRole = Role::where('name', 'User')->firstOrFail();
        
        $this->repository->setUserRole($userRole->id, $user);

        $this->repository->setUserPrivacy($user, ['first_name' => $command->is_visible_first_name, 'last_name' => $command->is_visible_last_name, 'gender' => $command->is_visible_gender, 'email' => $command->is_visible_email, 'title' => $command->is_visible_title, 'dob' => $command->is_visible_dob,]);
        
        $this->dispatchEventsFor($user);
        
        return $user;
    }
}