<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\PropertylistModel;
use DB;
use PhpParser\Node\Expr\Print_;
use App\Models\AppointmentBookinModel;
use App\Models\UserTable;
use App\Models\ContactModel;
use Validator;

class HomeController extends AppController {
    public function index() {
        // echo 111;exit();
        return view('website.index');
    }

    public function about() {
        // echo 111;exit();
        $aboutQuery = DB::select("SELECT * FROM tblpage WHERE PageType='aboutus'");
        $aboutQuery = json_decode(json_encode($aboutQuery), true);
        
        $this->viewVars['aboutQuery'] = $aboutQuery[0]; 
        $this->viewVars['aboutTags'] = json_decode($aboutQuery[0]['TagsMenus'],true);
        // echo'<pre>';print_r($this->viewVars['aboutTags']);exit;
        return view('website.about', $this->viewVars);
    }

    public function services() {
        // echo 111;exit();
        $serviceQuery = DB::select('SELECT * FROM tblservices WHERE DeletedFlag=0 ORDER BY ID DESC');
        $serviceQuery = json_decode(json_encode($serviceQuery), true);
        // echo'<pre>';print_r($serviceQuery);exit;
        $this->viewVars['serviceQuery'] = $serviceQuery;
        return view('website.services', $this->viewVars);
    }

    public function contact() {
        $ContactModel = new ContactModel();
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all(); 
            // echo'<pre>';print_r($requestData);exit;
            $validator   = \Validator::make($requestData,
             [
                'fname'     => 'bail|required',
                'lname'     => 'bail|required', 
                'phone'     => 'bail|required', 
                'phone'     => 'bail|required', 
                'message'   => 'bail|required', 
             ],[]);
             if ($validator->fails()) {  
                return redirect('Home/contact')->withErrors($validator)->withInput();
            } else { 
                $ContactModel->FirstName    = $requestData['fname'];
                $ContactModel->LastName     = $requestData['lname'];
                $ContactModel->Phone        = $requestData['phone'];    
                $ContactModel->Email        = $requestData['emailId'];    
                $ContactModel->Message      = $requestData['message'];    
                $ContactModel->CreatedOn    = now();    
                if($ContactModel->save()){
                    return redirect('Home/contact')->with('success', 'Message has been send to Admin Successfully.');;
                }
            }
        }
        return view('website.contact');
    }

    public function bookAppointment() { 
        $aptBookModel = new AppointmentBookinModel();
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all(); 
            // echo'<pre>';print_r($requestData);exit;
            $validator   = \Validator::make($requestData,
             [
                'appointmentDate' => 'bail|required',
                'appointmentTime' => 'bail|required', 
                'appointmentMsg'  => 'bail|required', 
             ],[
                'appointmentDate.required'                => 'Appointment Date is required',
                'appointmentTime.required'                => 'Appointment Time is required',
                'appointmentMsg.required'                 =>  'Message Time is required',
             ]);
            if ($validator->fails()) {  
                return redirect('Home/bookAppointment')->withErrors($validator)->withInput();
            } else { 
                $GenerateAppountmentNo        = rand(1000,9999);
                $aptBookModel->UserID         = session('User_Session_Data.ID');
                $aptBookModel->AptNumber      = APPOINTMENTBOOK.$GenerateAppountmentNo.date("Y");
                $aptBookModel->AptDate        = $requestData['appointmentDate'];
                $aptBookModel->AptTime        = $requestData['appointmentTime'];
                $aptBookModel->Message        = $requestData['appointmentMsg']; 
                // echo'<pre>';print_r($aptBookModel);exit;
                if($aptBookModel->save()){
                    return redirect('Home/thankYou');
                }
            }
        }
        // dd(session('User_Session_Data'));
        return view('website.book-appointment'); 
    }

    public function thankYou() { 
        // dd(session('User_Session_Data'));
        $appointmentNumber = DB::table("tblbook")
        ->select("UserID", "AptDate", "AptTime", "AptNumber")
        ->where("UserID", "=", session('User_Session_Data.ID'))
        ->orderBy('AptDate', 'desc')
        ->first();  
        $appointmentNumber = json_decode(json_encode($appointmentNumber), true);
        // echo'<pre>';print_r($appointmentNumber);exit;
        $this->viewVars['appointmentNumber'] = $appointmentNumber;
        return view('website.thank-you', $this->viewVars); 
    }

    public function bookHistory() { 
        // dd(session('User_Session_Data.ID'));
        $bookinQuery = DB::table('tblbook AS TB')
        ->leftJoin('tbluser AS TU', 'TU.ID', '=', 'TB.UserID')
        ->where('TU.ID', '=', session('User_Session_Data.ID'))
        ->select(
            'TU.ID as uId',
            'TU.FirstName',
            'TU.LastName',
            'TU.Email',
            'TU.MobileNumber',
            'TB.ID as bookId',
            'TB.AptNumber',
            'TB.AptDate',
            'TB.AptTime',
            'TB.Message',
            'TB.BookingDate',
            'TB.Status',
            'TB.approvedStatus'
        )->orderBy('TB.BookingDate', 'desc')->get();
        $bookinQuery = json_decode(json_encode($bookinQuery), true);
        // echo'<pre>';print_r($bookinQuery);exit;
        $this->viewVars['bookinData'] = $bookinQuery;
        return view('website.book-history', $this->viewVars); 
    }

    public function appointment_Detail($appountmentId){
        $decryptId = decrypt($appountmentId);

        $aptDetailsQuery = DB::table('tbluser as U')
        ->select('B.AptNumber', 'U.FirstName', 'U.LastName', 'U.Email', 'U.MobileNumber', 'B.AptDate', 'B.AptTime', 'B.BookingDate', 'B.Status', 'B.Remark','B.approvedStatus')
        ->join('tblbook as B', 'U.ID', '=', 'B.UserID')
        ->where('B.AptNumber', $decryptId)
        ->where('U.DeletedFlag', 0)
        ->get(); 
        $aptDetailsQuery = json_decode(json_encode($aptDetailsQuery), true); 
        $this->viewVars['aptDetails'] = $aptDetailsQuery[0];
        // echo'<pre>';print_r($this->viewVars['aptDetails']);exit;
        return view('website.appointment-detail', $this->viewVars); 
    }
    
    public function invoiceHistory(){
        $getUserBill = UserTable::where('ID', session('User_Session_Data.ID'))->pluck('billGenerateId');  
        // dd(session('User_Session_Data'));  
        $invoiceQuery = DB::table('tbluser')
        ->distinct()
        ->select(
            'tbluser.ID as uid',
            'tbluser.FirstName',
            'tbluser.LastName',
            'tbluser.Email',
            'tbluser.MobileNumber',
            'tblinvoice.BillingId',
            DB::raw('DATE(tblinvoice.PostingDate) as PostingDate')
        )
        ->join('tblinvoice', 'tbluser.ID', '=', 'tblinvoice.Userid')
        ->where('tblinvoice.BillingId', $getUserBill[0])
        ->where('tbluser.ID', session('User_Session_Data.ID'))
        ->get();
        $invoiceQuery = json_decode(json_encode($invoiceQuery), true); 
 
        $this->viewVars['invoiceData'] = $invoiceQuery; 
        return view('website.invoice-history', $this->viewVars);
    }

    public function viewInvoice($BillingId){
        $decryptId = decrypt($BillingId);

        $userDetailsQuery = DB::select("SELECT DISTINCT DATE(IV.PostingDate) AS invoicedate, U.FirstName, U.LastName, U.Email, U.MobileNumber, U.RegDate,IV.BillingId FROM tblinvoice IV JOIN tbluser U ON U.ID = IV.Userid WHERE IV.BillingId = " . $decryptId);
        $userDetailsQuery = json_decode(json_encode($userDetailsQuery), true); 

        $calculateAmountQuery = DB::select("SELECT tblservices.ServiceName,tblservices.Cost FROM tblinvoice JOIN tblservices on tblservices.ID=tblinvoice.ServiceId WHERE tblinvoice.BillingId=" . $decryptId);
        $calculateAmountQuery = json_decode(json_encode($calculateAmountQuery), true); 
        $this->viewVars['userDetailsQuery'] = $userDetailsQuery[0];
        $this->viewVars['calculateAmountQuery'] = $calculateAmountQuery;
        // echo'<pre>';print_r($this->viewVars['calculateAmountQuery']);exit;
        return view('website.view-invoice', $this->viewVars); 
    }

    

    public function profile() {
        // dd(session('User_Session_Data.ID'));
        $sessArr = session('User_Session_Data');
        
        $profileQuery = DB::select("SELECT FirstName, LastName, MobileNumber, Email, RegDate FROM tbluser WHERE ID=" . $sessArr['ID']);
        $profileQuery = json_decode(json_encode($profileQuery), true); 
        $this->viewVars['profileQuery'] = $profileQuery[0];
        // echo'<pre>'; print_r($this->viewVars);exit;

        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all(); 
            $status['status'] = 'success';
            $status['success_msg'] = "Profile Updated Successfully.";
            // echo'<pre>';print_r($requestData);exit;
            $validator   = \Validator::make($requestData,
             [
                'firstname'     => 'bail|required',
                'lastname'      => 'bail|required',  
                'mobilenumber'  => 'bail|required|numeric'
             ],[]);
            if ($validator->fails()) {  
                return redirect('Home/profile')->withErrors($validator)->withInput();
            } else { 
                $userTable = new UserTable();
                UserTable::where('ID', $sessArr['ID'])
                ->update([
                    'FirstName'     => $requestData['firstname'],
                    'LastName'      => $requestData['lastname'],
                    'MobileNumber'  => $requestData['mobilenumber'],
                    'UpdatedOn'     => now()
                ]);
                if($status['status'] == 'success') {
                    return redirect('Home/profile')->with('success', $status['success_msg']);
                }
                // return redirect('Home/profile');
                // request()->session()->flash('success', 'Updated Successfully');
            }
        }

        return view('website.profile', $this->viewVars);
    }

    /* ::::: change password ::::: */
    public function settings(){
        $userTable = new UserTable();
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all();
            $validator   =  Validator::make($requestData, [
                'currentpassword'     => 'bail|required',
                'newpassword'         => 'bail|required|required_with:confirmpassword|same:confirmpassword',
                'confirmpassword'     => 'bail|required',
              ], [
               'currentpassword.required'      => 'Current password is required',
               'newpassword.required'          => 'New password is required',
               'confirmpassword.same'          => 'Password And Confirm password should match.',
               'confirmpassword.required'      => 'Confirm password password is required',      
             ]); 
            if ($validator->fails()) { 
                return redirect('Home/settings')->withErrors($validator)->withInput();
            } else { 
                $currentPassword    = $requestData['currentpassword'];
                $newPassword        = $requestData['newpassword'];
 
                if ($currentPassword == $newPassword) { 
                    return redirect('Home/settings')->with('error', 'New password should not be same as current password.');
                } else {

                    $userSessionId = session('User_Session_Data.ID');  
                    $getPasswordQuery = DB::select("SELECT Password FROM tbluser WHERE ID=" . $userSessionId);
                    // echo'<pre>';print_r($getPasswordQuery[0]->Password);exit;
                    if(!empty($getPasswordQuery) && ($getPasswordQuery[0]->Password == md5($currentPassword))){ 
                        $updatePassword = UserTable::where('ID', $userSessionId)
                        ->update([
                            'Password' => md5($newPassword),
                            'UpdatedPasswordOn' => 'updated_password_'.now()
                        ]);
                        if(!empty($updatePassword)){ 
                            return redirect('Home/settings')->with('success', 'Password has been reset Successfully.');
                        }
                    } else {  
                        return redirect('Home/settings')->with('error', 'Incorrect Current Password');
                    } 
                } 
            }
        }
        return view('website.settings');
    }
}