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
        // $code = $this->generateCode();
        
        // $user->update([
        //     'otp_code' => $code,
        //     'otp_expires_at' => now()->addMinutes(5)
        // ]);

        $this->smsService->sendOtp($user->cellphone, $code);
    }

    // protected function generateCode(): string
    // {
    //     return str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    // }
}