<?php

namespace App\Http\Controllers;

use App\CustomClasses\NTLM\NTLMSoapClient;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use stdClass;

class AppointmentController extends Controller
{
    public function BookAppointment(REQUEST $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([

            ]);
            $service = new NTLMSoapClient(config('app.webService'));
            if (!isset($params)) {
                $params = new stdClass();
            }
            $params->patientNo = session('account_no');
            $params->doctorNo = $request->doctor;
            $params->appointmentDate = $request->date;
            $params->appointmentTime = $request->time;
            $params->symptoms = $request->symptoms;

            // dd($params);
            $result = $service->BookAppointment($params);
            // dd($result);
            if ($result->return_value) {
                return redirect()->back()->with('success', 'Appointment boked successfully, follow up on the appointments tab');
            } else {
                return redirect()->back()->with('error', 'Something went wrong, please try again');
            }
        }
        catch(Exception $e){
            // dd($e->getMessage());
            Log::error($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
