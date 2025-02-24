<?php

// app/Services/OtpService.php

namespace App\Services;

use App\Models\User;
use App\Services\GhasedakSmsService;

class OtpService
{
    public function __construct(
        protected GhasedakSmsService $smsService
    ) {}

    public function sendOtp(User $user, $code)
    {
        $this->smsService->sendOtp($user->cellphone, $code);
    }
}