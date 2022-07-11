<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['login_validate'] = 'Login_controller/login_validate';
$route['logout'] = 'Login_controller/logout';
$route['login'] = 'Login_controller';
$route['registration'] = 'Login_controller/registration';
// $route['check_mail'] = 'Login_controller/check_mail';

$route['register_validate'] = 'Login_controller/register_validate';
// $route['otp_confirm/(:any)'] = 'Login_controller/otp_confirm/$i';
// $route['otp_confirm_update'] = 'Login_controller/otp_confirm_update';
// $route['delete_registraion/(:any)'] = 'Login_controller/delete_registraion/$i';
//
$route['admin_home'] = 'Admin_controller/admin_home';
$route['profile'] = 'Admin_controller/profile';
$route['profile_update'] = 'Admin_controller/profile_update';

$route['cat'] = 'Admin_controller/cat';
$route['cat_add'] = 'Admin_controller/cat_add';
$route['cat_edit/(:any)'] = 'Admin_controller/cat_edit/$i';
$route['cat_update'] = 'Admin_controller/cat_update';

$route['sub_cat'] = 'Admin_controller/sub_cat';
$route['sub_cat_add'] = 'Admin_controller/sub_cat_add';
$route['sub_cat_edit/(:any)'] = 'Admin_controller/sub_cat_edit/$i';
$route['sub_cat_update'] = 'Admin_controller/sub_cat_update';

//
$route['style'] = 'Admin_controller/style';
$route['style_add'] = 'Admin_controller/style_add';
$route['style_edit/(:any)'] = 'Admin_controller/style_edit/$i';
$route['style_update'] = 'Admin_controller/style_update';

$route['design'] = 'Admin_controller/design';
$route['design_add'] = 'Admin_controller/design_add';
$route['design_edit/(:any)'] = 'Admin_controller/design_edit/$i';
$route['design_update'] = 'Admin_controller/design_update';

$route['product_t'] = 'Admin_controller/product_t';
$route['product_t_add'] = 'Admin_controller/product_t_add';
$route['product_t_edit/(:any)'] = 'Admin_controller/product_t_edit/$i';
$route['product_t_update'] = 'Admin_controller/product_t_update';
$route['product_t_view'] = 'Admin_controller/product_t_view';
$route['get_designs'] = 'Admin_controller/get_designs';
$route['product_t_view'] = 'Admin_controller/product_t_view';


$route['t_home'] = 'Website_controller/t_home';
$route['t_product/(:any)'] = 'Website_controller/t_product/$i';
$route['t_product_delete/(:any)'] = 'Website_controller/t_product_delete/$i';
$route['t_product_edit/(:any)/(:any)'] = 'Website_controller/t_product_edit/$i/$j';
$route['t_product_update'] = 'Website_controller/t_product_update';
// my payment controller , faqs and contact us
$route['how_it_works'] = 'Website_controller/how_it_works';
$route['faq'] = 'Website_controller/faq';
$route['payment'] = 'Website_controller/payment';
// end of my payment controller , faqs and contact us
$route['t_product_update1'] = 'Website_controller/t_product_update1';
$route['t_cart'] = 'Website_controller/t_cart';
$route['t_cart_qty_update'] = 'Website_controller/t_cart_qty_update';
$route['t_order_placed'] = 'Website_controller/t_order_placed';
$route['t_orders'] = 'Website_controller/t_orders';
$route['t_orders_admin'] = 'Website_controller/t_orders_admin';
$route['t_order_view/(:any)'] = 'Website_controller/t_order_view/$i';
$route['t_order_view_admin/(:any)'] = 'Website_controller/t_order_view_admin/$i';
$route['t_order_approve/(:any)'] = 'Website_controller/t_order_approve/$i';
////////////////////////////////////////////////////////////
// $route['product'] = 'Admin_controller/product';
// $route['product_add'] = 'Admin_controller/product_add';
// $route['product_edit/(:any)'] = 'Admin_controller/product_edit/$i';
// $route['product_update'] = 'Admin_controller/product_update';
// $route['product_view'] = 'Admin_controller/product_view';

$route['get_subcategory'] = 'Admin_controller/get_subcategory';
$route['get_subcategory1'] = 'Admin_controller/get_subcategory1';
$route['get_styles'] = 'Admin_controller/get_styles';
$route['pending_seller'] = 'Admin_controller/pending_seller';
$route['approved_seller'] = 'Admin_controller/approved_seller';
$route['upd_cmy_appro/(:any)/(:any)'] = 'Admin_controller/upd_cmy_appro/$i/$j';
$route['reject_seller'] = 'Admin_controller/reject_seller';
$route['pending_ticket_pro'] = 'Admin_controller/pending_ticket_pro';
$route['reply_ticket_pro'] = 'Admin_controller/reply_ticket_pro';
$route['update_ticket_admin'] = 'Admin_controller/update_ticket_admin';
$route['seller_products'] = 'Admin_controller/seller_products';
$route['pending_orders_sellers'] = 'Admin_controller/pending_orders_sellers';
$route['orders_sellers'] = 'Admin_controller/orders_sellers';
$route['complete_orders_sellers'] = 'Admin_controller/complete_orders_sellers';
$route['rejected_orders_sellers'] = 'Admin_controller/rejected_orders_sellers';
$route['view_order_admin/(:any)'] = 'Admin_controller/view_order_admin/$i';
$route['payment_details_seller'] = 'Admin_controller/payment_details_seller';
$route['pro_qes_ans_admin'] = 'Admin_controller/pro_qes_ans_admin';
$route['stock_list'] = 'Admin_controller/stock_list';
$route['update_stock'] = 'Admin_controller/update_stock';
$route['public_feedback'] = 'Admin_controller/public_feedback';
$route['order_update_admin'] = 'Admin_controller/order_update_admin';

$route['seller_home'] = 'Seller_controller/seller_home';
$route['cm_profile_update'] = 'Seller_controller/cm_profile_update';
$route['profile_seller'] = 'Seller_controller/profile_seller';
$route['orders'] = 'Seller_controller/orders';
$route['view_order/(:any)'] = 'Seller_controller/view_order/$i';
$route['order_update'] = 'Seller_controller/order_update';
$route['pending_orders'] = 'Seller_controller/pending_orders';
$route['rejected_orders'] = 'Seller_controller/rejected_orders';
$route['complete_orders'] = 'Seller_controller/complete_orders';
$route['payment_details'] = 'Seller_controller/payment_details';
$route['raise_ticket_pro'] = 'Seller_controller/raise_ticket_pro';
$route['update_ticket'] = 'Seller_controller/update_ticket';
$route['pro_qes_ans_seller'] = 'Seller_controller/pro_qes_ans_seller';
$route['update_pro_qes_ans'] = 'Seller_controller/update_pro_qes_ans';
$route['pro_qes_ans_seller_c'] = 'Seller_controller/pro_qes_ans_seller_c';


$route['customer_home'] = 'Customer_controller/customer_home';
$route['orders_customer'] = 'Customer_controller/orders_customer';
$route['view_order_customer/(:any)'] = 'Customer_controller/view_order_customer/$i';
$route['cancel_order/(:any)'] = 'Customer_controller/cancel_order/$i';
$route['order_update_customer'] = 'Customer_controller/order_update_customer';
$route['wishlist_customer'] = 'Customer_controller/wishlist_customer';
$route['delete_wishlist/(:any)'] = 'Customer_controller/delete_wishlist/$i';
$route['pro_qes_ans_customer'] = 'Customer_controller/pro_qes_ans_customer';
$route['down_invocie/(:any)'] = 'Customer_controller/down_invocie/$i';

$route['website_home'] = 'Website_controller/website_home';
$route['product_v/(:any)'] = 'Website_controller/product_v/$i';
$route['qestion_pass'] = 'Website_controller/qestion_pass';
$route['qestion_vote'] = 'Website_controller/qestion_vote';
$route['review_vote'] = 'Website_controller/review_vote';
$route['cat_v/(:any)'] = 'Website_controller/cat_v/$i';
$route['add_to_cart'] = 'Website_controller/add_to_cart';
$route['add_to_wishlist'] = 'Website_controller/add_to_wishlist';
$route['customer_cart'] = 'Website_controller/customer_cart';
$route['cart_inc_dec'] = 'Website_controller/cart_inc_dec';
$route['cart_pro_remove'] = 'Website_controller/cart_pro_remove';
$route['order_placed'] = 'Website_controller/order_placed';
$route['sub_cat_v/(:any)'] = 'Website_controller/sub_cat_v/$i';
$route['product_search'] = 'Website_controller/product_search';
$route['contact'] = 'Website_controller/contact';
$route['send_feedback'] = 'Website_controller/send_feedback';


//order reports
$route['pro_reports'] = 'Admin_controller/pro_reports';

//delete unwanted img
$route['delete_img'] = 'Admin_controller/delete_img';

$route['default_controller'] = 'Login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
