<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\GhasedakSmsService;
use App\Services\OtpService;
use DateTimeImmutable;
use Exception;
use Ghasedak\DataTransferObjects\Request\BulkMessageDTO;
use Ghasedak\DataTransferObjects\Request\InputDTO;
use Ghasedak\DataTransferObjects\Request\OtpMessageDTO;
use Ghasedak\DataTransferObjects\Request\ReceptorDTO;
use Ghasedak\DataTransferObjects\Request\SingleMessageDTO;
use Ghasedak\GhasedaksmsApi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // public function SendBulkSMS(){
    //     $ghasedaksms = new GhasedaksmsApi('540a7c929db2d4783bb9f3826de71d3051fe5e145a6fd728e77f9fa1ba4918d2fpnZ9c5hjckhWPgN');
    //     $sendDate = now();
    //     $lineNumber = '30005088';
    //     $receptor = ['09941831687'];
    //     $message = 'test';
    //     try {
    //         $response = $ghasedaksms->sendBulk(new BulkMessageDTO(
    //             sendDate: $sendDate,
    //             lineNumber: $lineNumber,
    //             receptors: $receptor,
    //             message: $message
    //         ));
    //         var_dump($response);
    //     } catch (Exception $e) {
    //         var_dump($e->getMessage());
    //     }
    // }
        

    // public function SendSingleSMS(){
    //     $ghasedaksms = new GhasedaksmsApi('540a7c929db2d4783bb9f3826de71d3051fe5e145a6fd728e77f9fa1ba4918d2fpnZ9c5hjckhWPgN');
    //     $sendDate = now();
    //     $lineNumber = '30005088';
    //     $receptor = '09941831687';// برای مثال
    //     $message = 'test لغو11';// برای مثال
    //     try {
    //         $response = $ghasedaksms->sendSingle(new SingleMessageDTO(
    //             sendDate: $sendDate,
    //             lineNumber: $lineNumber,
    //             receptor: $receptor,
    //             message: $message
    //         ));
    //     } catch (Exception $e) {
    //         var_dump($e->getMessage());
    //     }
    // }


    // public function SendOtpSMS(){
    //     $ghasedaksms = new GhasedaksmsApi('540a7c929db2d4783bb9f3826de71d3051fe5e145a6fd728e77f9fa1ba4918d2fpnZ9c5hjckhWPgN');
    //     $sendDate = new DateTimeImmutable('now');
    //     try {
    //         $response = $ghasedaksms->sendOtp(new OtpMessageDTO(
    //             sendDate: $sendDate,
    //             receptors: [
    //                 new ReceptorDTO(
    //                     mobile: '09941831687', // برای مثال
    //                     clientReferenceId: '1'
    //                 )
    //             ],
    //             templateName: 'Ghasedak',
    //             inputs: [
    //                 new InputDTO(
    //                     param: 'Code',
    //                     value: '334455'// برای مثال
    //                 ),
    //                 new InputDTO(
    //                     param: 'APP_NAME',
    //                     value: env('APP_NAME')
    //                 )
    //             ]
    //         ));
    //       } catch (Exception $e) {
    //           var_dump($e->getMessage());
    //       }
    // }




    public function login(Request $request){
        $request->validate([
            'cellphone' => ['required', 'regex:/^(\+98|0)?9\d{9}$/']
        ]);
        $user = User::where('cellphone', $request->cellphone)->first();
        $OTPCode = mt_rand(100000, 999999);
        $loginToken = Hash::make('DCDCojncd@cdjn%!!ghnjrgtn&&');

        if ($user) {
            $user->update([
                'otp' => $OTPCode,
                'login_token' => $loginToken
            ]);
        } else {
            $user = User::Create([
                'cellphone' => $request->cellphone,
                'otp' => $OTPCode,
                'login_token' => $loginToken
            ]);
        }

        // (new OtpService(new GhasedakSmsService))->sendOtp($user, $OTPCode);


        // return Response::success(null, ['login_token' => $loginToken]);
        return Response::success(null, ['login_token' => $loginToken, 'otp' => $OTPCode]);
    }


    public function checkOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
            'login_token' => 'required|string'
        ]);

        $user = User::where('login_token', $request->login_token)->firstOrFail();

        if ($user->otp == $request->otp) {
            $token = $user->createToken('myApp', ['user'])->plainTextToken;
            return Response::success(null, ['user'=> $user, 'token' => $token]);
        } else {
            return Response::error('کد ورود نادرست است');
        }
    }


    public function resendOtp(Request $request)
    {
        $request->validate([
            'login_token' => 'required|string'
        ]);

        try {
            $user = User::where('login_token', $request->login_token)->firstOrFail();
            $OTPCode = mt_rand(100000, 999999);
            $loginToken = Hash::make('DCDCojncd@cdjn%!!ghnjrgtn&&');
    
            $user->update([
                'otp' => $OTPCode,
                'login_token' => $loginToken
            ]);
            return Response::success(null, ['login_token' => $loginToken]);
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        }

       
    }


    public function me()
    {
        $user = User::find(Auth::id());
        if($user) return Response::success(null, $user);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return Response::success('logged out');
    }
}
