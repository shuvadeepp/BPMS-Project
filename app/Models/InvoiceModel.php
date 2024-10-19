<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class InvoiceModel extends AppModel {
    protected $table      = 'tblinvoice';
	protected $primaryKey = 'id';
}