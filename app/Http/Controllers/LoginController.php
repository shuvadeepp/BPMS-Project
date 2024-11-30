<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\UserTable;
use DB;
use Validator;
use Session;
use PhpParser\Node\Expr\Print_;

class LoginController extends AppController {
    public function signup() {
        // echo 111;exit();
        $userTable = new UserTable();
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all(); 
            // echo '<pre>';print_r($requestData);exit();
            $validator   = \Validator::make($requestData,
             [
                'firstname' => 'bail|required|regex:/^[a-zA-Z0-9_\- ]*$/|max:128',
                'lastname' => 'bail|required|regex:/^[a-zA-Z0-9_\- ]*$/|max:128',
                'mobilenumber' => 'bail|required|numeric',
                'email' => 'bail|required|email|max:128',
                'password' => 'bail|required|required_with:repeatpassword|same:repeatpassword',
                'repeatpassword' => 'bail|required',
             ],[]);
            if ($validator->fails()) { 
                return redirect('Login/signup')->withErrors($validator)->withInput();
            } else { 
                // DB::connection()->enableQueryLog(); 
                $chkDup = UserTable::where([['Email',$requestData['email']],['UserRegType', $requestData['hdnRegStatus']]])->orWhere('MobileNumber', $requestData['mobilenumber'], ['UserRegType', $requestData['hdnRegStatus']])->first();
                // $queries = DB::getQueryLog();
                // $last_query = end($queries);
                // echo '<pre>';print_r($last_query);exit();
                if(!empty($chkDup)){ 
                    // echo 111;exit;
                    request()->session()->flash('success', "This User Email ID or Mobile Number is already registered!!!");
                    return redirect('Login/signup');
                } else {
                    // echo 222;exit;
                    $otp                         = rand(1000,9999);
                    $userTable->FirstName        = $requestData['firstname'];
                    $userTable->LastName         = $requestData['lastname'];
                    $userTable->MobileNumber     = $requestData['mobilenumber'];
                    $userTable->Email            = $requestData['email'];
                    $userTable->Password         = md5($requestData['password']); 
                    $userTable->UserRegType      = $requestData['hdnRegStatus']; 
                    $userTable->OTP              = $otp;   
                    $userTable->CreatedOn        = now();   
                    $userTable->save();
                    // echo '<pre>';print_r($userTable);exit();
                    // $lastInsertedId = $userTable->ID;
                    if($userTable->save()){
                        return redirect('Login/login');
                    } 
                }
            }
        }
        return view('website.signup');
    } 

    public function login() {
         
        $this->viewVars[] = '';
        $userTable = new UserTable();
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all();
            $status = []; 
            // echo'<pre>';print_r($requestData);exit;
            $validator   = Validator::make($requestData, [
                'emailcont'     => 'bail|required|email|max:128',
                'password'      => 'bail|required' 
            ]);
            if ($validator->fails()) {
                // echo 111;exit;
                return redirect('Login/login')->withErrors($validator)->withInput();
            } else {
                // echo 222;exit;
                $emailcont  = $requestData['emailcont'];
                $password   = md5($requestData['password']);
                // dd($requestData);
                // DB::connection()->enableQueryLog(); 
                $getUserTable = $userTable->where([['Email', $emailcont]] , [['Password' => $password]], [['UserRegType' => 1]])->get()->toArray();
                // $queries = DB::getQueryLog();
                // $last_query = end($queries);
                // echo'<pre>';print_r($getUserTable);exit;

                if(empty($getUserTable)){ 
                    $status['status'] = 'error';
                    $status['error_msg'] = "Please check your email ID or password is wrong!";
                    return redirect('Login/login')->with('error', $status['error_msg']);
                } else { 
                    session(['User_Session_Data' => $getUserTable[0]]); 
                    // $sessionStore = session('User_Session_Data');
                    // print_r($sessionStore);exit;
                    return redirect('Home/bookAppointment');
                }

                if($status['status'] == 'error') {
                    return redirect('Login/login')->with('error', $status['error_msg'])->back()->withInput();
                } else { 
                    return view('website.login', $this->viewVars);
                }
            }
        }
        return view('website.login', $this->viewVars);
    } 

    public function logout() {
        \Auth::logout();
        request()->session()->flush();
        request()->session()->regenerate(true);
        $cookie         = \Cookie::forget('PHPSESSID');
        $laravelcookie  = \Cookie::forget('laravel_session');
        return redirect('/');
    }

    public function forgetPassword() {
        $userTable = new UserTable();
        if(!empty(request()->all()) && request()->isMethod('post')){
            $requestData = request()->all();
            // dd($requestData);
            $validator   =  Validator::make($requestData,[
                'email'                     => 'bail|required|email|max:128', 
                'newpassword'               => 'bail|required|required_with:confirmpassword|same:confirmpassword',
                'confirmpassword'           => 'bail|required'
            ], 
            [
                'email.required'                => 'Email is required',
                'email.email'                   => 'Please Enter a valid email address',
                'newpassword.required'          => 'New password is required',
                'newpassword.same'              => 'New Password and confirm password must match',
                'confirmpassword.required'      => 'Confirm password password is required',
            ]);
            if ($validator->fails()) {  
                return redirect('Login/forgetPassword')->withErrors($validator)->withInput();
            } else {  
                $emailId = $requestData['email'];
                $getEmailIdQuery =$userTable->where(['Email' => $emailId], ['UserRegType' => 1])->get();
                $getEmailIdQuery = json_decode(json_encode($getEmailIdQuery), true); 
                if(!empty($getEmailIdQuery) && $getEmailIdQuery[0]['UserRegType'] > 0){
                    // $encryptGetData = encrypt($getEmailIdQuery[0]['ID'].'~::~'.time());
                    // echo $encryptGetData;exit; 
                    $updatePasswordQuery = UserTable::where('ID', $getEmailIdQuery[0]['ID'])
                    ->update([
                    'Password' => md5($requestData['newpassword']),
                        'UpdatedPasswordOn' => 'forgot_password_'.now()
                    ]);
                    if(!empty($updatePasswordQuery)){ 
                        return redirect('Login/login')->with('success', 'Password has been reset Successfully.');
                    }
                }
            }
        }
        return view('website.forget-password');
    }

    public function verifyOtpAuth(){ 
        // echo 111;exit;
        return view('website.verifyOtp');
    }
}