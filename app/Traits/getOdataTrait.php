<?php

namespace App\Traits;
trait getOdataTrait{
    
public function getOData($url){
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);
        curl_setopt($ch, CURLOPT_USERPWD, config('app.Credentials'));
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Length: 0',
        ]);
        $response = curl_exec($ch);
        // dd($response);
        $jdata = json_decode($response, true);

		return $jdata;
	}

// public function getOData($url)
// {
//     $ch = curl_init();

//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_NTLM);

//     curl_setopt($ch, CURLOPT_USERPWD, config('app.Credentials')); 
//     // MUST be: DOMAIN\\username:password

//     curl_setopt($ch, CURLOPT_HTTPHEADER, [
//         'Accept: application/json'
//     ]);

//     curl_setopt($ch, CURLOPT_FAILONERROR, false);

//     $response = curl_exec($ch);
//     dd([
//     'response' => $response,
//     'error' => curl_error($ch),
//     'http_code' => curl_getinfo($ch, CURLINFO_HTTP_CODE)
// ]);

//     // 🔴 ADD ERROR DEBUGGING (IMPORTANT)
//     if ($response === false) {
//         dd([
//             'curl_error' => curl_error($ch),
//             'http_code' => curl_getinfo($ch, CURLINFO_HTTP_CODE)
//         ]);
//     }

//     curl_close($ch);

//     return json_decode($response, true);
// }
}