<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('apiServices', function (Request $request) {
    $data = json_decode(file_get_contents('php://input'));
    $methodCase = $data->{'method'};

    switch ($methodCase) {
        case "approvedList": 
            $approveList = DB::table('tbluser as TU')
                ->leftJoin('tblbook as TB', 'TU.ID', '=', 'TB.UserID')
                ->select('TU.ID', 'TU.billGenerateId', 'TU.FirstName', 'TU.LastName', 'TB.AptNumber', 'TU.MobileNumber', 'TU.Email', 'TB.BookingDate', 'TB.approvedStatus', 'TB.Status')
                ->where('TU.DeletedFlag', 0)
                ->where('TB.Status', 1)
                ->groupBy('TU.ID', 'TU.billGenerateId', 'TU.FirstName', 'TU.LastName', 'TB.AptNumber', 'TU.MobileNumber', 'TU.Email', 'TB.BookingDate', 'TB.approvedStatus', 'TB.Status')
                ->orderBy('TB.BookingDate', 'desc')
                ->paginate(10);
            if(!empty($approveList)){
                echo json_encode(array('status' => 200, 'result' => $approveList));
            } else {
                echo json_encode(array('status' => 404, 'msg' => 'Sorry no data found.'));
            } 
        break;
    }
});
