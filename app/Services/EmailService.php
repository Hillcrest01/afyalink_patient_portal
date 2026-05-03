<?php


namespace App\Services;

use App\CustomClasses\NTLM\NTLMSoapClient;
use Illuminate\Support\Facades\Log;
use Exception;

class EmailService {


    public function saveEmail($subject, $email, $messageDesc1, $messageDesc2, $messageDesc3, $messageDesc4, $category, $noSeries)
    {
        try{
			$service = new NTLMSoapClient(config('app.webService'));
			if(!isset($params)){
				$params = new \stdClass();
			}
            $params->subject = $subject;
            $params->receiver = $email;
            $params->messageDesc1 = $messageDesc1;
            $params->messageDesc2 = $messageDesc2;
            $params->messageDesc3 = $messageDesc3;
            $params->messageDesc4 = $messageDesc4;
            $params->category = $category; //int available-options(Online Application,Enquiry,QMS,Password Reset,Audit Notification)
            $params->noSeries = $noSeries;
            $result = $service->SaveEmail($params);
			if($result->return_value){
                $service2 = new NTLMSoapClient(config('app.webService'));
                if(!isset($params2)){
                    $params2 = new \stdClass();
			    }
                $service2->SendEmails();
                return true;
            }else{return false;}

		}catch(Exception $e){
            Log::error($e);
			return $e;
		}

    }
    public function sendMail($receiver, $subject,$message ){
        // dd('here now');
        try{
			$service = new NTLMSoapClient(config('app.webService'));
			if(!isset($params)){
				$params = new \stdClass();
			}

            $params->receiver = $receiver;
            $params->subject = $subject;
            $params->message = $message;
            // dd($params);
            $result = $service->SendEmail($params);
            // dd($result);
			if($result->return_value){
				return true;
			}else{
                return false;
			}

		}catch(Exception $e){
            // dd($e->getMessage());
            Log::error($e);
            return false;
		}

    }
}