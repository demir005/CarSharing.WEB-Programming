<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['contact/(:any)'] = 'contact/index/$1';
 
$route['posts/index'] = 'posts/index';
$route['posts/update']='posts/update';
$route['posts/create']='posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts']='posts/index/$1';


$route['default_controller'] = 'pages/view';


$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['comments'] = 'posts/view';




$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
