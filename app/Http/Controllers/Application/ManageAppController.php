<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use App\models\ServiceModel;
use App\models\AboutUsModel;
use App\models\ContactusModel;
use App\models\InvoiceModel;
use App\models\BookingModel;
use DB;
use Validator;
use PhpParser\Node\Expr\Print_;
use Storage;

class ManageAppController extends AppController {
  
    public function index(){
        return view('Portal.Application.dashboard');
    }

    public function addServices($serviceId){
        // echo 111;exit;
        // echo'<pre>';print_r(session('admin_session_data'));exit;
        $serviceId = ($serviceId) ? decrypt($serviceId) : 0;
        $this->viewVars['buttonVal'] = ($serviceId > 0)?'Update Service':'Add Service';
        $redirectUrl     = ($serviceId)? ADMIN_MANAGEAPP . 'addServices/' . encrypt($serviceId) : ADMIN_MANAGEAPP . 'addServices';
        // echo  $redirectUrl;exit;
        $ServiceModel = new ServiceModel();
        $this->viewVars['editDetails'] = '';
        if($serviceId > 0){
            $editDetails = ServiceModel::find($serviceId)->toArray();
            $this->viewVars['editServiceData'] = $editDetails;
            // echo'<pre>';print_r($this->viewVars['editServiceData']);exit;
        }
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all();  
            // echo'<pre>';print_r($requestData);exit;
            $validator   = \Validator::make($requestData, [
                'serviceName'      => 'required',
                'serviceDesc'      => 'required',
                'serviceCost'      => 'required',
                'serviceImage'     => 'required',
                'serviceImage'     => 'image|mimes:jpg,png,jpeg|max:1024|required_without:hdnServiceImage'
            ],
            [
                'ServiceName.required'      => 'Service Name is require',
                'serviceDesc.required'      => 'service Description  is require',
                'serviceCost.required'      => 'service Cost is require',
                'serviceImage.required'     => 'Image is required',
                'serviceImage.mimes'        => 'Image should be jpg, png, jpeg',
                'serviceImage.max'          => 'Image should not be more than 1 MB',
                'serviceImage.required_without' => 'Image is required when hdnServiceImage is not provided',
                
            ]);
            if ($validator->fails()) {
                return redirect($redirectUrl)->withErrors($validator)->withInput();
            } else{
                /* :::::::::: UPDATE CODE :::::::::: */
                if($serviceId > 0){
                    $hdnServiceImage=$requestData['hdnServiceImage'];  
                    $serviceImage       = request()->file('serviceImage');
                    if($serviceImage) {
                        if($hdnServiceImage && $serviceImage->getClientOriginalName() != '') {
                            @unlink('storage/app/uploads/Service/' . $hdnServiceImage);
                        }
                        $newFlName = 'Service_' .time() . '.' . $serviceImage->getClientOriginalExtension();
                        $serviceImage->move('storage/app/uploads/Service/', $newFlName);
                    } else {
                        $newFlName = $hdnServiceImage;
                    }
                    ServiceModel::where('ID', $serviceId)->update([
                        'ServiceName'         => $requestData['serviceName'], 
                        'ServiceDescription'  => $requestData['serviceDesc'], 
                        'Cost'                => $requestData['serviceCost'],  
                        'Image'               => $newFlName, 
                        'UpdatedBy'           => session('admin_session_data.userId'),
                        // 'CreationDate'        => '',
                        'UpdatedOn'           => now(),
                    ]);
                    request()->session()->flash('success', 'Record updated successfully');
                    /* :::::::::: UPDATE CODE :::::::::: */
                } else {
                    /* :::::::::: INSERT CODE :::::::::: */ 
                    $cost = filter_var($requestData['serviceCost'], FILTER_VALIDATE_FLOAT);
                    if ($cost !== false && $cost > 0) {
                        $cost = 0; 
                    
                        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
                        $ServicePath  = $storagePath.'uploads/Service';
                        if(!file_exists($ServicePath)){
                            \mkdir($ServicePath, 0755);
                        }
                        $serviceImage = request()->file('serviceImage');
                        $newFlName = 'Service_' . time() . '.'.  $serviceImage->getClientOriginalExtension();
                        // echo'<pre>'; print_r($requestData);exit;
                        if($serviceImage->move('storage/app/uploads/Service/',$newFlName)) {
                            $ServiceModel->ServiceName = $requestData['serviceName'];
                            $ServiceModel->ServiceDescription = $requestData['serviceDesc'];
                            $ServiceModel->Cost = $cost;
                            $ServiceModel->Image = $newFlName;
                            $ServiceModel->UpdatedBy = session('admin_session_data.userId');
                            $ServiceModel->CreationDate = now();
                            // $ServiceModel->UpdatedOn = '';
                            $ServiceModel->save(); 
                            request()->session()->flash('success', 'Record added successfully');
                        }  
                    } else {
                        request()->session()->flash('error', 'Record not added please try again');
                    }
                    /* :::::::::: INSERT CODE :::::::::: */
                } 
            
                // return redirect('Portal/application/view-services');
            }
        }

        return view('Portal.Application.add-services', $this->viewVars);
    }

    public function viewServices(){
        $arrResQuery= DB::table('tblservices')
            ->select('ID', 'ServiceName', 'ServiceDescription', 'Cost', 'Image', 'CreationDate')
            ->where('DeletedFlag', 0)
            ->orderByDesc('ID') 
            ->paginate(10); 
            // $arrResQuery=json_decode(json_encode($arrResQuery), true);
            // echo'<pre>';print_r($arrResQuery[0]->ServiceName);exit;
            $this->viewVar['arrAllRecords']=$arrResQuery;
        return view('Portal.Application.view-services', $this->viewVar);
    }

    public function aboutUs(){
        $aboutusQuery=DB::table('tblpage')
            ->select('PageType', 'PageTitleOne', 'PageTitleTwo', 'PageDescription', 'CoverImgOne', 'CoverImgTwo','TagsMenus', 'Email', 'MobileNumber', 'UpdationDate', 'Timing')
            ->where('PageType', '=', 'aboutus')
            ->get();
            $aboutusQuery=json_decode(json_encode($aboutusQuery),true);
            $this->viewVar['aboutusArrAllRecords']=$aboutusQuery[0]; 
            $this->viewVar['tagMenus']= implode(', ', json_decode($aboutusQuery[0]['TagsMenus'],true)); 

            if(!empty(request()->all()) && request()->isMethod('post')) {
                $requestData = request()->all();  
                
                $validator   = \Validator::make($requestData, [
                    /* 'pagetitle_one'      => 'required',
                    'pagetitle_two'      => 'required',
                    'pagedes'            => 'required',
                    'aboutusCoverImg_One'=> 'image|mimes:jpg,png,jpeg|max:1024|required_without:hdnAboutusCoverImg_One',
                    'aboutusCoverImg_Two'=> 'image|mimes:jpg,png,jpeg|max:1024|required_without:hdnAboutusCoverImg_Two',  */
                ],[
                    /* 'pagetitle_one'      => 'Page Title one is required',
                    'pagetitle_two'      => 'Page Title two is required',
                    'pagedes'            => 'Page Description is required',
                    'aboutusCoverImg_One.required_without'  => 'Image is required', 
                    'aboutusCoverImg_One.mimes'             => 'Image should be jpg,png,jpeg',
                    'aboutusCoverImg_One.max'               => 'Image should not be more than 1 mb', 

                    'aboutusCoverImg_Two.required_without'  => 'Image is required', 
                    'aboutusCoverImg_Two.mimes'             => 'Image should be jpg,png,jpeg',
                    'aboutusCoverImg_Two.max'               => 'Image should not be more than 1 mb', */
                ]);
                if($validator->fails()) { 
                    return redirect(ADMIN_MANAGEAPP . 'aboutUs/')->withErrors($validator)->withInput();
                } else { 
                    $hdnAboutusCoverImg_One=$requestData['hdnAboutusCoverImg_One'];  
                    $aboutusCoverImg_One       = request()->file('aboutusCoverImg_One');
                    if($aboutusCoverImg_One) {
                        if($hdnAboutusCoverImg_One && $aboutusCoverImg_One->getClientOriginalName() != '') {
                            @unlink('storage/app/uploads/AboutUs/' . $hdnAboutusCoverImg_One);
                        }
                        $newFlNameOne = 'AboutUsOne_' .time() . '.' . $aboutusCoverImg_One->getClientOriginalExtension();
                        $aboutusCoverImg_One->move('storage/app/uploads/AboutUs/', $newFlNameOne);
                    } else {
                        $newFlNameOne = $hdnAboutusCoverImg_One;
                    }
                    
                    $hdnAboutusCoverImg_Two=$requestData['hdnAboutusCoverImg_Two'];  
                    $aboutusCoverImg_Two       = request()->file('aboutusCoverImg_Two');
                    if($aboutusCoverImg_Two) {
                        if($hdnAboutusCoverImg_Two && $aboutusCoverImg_Two->getClientOriginalName() != '') {
                            @unlink('storage/app/uploads/AboutUs/' . $hdnAboutusCoverImg_Two);
                        }
                        $newFlNameTwo = 'AboutUsTwo_' .time() . '.' . $aboutusCoverImg_Two->getClientOriginalExtension();
                        $aboutusCoverImg_Two->move('storage/app/uploads/AboutUs/', $newFlNameTwo);
                    } else {
                        $newFlNameTwo = $hdnAboutusCoverImg_Two;
                    } 
                    $menuTags = $requestData['tagParlourMenu'];
                    $tagsArray = explode(',', $menuTags); 
                    $storeTag=json_encode((object)$tagsArray);
     
                    AboutUsModel::where('PageType', $aboutusQuery[0]['PageType'])->update([
                        'PageTitleOne'       => $requestData['pagetitle_one'],
                        'PageTitleTwo'       => $requestData['pagetitle_two'],
                        'PageDescription'    => $requestData['pagedes'],
                        'CoverImgOne'        => $newFlNameOne,
                        'CoverImgTwo'        => $newFlNameTwo,
                        'TagsMenus'          => $storeTag,
                        'UpdationDate'       => now()
                    ]);
                    request()->session()->flash('success', 'Record updated successfully');
                    return redirect(ADMIN_MANAGEAPP . 'aboutUs/');
                }   
            }
        return view('Portal.Application.about-us', $this->viewVar);
    }

    public function contactUs(){ 
        $contactusQuery=DB::table('tblpage')
            ->select('PageType', 'PageTitleOne', 'PageTitleTwo', 'PageDescription', 'CoverImgOne', 'CoverImgTwo','TagsMenus', 'Email', 'MobileNumber', 'UpdationDate', 'Timing')
            ->where('PageType', '=', 'contactus')
            ->get();
            $contactusQuery=json_decode(json_encode($contactusQuery),true);
            // echo'<pre>';print_r($contactusQuery);exit;

            if(!empty(request()->all()) && request()->isMethod('post')) {
                $requestData = request()->all();  
                // echo'<pre>';print_r($requestData);exit;
                $validator   = \Validator::make($requestData, [ 
                ],[
                     
                ]);
                if($validator->fails()) { 
                    return redirect(ADMIN_MANAGEAPP . 'contactUs/')->withErrors($validator)->withInput();
                } else {  
                    // echo 111;exit;
                    ContactusModel::where('PageType', $contactusQuery[0]['PageType'])->update([
                        'Email'              => $requestData['email'],
                        'MobileNumber'       => $requestData['mobnumber'],
                        'Timing'             => $requestData['timing'], 
                        'PageDescription'    => $requestData['pagedes'],  
                        'UpdationDate'       => now()
                    ]);
                    request()->session()->flash('success', 'Record updated successfully');
                    return redirect(ADMIN_MANAGEAPP . 'contactUs/');
                }
            }  

            $this->viewVar['contactusArrAllRecords']=$contactusQuery[0];
        return view('Portal.Application.contact-us', $this->viewVar);
    }

    public function allAppointments() {
        $filterStatus=[];
        $appointmnt=[];
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all();  
            $filterStatus = $requestData['filterStatus'];
            // echo'<pre>';print_r($requestData['filterStatus']);exit;
            if(!empty($filterStatus)){
                $appointmnt = DB::table('tblbook as B')
                ->select('B.ID', 'B.UserID', DB::raw("CONCAT(U.FirstName, ' ', U.LastName) AS FullName"), 'U.MobileNumber', 'B.AptNumber', 'B.AptDate', 'B.AptTime', 'B.Status', 'B.BookingDate')
                ->leftJoin('tbluser as U', 'B.UserID', '=', 'U.ID')
                ->where('B.DeletedFlag', 0)
                ->where('B.Status', $filterStatus)
                ->orderByDesc('B.UserID')
                ->paginate(10);
            
            } else {
                $appointmnt = DB::table('tblbook as B')
                ->select('B.ID', 'B.UserID', DB::raw("CONCAT(U.FirstName, ' ', U.LastName) AS FullName"), 'U.MobileNumber', 'B.AptNumber', 'B.AptDate', 'B.AptTime', 'B.Status', 'B.BookingDate')
                ->leftJoin('tbluser as U', 'B.UserID', '=', 'U.ID')
                ->where('B.DeletedFlag', 0)
                ->orderByDesc('B.UserID')
                ->paginate(10); 
            }
            
        } else {
            $appointmnt = DB::table('tblbook as B')
            ->select('B.ID', 'B.UserID', DB::raw("CONCAT(U.FirstName, ' ', U.LastName) AS FullName"), 'U.MobileNumber', 'B.AptNumber', 'B.AptDate', 'B.AptTime', 'B.Status', 'B.BookingDate')
            ->leftJoin('tbluser as U', 'B.UserID', '=', 'U.ID')
            ->where('B.DeletedFlag', 0)
            ->orderByDesc('B.ID')
            ->paginate(10); 
        }
        
        //  echo'<pre>';print_r($appointmnt);exit;
        $this->viewVar['appointmntAllArrRecords'] = $appointmnt; 
        $this->viewVar['filterStatus'] = $filterStatus; 
 
        return view('Portal.Application.all-appointment', $this->viewVar);
    }

    public function viewAppointmnt($bookId){
        $bookId = ($bookId) ? decrypt($bookId) : 0;
        // echo $bookId;exit; 
        $viewAppointmnt = DB::select("SELECT 
        B.ID,
        B.UserID,
        CONCAT(U.FirstName, ' ', U.LastName) AS FullName,
        U.Email,
        U.MobileNumber,
        B.AptNumber,
        B.AptDate,
        B.AptTime,
        B.BookingDate, 
        B.Remark,
        B.Status,
        CASE B.Status 
            WHEN 1 THEN 'Approved'
            WHEN 2 THEN 'Rejected'
            ELSE 'Not Updated Yet'
        END AS BOOKSTATUS
    FROM
        tblbook B
            LEFT JOIN
        tbluser U ON B.UserID = U.ID
    WHERE
        B.DeletedFlag = 0 AND B.ID=".$bookId);
        $this->viewVar['arrEditRecord'] = $viewAppointmnt[0];
        // echo'<pre>';print_r($this->viewVar['arrEditRecord']);exit;
        if(!empty(request()->all()) && request()->isMethod('post')) {
            $requestData = request()->all();
            // echo'<pre>';print_r($requestData['status]);exit;
            $validator   = \Validator::make($requestData, [

            ], [
                
            ]);
            if ($validator->fails()) {
                return redirect(ADMIN_MANAGEAPP . 'viewAppointmnt/')->withErrors($validator)->withInput();
            } else{
                $DBQuery = DB::update("UPDATE tblbook SET Remark = '{$requestData['remark']}', Status = '{$requestData['status']}', RemarkDate = NOW() WHERE ID = '$bookId'");

                request()->session()->flash('success', 'Record updated successfully');
                return redirect(ADMIN_MANAGEAPP . 'allAppointments/');
            }
        }
        return view('Portal.Application.view-appointment', $this->viewVar);
    }

    public function unreadEnquiry(){
        $unreadEnquiry = DB::table('tblcontact')
            // ->where('IsRead', 0)  
            ->paginate(10);
        // echo'<pre>';print_r($unreadEnquiry);exit;
        $this->viewVar['unreadEnquiry'] = $unreadEnquiry;
        return view('Portal.Application.unread-enquiry', $this->viewVar);
    }

    public function viewEnquiry($enqId){
        $enqId = ($enqId) ? decrypt($enqId) : 0;
        // echo $enqId;exit;
        $updtIsRead=0;
        $viewEnquiry = DB::table('tblcontact')
            // ->whereNull('IsRead')
            ->where('ID', $enqId)
            ->get();
            
            if(!empty($viewEnquiry)){ 
                $updtIsRead = DB::select("UPDATE tblcontact set IsRead = 1 where ID='$enqId'");
            }
            $this->viewVar['arrAllRecord'] = $viewEnquiry;
            // echo'<pre>';print_r($this->viewVar);exit;
        return view('Portal.Application.view-enquiry', $this->viewVar);
    }

    public function approvedList(){
        
        /* $approveList=$users = DB::table('tbluser')
            ->select('ID', 'FirstName', 'LastName', 'MobileNumber', 'Email', 'RegDate', 'CreatedOn')
            ->where('DeletedFlag', 0)
            ->where('UserRegType', 1)
            ->paginate(10);    */
        
            /* $approveList = DB::table('tbluser AS TU')
            ->leftJoin('tblinvoice AS TI', 'TU.ID', '=', 'TI.Userid')
            ->select(
                'TU.ID',
                'TU.FirstName',
                'TU.LastName',
                'TU.MobileNumber',
                'TU.Email',
                'TU.RegDate',
                'TU.CreatedOn',
                DB::raw('MAX(TI.BillingId) AS BillingId'),
                DB::raw('MAX(TI.AssignServiceStatus) AS AssignServiceStatus'),
                DB::raw('MAX(TI.PostingDate) AS InvoiceDate')
            )
            ->where('TU.DeletedFlag', 0)
            ->groupBy(
                'TU.ID',
                'TU.FirstName',
                'TU.LastName',
                'TU.MobileNumber',
                'TU.Email',
                'TU.RegDate',
                'TU.CreatedOn'
            )
            ->paginate(10); */
 

            $approveList = DB::table('tbluser as TU')
                ->leftJoin('tblbook as TB', 'TU.ID', '=', 'TB.UserID')
                ->select('TU.ID', 'TU.FirstName', 'TU.LastName', 'TB.AptNumber', 'TU.MobileNumber', 'TU.Email', 'TB.BookingDate', 'TB.approvedStatus')
                ->where('TU.DeletedFlag', 0)
                ->where('TB.Status', 1)
                ->groupBy('TU.ID', 'TU.FirstName', 'TU.LastName', 'TB.AptNumber', 'TU.MobileNumber', 'TU.Email', 'TB.BookingDate', 'TB.approvedStatus')
                ->paginate(10);
        
        
            // echo'<pre>';print_r($approveList);exit;
        $this->viewVar['arrAllRecord']=$approveList; 
    
        return view('Portal.Application.approved-list', $this->viewVar);
    }

    public function assignService($approvedId){
        $approvedId = ($approvedId) ? decrypt($approvedId) : 0;
        // $invoice = new InvoiceModel;
        // echo $approvedId;exit;
        if($approvedId > 0) { 
            $assignServiceQuery = DB::select("
                SELECT TS.ID, TS.ServiceName, TS.Cost
                FROM tblservices TS 
                LEFT JOIN tblinvoice TV ON TS.ID = TV.ServiceId 
                WHERE TS.DeletedFlag = 0 
                GROUP BY TS.ID, TS.ServiceName, TS.Cost 
                ORDER BY TS.ID DESC
            "); 
            // echo'<pre>';print_r($assignServiceQuery);exit;
        }
   
        if(!empty(request()->all()) && request()->isMethod('post')) {
            
            $userId = intval($approvedId);
            $generateInvoiceNumber = mt_rand(100000000, 999999999);
            $serviceIds = request()->input('sids');
            // echo'<pre>';print_r($generateInvoiceNumber);exit;
            foreach ($serviceIds as $serviceId) {
                $invoice = new InvoiceModel;
  
                $invoice->Userid                  = $userId;
                $invoice->ServiceId               = $serviceId;
                $invoice->BillingId               = $generateInvoiceNumber;
                $invoice->assignServiceStatus     = 1;
           
                $invoice->save();
                $userTable = BookingModel::where('ID', $invoice->Userid)->first();
                // echo '<pre>';print_r($userTable->ID);exit;
                if ($userTable) {
                    $userTable->approvedStatus = 1;
                    $userTable->save();
                }
            }
            // echo $invoice->id;exit;
            

            request()->session()->flash('success', 'Invoice created successfully. Invoice number is ' . $generateInvoiceNumber);
            return redirect(ADMIN_MANAGEAPP . 'approvedPrint/');
        }
        // Invoice created successfully. Invoice number is 914379606
        
        $this->viewVar['assignServiceAllRecord']=$assignServiceQuery;
        return view('Portal.Application.add-customer-service', $this->viewVar);
    }

    public function approvedPrint() {
        
        $Printpage = DB::table('tbluser AS TU')
        ->join('tblinvoice AS TI', 'TU.ID', '=', 'TI.Userid')
        ->where('TU.DeletedFlag', 0)
        ->where('TI.AssignServiceStatus', 1)
        ->select('TU.ID', 'TU.FirstName', 'TU.LastName', 'TU.MobileNumber', 'TI.BillingId', 'TI.PostingDate')
        ->groupBy('TU.ID', 'TU.FirstName', 'TU.LastName', 'TU.MobileNumber', 'TI.BillingId', 'TI.PostingDate')
        ->paginate(10);
        $this->viewVar['printAllRecord'] = $Printpage;
        // echo'<pre>';print_r($this->viewVar);exit;
        return view('Portal.Application.approved-print', $this->viewVar);
    }

    public function printInvoice($encBillId){
        $encBillId = ($encBillId) ? decrypt($encBillId) : 0;
        // echo $encBillId;exit;
        $getuserData=DB::select("select DISTINCT date(tblinvoice.PostingDate) as invoicedate,tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tbluser.RegDate, BillingId
        from  tblinvoice 
        join tbluser on tbluser.ID=tblinvoice.Userid 
        where tblinvoice.BillingId=" . $encBillId);

        // echo'<pre>';print_r($getuserData);exit;

        $getInvoce = DB::select("
            SELECT TS.ServiceName, TS.Cost FROM tblinvoice TI LEFT JOIN tblservices TS ON TS.ID=TI.ServiceId WHERE TI.BillingId = ? AND TS.DeletedFlag=0;
            ", [$encBillId]
        );
        $getInvoce=json_decode(json_encode($getInvoce), true);
        $getuserData=json_decode(json_encode($getuserData), true);
        $this->viewVar['arrAllRecord'] = $getInvoce;
        $this->viewVar['arruserRecord'] = $getuserData[0];
        // echo'<pre>';print_r($this->viewVar);exit;
        return view('Portal.Application.view-invoice', $this->viewVar);
    }
}