<?php

use App\Http\Controllers\SSO\SSOController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/sso/login', [SSOController::class,'login'])->name('sso.login');
Route::get('/callback', [SSOController::class,'callback'])->name('sso.callback');
Route::get('/sso/authuser', [SSOController::class,'authuser'])->name('sso.authuser');


// Route::get('/login', function(Request $request){
    // $request->session()->put('state', $state =  Str::random(40));

    // $query = http_build_query([
    //     // "client_id" => "9ced2b6a-50e8-4fcb-8524-c692199bfa4a",
    //     "client_id" => "9ced50fc-723c-440c-8577-bd00750dece5",
    //     "redirect_uri" => "http://localhost:8080/callback",
    //     "response_type" => "code",
    //     "scope" => "view-user",
    //     "state" => $state,
    // ]);

    // // return redirect()
    // return redirect("http://localhost:8000/oauth/authorize?".$query);
// });

// Route::get('/callback', function(Request $request){
//     $state = $request->session()->pull("state");

//     throw_unless(strlen($state) > 0 && $state = $request->state,
//     InvalidArgumentException::class);

//     $response = Http::asForm()->post(
//         "http://localhost:8000/oauth/token",
//         [
//             "grant_type" => "authorization_code",
//             "client_id" => "9ced50fc-723c-440c-8577-bd00750dece5",
//             "client_secret" => "oeWe35Gw1ZzM0SPygSJ4ixjba4GSwNvZemCfzrKf",
//             "redirect_uri" => "http://localhost:8080/callback",
//             "code" => $request->code,
//         ]
//     );
//     $request->session()->put($response->json());
//     return redirect('/authuser');
//     return $response->json();
// });


// Route::get("/authuser", function(Request $request){
//     $access_token = $request->session()->get("access_token");
//     $response = Http::withHeaders([
//         "Accept" => "application/json",
//         "Authorization" => "Bearer ".$access_token
//     ])->get("http://localhost:8000/api/user");

//     return $response->json();
// });