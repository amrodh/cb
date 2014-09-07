<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$appended_lang = "(?:[a-zA-Z]{2}/?)?"; 
$prepended_lang = "(?:[a-zA-Z]{2}/)?"; 

$route['default_controller'] = "home";
$route["$appended_lang"] = "home";
$route['404_override'] = '';

$route['admin'] = 'admin';
$route['admin/script'] = 'admin/script';
$route['admin/users'] = 'admin/users';
$route['admin/properties'] = 'admin/properties';
$route['admin/propertyalert'] = 'admin/propertyalert';
$route['admin/newsletter'] = 'admin/newsletter';
$route['admin/auctions'] = 'admin/auction';
$route['admin/vacancies'] = 'admin/vacancies';
$route['admin/auctions/(:any)'] = 'admin/showAuction';
$route['admin/vacancies/download/(:any)'] = 'admin/downloadcv';
$route['admin/vacancies/(:any)'] = 'admin/showVacancy';
$route['admin/users/new'] = 'admin/createUser';
$route['admin/checkpasswordchange.php'] = 'admin/checkpasswordchange';
$route['admin/users/(:any)'] = "admin/userProfile";








$route['authenticate'] = 'home/authenticate';

$route['home/logout'] = 'home/logout';
$route['validate/(:any)'] = "home/validateToken";
$route['subscribeuser'] = 'home/subscribeuser';
$route['insertPropertyAlert'] = "home/insertPropertyAlert";

$route['register'] = 'home/register';
$route["$appended_lang/register"] = "home/register";


$route['profile'] = 'home/profile';
$route["$appended_lang/profile"] = "home/profile";


$route['shareProperty'] = 'home/shareProperty';
$route["$appended_lang/shareProperty"] = "home/shareProperty";


$route['viewAllProperties'] = 'home/viewAllProperties';
$route["$appended_lang/viewAllProperties"] = "home/viewAllProperties";

$route['propertyDetails'] = 'home/propertyDetails';
$route["$appended_lang/propertyDetails"] = "home/propertyDetails";

$route['careers'] = 'home/careers';
$route["$appended_lang/careers"] = "home/careers";

$route['uploadCV'] = 'home/uploadCV';
$route["$appended_lang/uploadCV"] = "home/uploadCV";

$route['uploadCV/(:any)'] = 'home/uploadCV';
$route["$appended_lang/uploadCV/(:any)"] = "home/uploadCV";

$route['joinUs'] = 'home/joinUs';
$route["$appended_lang/joinUs"] = "home/joinUs";


$route['marketIndex'] = 'home/marketIndex';
$route["$appended_lang/marketIndex"] = "home/marketIndex";

$route['auction'] = 'home/auction';
$route["$appended_lang/auction"] = "home/auction";


$route['compareProperties'] = 'home/compareProperties';
$route["$appended_lang/compareProperties"] = "home/compareProperties";

$route['getDistricts'] = 'home/getDistricts';








/* End of file routes.php */
/* Location: ./application/config/routes.php */