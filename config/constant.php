<?php 

$url = env('APP_URL');
    
define('URL', $url.'/website/default/');
define('LOGIN_URL', $url.'/Login/');
define('WEBSITE_URL', $url.'/Home/');
define('ADMIN_URL', $url.'/Application/Admin/');
define('ADMIN_MANAGEAPP', $url.'/Application/ManageApp/');
define('ROOT_URL', $url.'/website/');
define('PUBLIC_PATH', $url.'/public/');
define('ADMIN_PUBLIC_PATH', $url.'/public/admin-assets/');
define('STORAGE_PATH', $url.'/storage/app/uploads/');

define('COMPANY_FULL_NAME', 'Beauty Parlour Management System');
define('COMPANY_SHORT_NAME', 'BPMS');
define('APPOINTMENTBOOK', 'BP');
// echo ADMIN_URL.'portal';exit;