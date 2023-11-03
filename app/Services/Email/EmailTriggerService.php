<?php

namespace App\Services\Email;

use Illuminate\Support\Facades\Mail;

class EmailTriggerService
{
    public function __construct()
    {}

    public function sendEmail(string $mailable, array $data): void
    {
        Mail::to($data['email'])->send(new $mailable($data));
    }

}
