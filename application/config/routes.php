<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$appended_lang = "(?:[a-zA-Z]{2}/?)?"; 
$prepended_lang = "(?:[a-zA-Z]{2}/)?"; 

$route['default_controller'] = "home";
$route["$appended_lang"] = "home";


$route['404_override'] = '';

$route['admin'] = 'admin';
$route['admin/script'] = 'admin/script';
$route['admin/users'] = 'admin/users';
$route['admin/alert'] = 'admin/checkPropertyAlert';
$route['admin/content'] = 'admin/content';
$route['admin/content/new'] = 'admin/addContent';
$route['admin/deletecontent/(:any)'] = 'admin/deleteContent';
$route['admin/editcontent/(:any)'] = 'admin/editContent';

$route['admin/sendall'] = 'admin/newsletterSend';

$route['admin/properties'] = 'admin/properties';
$route['admin/propertyalert'] = 'admin/propertyalert';
$route['admin/newsletter'] = 'admin/newsletter';
$route['admin/auctions'] = 'admin/auction';
$route['admin/courses'] = 'admin/courses';
$route['admin/courses/new'] = 'admin/newCourse';
$route['admin/courses/(:any)'] = 'admin/showCourse';

$route['admin/auctions/new'] = 'admin/NewAuction';
$route['admin/vacancies/new'] = 'admin/NewVacancy';
$route['admin/vacancies'] = 'admin/vacancies';
$route['admin/auctions/(:any)'] = 'admin/showAuction';
$route['admin/properties/(:any)'] = 'admin/showProperty';
$route['admin/vacancies/download/(:any)'] = 'admin/downloadcv';
$route['admin/vacancies/(:any)'] = 'admin/showVacancy';
$route['admin/users/new'] = 'admin/createUser';
$route['admin/checkpasswordchange.php'] = 'admin/checkpasswordchange';
$route['admin/users/(:any)'] = "admin/userProfile";




// $route['mail'] = 'home/sendMail';




$route['authenticate'] = 'home/authenticate';

$route['logout'] = 'home/logout';
$route["$appended_lang/logout"] = "home/logout";



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

$route['trainingCenter'] = 'home/trainingCenter';
$route["$appended_lang/trainingCenter"] = "home/trainingCenter";

$route['getDistricts'] = 'home/getDistricts';

$route['forgotPassword'] = 'home/forgotPassword';
$route["$appended_lang/forgotPassword"] = "home/forgotPassword";

$route['resetpassword/(:any)'] = 'home/resetpassword';
$route["$appended_lang/resetpassword/(:any)"] = "home/resetpassword";

$route['offices'] = 'home/offices';
$route["$appended_lang/offices"] = "home/offices";


$route["$appended_lang/home"] = "home";




/* End of file routes.php */
/* Location: ./application/config/routes.php */