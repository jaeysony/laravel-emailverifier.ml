<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Contact;

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

      return Http::get(env('MYEMAILVERIFIER_ENDPOINT', ''), [
          'email' => $email,
          'apikey' => env('MYEMAILVERIFIER_APIKEY', '')
      ])->json();
      // Log::info('jsondata', $response);
    }

}
