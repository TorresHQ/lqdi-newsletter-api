<?php

namespace App\Repositories\Subscriber;

use App\Repositories\BaseRepository;
use App\Models\Subscriber;

class SubscriberRepository extends BaseRepository
{
    public function __construct(Subscriber $subscriber)
    {
        $this->model = $subscriber;
    }
}
