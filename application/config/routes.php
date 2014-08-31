<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



$route['default_controller'] = "home";
$route['404_override'] = '';

$route['admin'] = 'admin';
$route['admin/script'] = 'admin/script';
$route['admin/users'] = 'admin/users';
$route['admin/properties'] = 'admin/properties';
$route['admin/propertyalert'] = 'admin/propertyalert';
$route['admin/newsletter'] = 'admin/newsletter';

$route['authenticate'] = 'home/authenticate';
$route['home/logout'] = 'home/logout';

$route['admin/users/new'] = 'admin/createUser';

$route['admin/checkpasswordchange.php'] = 'admin/checkpasswordchange';
$route['admin/users/(:any)'] = "admin/userProfile";

$route['validate/(:any)'] = "home/validateToken";
$route['subscribeuser'] = 'home/subscribeuser';
$route['insertPropertyAlert'] = "home/insertPropertyAlert";
$route['register'] = 'home/register';
$route['profile'] = 'home/profile';
$route['shareProperty'] = 'home/shareProperty';
$route['viewAllProperties'] = 'home/viewAllProperties';
$route['propertyDetails'] = 'home/propertyDetails';
$route['careers'] = 'home/careers';
$route['uploadCV'] = 'home/uploadCV';
$route['joinUs'] = 'home/joinUs';
$route['marketIndex'] = 'home/marketIndex';
$route['auction'] = 'home/auction';


/* End of file routes.php */
/* Location: ./application/config/routes.php */