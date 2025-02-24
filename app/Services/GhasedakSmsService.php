<?php 

// app/Services/GhasedakSmsService.php

namespace App\Services;

use Exception;
use Ghasedak\DataTransferObjects\Request\InputDTO as RequestInputDTO;
use Ghasedak\DataTransferObjects\Request\OtpMessageDTO as RequestOtpMessageDTO;
use Ghasedak\DataTransferObjects\Request\ReceptorDTO as RequestReceptorDTO;
use Ghasedak\DataTransferObjects\Request\SingleMessageDTO as RequestSingleMessageDTO;
use Ghasedak\GhasedaksmsApi;

class GhasedakSmsService
{
    protected GhasedaksmsApi $client;
    protected string $lineNumber;

    public function __construct()
    {
        $this->client = new GhasedaksmsApi(config('services.ghasedak.api_key'));
        $this->lineNumber = config('services.ghasedak.line_number');
    }

    public function sendSingleSms(string $receptor, string $message)
    {
        try {
            return $this->client->sendSingle(
                new RequestSingleMessageDTO(
                    sendDate: now(),
                    lineNumber: $this->lineNumber,
                    receptor: $receptor,
                    message: $message
                )
            );
        } catch (Exception $e) {
            $this->handleException($e);
        }
    }








    



    public function sendOtp(string $mobile, string $code)
    {
        try {
            return $this->client->sendOtp(
                new RequestOtpMessageDTO(
                    sendDate: now(),
                    receptors: [new RequestReceptorDTO(mobile: $mobile)],
                    templateName: config('services.ghasedak.otp_template'),
                    inputs: [
                        new RequestInputDTO('Code', $code),
                        new RequestInputDTO('APP_NAME', config('app.name'))
                    ]
                )
            );
        } catch (Exception $e) {
            $this->handleException($e);
        }
    }










    protected function handleException(Exception $e)
    {
        logger()->error('SMS Error: ' . $e->getMessage());
        throw $e;
    }
}