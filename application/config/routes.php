<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'api';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['api'] = "api/index";
$route['api/user/auth'] = "user/auth";
//Dashboard
$router['api'] = "api/dashboard"; // Dashboard api
//Products
$route['api/products'] = "product/index";  //list of products
$route['api/product/add'] = "product/add"; // add product
$route['api/product/delete/(:num)'] = "product/remove/$1"; //remove  product


// Variants to Add order
$route['api/order/variants'] = "product/variants-for-order-contents";

//Variants
$route['api/variants'] = "product/variants";  // list variants
$route['api/variant/add'] = "product/variant_add"; // add variant

//Orders
$route['api/orders'] = "orders/all";  // Fetch Orders
$route['api/orders/unpaid'] = "orders/unpaid";  // Fetch Orders
$route['api/orders/order'] = "orders/add";  // Add Order
$route['api/orders/order/(:any)'] = "orders/order/$1"; // get order

// Users
$route['api/user/add'] = "user/add";  // Addt User
$route['api/users'] = "user/all";  // Fetch Users
$route['api/users/drivers'] = "user/all-drivers";  // Fetch Users
$route['api/user/(:num)'] = "user/details/$1";  // get User
$route['api/user/delete/(:num)'] = "user/delete/$1";  // get User


