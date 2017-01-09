<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "front";
$route['404_override'] = '';

$route['category/(:any)'] = 'front/category/$1/';
$route['category_product'] = 'front/category_product/';
$route['product'] = 'front/product/';

$route['product-detail'] = 'front/productdetail';
$route['product-category/(:any)'] = 'front/product_category/$1/';
$route['product/(:any)'] = 'front/product/$1/';
$route['page/(:any)'] = 'front/page/$1/';
$route['search/(:any)'] = 'front/search/$1/';
$route['search'] = 'front/search/';
$route['about-us'] = 'front/about/';
$route['our-story'] = 'front/our_story/';
$route['our-social-innovation'] = 'front/our_social_innovation/';
$route['our-heroes'] = 'front/our_heroes/';
$route['blog'] = 'front/blog/';
$route['blog/(:any)'] = 'front/blog/$1/';
$route['contact-us'] = 'front/contact/';
$route['ads/(:any)'] = 'front/ads/$1/';


$route['checkout'] = 'front/checkout/';
$route['cart'] = 'front/cart/';
$route['buy'] = 'front/buy/';
$route['thankyou'] = 'front/thankyou/';

$route['register'] = 'front/register/';
$route['log-in'] = 'front/login/';


/* End of file routes.php */
/* Location: ./application/config/routes.php */