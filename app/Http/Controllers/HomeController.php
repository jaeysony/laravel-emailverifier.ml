<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Contact;

// import VerificationResult
use App\Http\Resources\VerificationResult as VerificationResultResource;

class HomeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $email = 'hello@jaeyson.ml';

      $verifiyResult = Http::get(env('MYEMAILVERIFIER_ENDPOINT', ''), ['email' => $email,'apikey' => env('MYEMAILVERIFIER_APIKEY', '')]);
      $resourceResult = [
        'emailAddress' => $verifiyResult['data']['Address'],
        'status' => $verifiyResult['data']['Status'],
      ];
      // return $verifiyResult;
      return new VerificationResultResource($resourceResult);

      // return Http::get(env('MYEMAILVERIFIER_ENDPOINT', ''), [
      //     'email' => $email,
      //     'apikey' => env('MYEMAILVERIFIER_APIKEY', '')
      // ])->json();
      // Log::info('jsondata', $response);
    }

}
