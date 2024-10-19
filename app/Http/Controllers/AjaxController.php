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

class AjaxController extends AppController {
    public function index() {
        $pageQuery = null;
        $pageQuery = DB::select("SELECT * FROM tblpage WHERE PageType='contactus'");
        $pageQuery = json_decode(json_encode($pageQuery), true);  
        $this->viewVars['pageQuery'] = $pageQuery[0]; 
        return json_encode(array('status' => '200', 'Data' => $pageQuery));
        // return view('website.detailsPage', $this->viewVars);
    } 
}