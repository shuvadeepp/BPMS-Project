<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use App\models\AdminModel;
use DB;
use Validator;
use PhpParser\Node\Expr\Print_;

class AdminController extends AppController {
    public function index() { 
        $this->viewVars[] = '';
        $AdminModel = new AdminModel();
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all(); 
            $status = []; 
            $validator   = Validator::make($requestData, [
                'AdminName'         => 'bail|required|email|max:128',
                'AdminPassword'     => 'bail|required' 
            ]);
            // if ($validator->fails()) {
            //  echo 111;exit;
                // return redirect('Portal/Application/Admin')->withErrors($validator)->withInput();
            // } else { 
                // echo'<pre>';print_r($requestData);exit; 
                $getAdminTable = $AdminModel->where([['UserName', $requestData['AdminName']]] , [['Password' => $requestData['AdminPassword']]])->get()->toArray();
                // echo'<pre>';print_r($getAdminTable);exit;

                if(empty($getAdminTable)){ 
                    $status['status'] = 'error';
                    $status['error_msg'] = "Invalid User Credential.";
                    return redirect('Portal/Application/Admin')->with('error', $status['error_msg']);
                } else { 
                    session(['ADMIN_SESSION_DATA' => $getAdminTable[0]]); 
                    $sessionStore = session('ADMIN_SESSION_DATA');
                    // echo'<pre>';print_r($sessionStore);exit;
                    return redirect('Application/ManageApp');
                }

                if($status['status'] == 'error') {
                    return redirect('Portal/Application/Admin/adminLogin')->with('error', $status['error_msg'])->back()->withInput();
                } else {  
                    return view('Portal.Application.dashbaord', $this->viewVars);
                }
            // }
        }
        return view('Portal.Application.admin-login');
    }  

    /* public function dashboard(){
        return view('Portal.Application.dashboard');
    }

    public function addServices(){
        return view('Portal.Application.add-services');
    } */
}