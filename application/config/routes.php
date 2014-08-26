<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$route['default_controller'] = "home";
$route['404_override'] = '';

$route['admin'] = 'admin';
$route['admin/script'] = 'admin/script';
$route['admin/users'] = 'admin/users';
$route['admin/properties'] = 'admin/properties';
$route['authenticate'] = 'home/authenticate';
$route['home/logout'] = 'home/logout';

$route['admin/users/new'] = 'admin/createUser';

$route['admin/checkpasswordchange.php'] = 'admin/checkpasswordchange';
$route['admin/users/(:any)'] = "admin/userProfile";


$route['register'] = 'home/register';
$route['profile'] = 'home/profile';
$route['updateUser'] = 'home/updateUser';



/* End of file routes.php */
/* Location: ./application/config/routes.php */