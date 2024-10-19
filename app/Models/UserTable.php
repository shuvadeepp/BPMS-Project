<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class UserTable extends AppModel {
    protected $table      = 'tbluser';
	protected $primaryKey = 'ID';
}