<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$route['default_controller'] = "home";
$route['404_override'] = '';

$route['admin'] = 'admin';
$route['authenticate'] = 'home/authenticate';
$route['home/logout'] = 'home/logout';

$route['register'] = 'home/register';




/* End of file routes.php */
/* Location: ./application/config/routes.php */