<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['company'] = 'Controller_company/index';
$route['addCompany'] = 'Controller_company/addCompany';
$route['sharing'] = 'Controller_sharing/index';