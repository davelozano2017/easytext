<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//Costum Routes 

##################################################################################################
$route['login']                     = 'account/Login';
$route['register']                  = 'account/Register';
$route['activate/account/(:num)']   = 'account/ActivateAccount/account/$1';

$route['recover-choose-method']     = 'account/RecoverChooseMethod';
##################################################################################################

##################################################################################################
$route['recover-via-phone']         = 'account/RecoverViaPhone';
$route['phone-security-code']       = 'account/RecoverViaPhoneInsertSecurityCode';
$route['phone-change-password']     = 'account/RecoverViaPhoneChangePassword';
##################################################################################################

##################################################################################################
$route['email-security-code']       = 'account/RecoverViaEmailInsertSecurityCode';
$route['recover-via-email']         = 'account/RecoverViaEmail';
$route['email-change-password']     = 'account/RecoverViaEmailChangePassword';
##################################################################################################

##################################################################################################
$route['profile']                   = 'account/members/Profile';
$route['change-password']           = 'account/members/ChangePassword';
$route['add-contact']               = 'account/members/AddContact';
$route['compose']                   = 'account/members/Compose';
$route['my-contacts']               = 'account/members/MyContacts';
$route['show-contacts']             = 'account/members/ShowContacts';
$route['messages']                  = 'account/members/Messages';
$route['archieve']                  = 'account/members/Archieve';
$route['important']                 = 'account/members/Important';
$route['view/message/(:num)']       = 'account/members/Messages/view/$1';
$route['contact/edit/(:num)']       = 'account/members/EditContact/edit/$1';
##################################################################################################

##################################################################################################
$route['default_controller']        = 'Landing';
$route['404_override']              = '';
$route['translate_uri_dashes']      = TRUE;
##################################################################################################
