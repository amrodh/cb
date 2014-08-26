<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$route['default_controller'] = "home";
$route['404_override'] = '';

$route['admin'] = 'admin';
$route['admin/script'] = 'admin/script';
$route['admin/users'] = 'admin/users';
$route['admin/properties'] = 'admin/properties';
$route['authenticate'] = 'home/authenticate';
$route['home/logout'] = 'home/logout';

$route['register'] = 'home/register';
$route['profile'] = 'home/profile';



/* End of file routes.php */
/* Location: ./application/config/routes.php */