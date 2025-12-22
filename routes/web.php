<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\DemoRequestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('main-page');
});

Route::get('/zoho/callback', function () {
    $code = request('code');
    
    if (!$code) {
        return 'No authorization code received. Please try again.';
    }
    
    $response = Http::asForm()->post('https://accounts.zoho.com/oauth/v2/token', [
        'grant_type' => 'authorization_code',
        'client_id' => env('ZOHO_CLIENT_ID'),
        'client_secret' => env('ZOHO_CLIENT_SECRET'),
        'redirect_uri' => env('ZOHO_REDIRECT_URI'),
        'code' => $code,
    ]);
    
    $data = $response->json();
    
    if (isset($data['refresh_token'])) {
        return '<h2>Success!</h2><p>Add this to your .env file:</p><pre>ZOHO_REFRESH_TOKEN=' . $data['refresh_token'] . '</pre>';
    }
    
    return '<h2>Error:</h2><pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
});


Route::post('/demo/submit', [DemoRequestController::class, 'submit']);