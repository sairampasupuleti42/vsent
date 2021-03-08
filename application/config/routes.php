<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'api';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['api'] = "api/index";
$route['api/user/auth'] = "user/auth";
$route['api/products'] = "product/index";
$route['api/product/add'] = "product/add";

$route['api/variants'] = "product/variants";
$route['api/variant/add'] = "product/variant_add";
$route['api/orders/counter-order/variants'] = "product/variants-order-contents";
$route['api/orders/counter-order'] = "orders/counter-order";
$route['api/orders/counter-orders'] = "orders/counter-orders";
$route['api/orders/counter-orders/(:any)'] = "orders/counter-orders/$1";
//$route['api/orders/counter-orders/(:number)']="orders/counter-orders/$1";
$route['api/product/delete/(:num)'] = "product/remove/$1";