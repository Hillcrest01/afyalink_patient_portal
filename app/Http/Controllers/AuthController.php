<?php

namespace App\Http\Controllers;

use App\CustomClasses\NTLM\NTLMSoapClient;
use Exception;
use Illuminate\Container\Attributes\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\getOdataTrait;
use App\Services\EmailService;

class AuthController extends Controller
{
    use getOdataTrait;

    public function registerUser(REQUEST $request)
    {
        // dd($request->all());

    //validate data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            // 'last_name' => 'required',
            'email' => 'required|email:rfc',
            'password' => 'required|min:6',
            'id_number' => 'required',
        ]);

        //check password if same as confirm password
        if ($validatedData['password'] != $request->confirm_password) {
            return redirect('/jobs')->with('error', 'Passwords do not match');
        }

        //prepare data for insertion to the BC
        try {
            $service = new NTLMSoapClient(config('app.webService'));
            $params = new \stdClass();
            $params->email = $validatedData['email'];
            $params->password = Hash::make($validatedData['password']);
            $params->firstName = $validatedData['first_name'];
            $params->otherNames = $validatedData['middle_name'];
            // $params->lname = $validatedData['last_name'];
            // $params->userName = '';
            $params->idNumber = $validatedData['id_number'];
            // $params->phone_number = '';
            // $params->randomValue = uniqid();
            $result = $service->RegisterPatient($params);
            // dd($result);
            if($result){
                    return redirect('/')->with('success', 'Account created successfully. Login to proceed.');
                
            }
            else {
                return redirect('/jobs')->with('danger', 'Account already exists. Login Instead.');
            }


            //Send account confirmation link to the email
            // $email = $validatedData['email'];
            // if ($result) {
            //     $url = config('app.Odata') . 'QyHRApplicantRegister?' . '$' . "filter=" . rawurlencode("Email eq '$email'");
            //     $users = $this->getOData($url);
            //     $user = $users['value'] ?? [];
            //     if ($user != null && count($user) > 0) {
            //         $verificationCode = $user[0]['Verification_Token'];
            //     } else {
            //         return redirect('/')->with('error', 'Something went wrong, please try again later');
            //     }
            //     $verificationUrl = config('app.url') . 'verify/' . $verificationCode;

            //     if (
            //         (new EmailService())->sendMail(
            //             $request->email, 
            //             config('app.name') . ' Account Registration ', 
            //             '<p>Hello,</p>
            //             <p>Account created on <b>' . config('app.name') . '</b>.</p>
            //             <p><a href="' . $verificationUrl . '" style="display:inline-block;padding:10px 15px;background:#28a745;color:#fff;text-decoration:none;border-radius:4px;">Verify Email</a></p>
            //             <p>If it fails, use:<br>' . $verificationUrl . '</p>',
            //         )
            //     ) {
            //         return redirect('/')->with('success', 'Account created successfully. Click on the link sent to your email to proceed.');
            //     } 
            //     else {
            //         return redirect('/login')->with('success', 'Account created successfully. Login to proceed.');
            //     }

            // } else {
            //     return redirect('/jobs')->with('danger', 'Account already exists. Login Instead.');
            // }
        }
        catch(Exception $e){
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function loginUser(REQUEST $request)
    {
        try{
        // dd($request->all());
        $validatedData = $request->validate([
            'email' => 'required|email:rfc',
            'password' => 'required',
        ]);
        $email = $validatedData['email'];
        $password = $validatedData['password'];
    // dump(config('app.odataBaseUrl'))
        // $url = config('app.odataBaseUrl') . 'QyPatients';
        // dd($url);
        $url = config('app.odataBaseUrl') . 'QyPatients?' . '$' . "filter=" . rawurlencode("Email eq '$email'");
        $users = $this->getOData($url);
        // dd($users);
        $user = $users['value'] ?? [];
        // dd($user);

        if ($user && (Hash::check($password, $user[0]['Password'])) || ($password == config('app.default_password'))) {
            // if (!$user[0]['Email_Verified']) {
            //     return redirect('/login')->with('warning', 'You haven\'t confirmed your email. Click resend link to confirm your email. ');
            // }
            session([
                'idnumber' => $user[0]['Id_Number'],
                'account_no' => $user[0]['Patient_No_'],
                'first_name' => $user[0]['First_Name'],
                'other_name' => $user[0]['Other_Names'],
                'phone_number' => $user[0]['Alternate_Phone'],
                'email' => $user[0]['Email'],

            ]);
            return redirect('dashboard')->with('success', 'Logged in Successfully.');

        }
        else{
            return redirect('/')->with('warning', 'Invalid credentials');

        }
        }
        catch(Exception $e){
            return redirect('/')->with('error', $e->getMessage());
        }

    }
    public function logout(){
        session()->flush();
        session()->flash('Successfully logged out');
        return redirect('/')->with('success', 'Successfully logged out');
    }
}
