<?php

namespace Larabook\Handlers;

use Laracasts\Commander\Events\EventListener;

use Larabook\Registration\Events\UserHasRegistered;

use Larabook\Mailers\UserMailer;

class EmailNotifier extends EventListener
{
    
    /**
     * @var UserMailer
     */
    private $mailer;
    
    /**
     * @param UserMailer $mailer
     */
    public function __construct(UserMailer $mailer) {
        $this->mailer = $mailer;
    }
    
    /**
     * @param  UserHasRegistered $event
     */
    public function whenUserHasRegistered(UserHasRegistered $event) {
        $this->mailer->sendWelcomeMessage($event->user);
    }
}
