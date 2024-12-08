<?php

namespace App\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class TwilioVerificationService
{
    public function sendVerificationSMS($phoneNumber)
    {
        try {
            $sid = getenv("TWILIO_ACCOUNT_SID");
            $authToken = getenv("TWILIO_AUTH_TOKEN");
            $twilio = new Client($sid, $authToken);
            $twilio->verify->v2->services(getenv("TWILIO_SERVICE_SID"))
                ->verifications
                ->create($phoneNumber, "sms");
        } catch (\Exception $e) {
            Log::error('Failed to send verification SMS: ' . $e->getMessage());
            throw $e; // Rethrow the exception or handle it as needed
        }
    }
}
