<?php

namespace App\Services\Subscriber;

use App\Mail\WelcomeSubscriber;
use App\Models\Subscriber;
use App\Services\BaseService;
use App\Repositories\Subscriber\SubscriberRepository;
use App\Services\Email\EmailTriggerService;

class SubscriberService extends BaseService
{
    private $emailTriggerService;

    public function __construct(SubscriberRepository $subscriberRepository, EmailTriggerService $emailTriggerService)
    {
        $this->repository = $subscriberRepository;
        $this->emailTriggerService = $emailTriggerService;
    }

    public function emailWelcomeSubscriber(Subscriber $subscriber): void
    {
        $this->emailTriggerService->sendEmail(WelcomeSubscriber::class, $subscriber->toArray());
    }
}
