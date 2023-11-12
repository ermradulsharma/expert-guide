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
$route['default_controller'] = 'frontend';
$route['about'] = 'frontend/about';
$route['blog'] = 'frontend/blog';
$route['blog_singel'] = 'frontend/blog_singel';
$route['contact'] = 'frontend/contact';
$route['courses'] = 'frontend/courses';
$route['courses_singel'] = 'frontend/courses_singel';
$route['events'] = 'frontend/events';
$route['events_singel'] = 'frontend/events_singel';
$route['index'] = 'frontend/index';
$route['shop'] = 'frontend/shop';
$route['shop_singel'] = 'frontend/shop_singel';
$route['teachers'] = 'frontend/teachers';
$route['teachers_singel'] = 'frontend/teachers_singel';
$route['signin'] = 'frontend/signin';
$route['registration'] = 'frontend/registration';
$route['jodi'] = 'frontend/jodi';
$route['penal'] = 'frontend/penal';
$route['satta-matka-vip-membership'] = 'frontend/satta_matka_vip_membership';
$route['time-bazar-matka-chart'] = 'frontend/time_bazar_matka_chart';
$route['weekly-jodi-panna-all-satta-matka-cards'] = 'frontend/weekly_jodi_panna_all_satta_matka_cards';
$route['satta-matka-tips-today-free-samajseva-game'] = 'frontend/satta_matka_tips_today_free_samajseva_game';
$route['satta-matka-guessing-forum'] = 'frontend/satta_matka_guessing_forum';
$route['all-satta-matka-and-jodi-patti-records'] = 'frontend/all_satta_matka_and_jodi_patti_records';
$route['daily-single-and-chart-matka-trick'] = 'frontend/daily_single_and_chart_matka_trick';
$route['morning-day'] = 'frontend/morning_day';
$route['satyam-matka-jodi-chart'] = 'frontend/satyam_matka_jodi_chart';
$route['bhendibazar-matka-jodi-chart'] = 'frontend/bhendibazar_matka_jodi_chart';
$route['aishwarya-matka-jodi-chart'] = 'frontend/aishwarya_matka_jodi_chart';
$route['rajdhani-night-matka-jodi-chart'] = 'frontend/rajdhani_night_matka_jodi_chart';
$route['rajdhani-day-matka-jodi-chart'] = 'frontend/rajdhani_day_matka_jodi_chart';
$route['shridevi-matka-jodi-chart'] = 'frontend/shridevi_matka_jodi_chart';
$route['madhuri-matka-jodi-chart'] = 'frontend/madhuri_matka_jodi_chart';
$route['kalyan-night-matka-jodi-chart'] = 'frontend/kalyan_night_matka_jodi_chart';
$route['shridevi-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/shridevi_matka_panel_chart_pana_chart_patti_chart';
$route['madhuri-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/madhuri_matka_panel_chart_pana_chart_patti_chart';
$route['kalyan-night-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/kalyan_night_panel_chart_pana_chart_patti_chart';



$route['main-bazar-matka-jodi-chart'] = 'frontend/main_bazar_matka_jodi_chart';
$route['kalyan-matka-jodi-chart'] = 'frontend/kalyan_matka_jodi_chart';
$route['time-bazar-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/time_bazar_matka_panel_chart_pana_chart_patti_chart';
$route['kalyan-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/kalyan_matka_panel_chart_pana_chart_patti_chart';
$route['main-bazar-matka-panel-chart'] = 'frontend/main_bazar_matka_panel_chart';

$route['milan-day-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/milan_day_matka_panel_chart_pana_chart_patti_chart';
$route['milan-night-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/milan_night_matka_panel_chart_pana_chart_patti_chart';
$route['milan-night-matka-jodi-chart'] = 'frontend/milan_night_matka_jodi_chart';
$route['milan-day-matka-jodi-chart'] = 'frontend/milan_day_matka_jodi_chart';

$route['rajdhani-day-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/rajdhani_day_matka_panel_chart_pana_chart_patti_chart';
$route['rajdhani-night-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/rajdhani_night_matka_panel_chart_pana_chart_patti_chart';
$route['aishwarya-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/aishwarya_matka_panel_chart_pana_chart_patti_chart';
$route['bhendibazar-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/bhendibazar_matka_panel_chart_pana_chart_patti_chart';
$route['satyam-matka-panel-chart-pana-chart-patti-chart'] = 'frontend/satyam_matka_panel_chart_pana_chart_patti_chart';
$route['morning-day-panel-chart'] = 'frontend/morning_day_panel_chart';
$route['guessing-forum'] = 'frontend/guessing_forum';
$route['signin'] = 'frontend/signin';
$route['user/jodhi'] = 'frontend/jodhi_reulsts';
$route['user/panels'] = 'frontend/panel_reulsts';
$route['thankyou'] = 'frontend/thankyou';
$route['medicine_test'] = 'admin/medicine_test';
$route["admin/wallet/(:any)/status/(:any)"]="admin/wallet_status/$1/$2";

#$route['Login'] = 'login/signIn';
#$route['Logout'] = 'login/logout';	
#$route['SignUp'] = 'login/viewSignUp';
#$route['Dashboard'] = 'crud/dashboard';
#$route['resetpass'] = 'crud/Add_Reset_password';
#$route['To_Do'] = 'crud/Add_Todo_data';
#$route['UserSignup'] = 'login/User_SignUP';
#$route['UserList'] = 'crud/List_user';
#$route['AddUser'] = 'crud/Add_User';
#$route['User_Delet'] = 'crud/user_delet';
#$route['Groups'] = 'crud/ListGroup';
#$route['Update_Todo'] = 'crud/Update_Tododata';
#$route['groupdata'] = 'crud/groupDataByID';
#$route['Update_group'] = 'crud/Update_Group';
#$route['permissions'] = 'crud/View_permissions';
#$route['add_category'] = 'crud/Add_CategoryData';
#$route['category'] = 'crud/view_category';
#$route['cattegorybyid'] = 'crud/CategoryById';
#$route['subcategory'] = 'crud/view_subcategory';
#$route['subcattegorybyid'] = 'crud/GetsubcategoryByid';
#$route['brand'] = 'crud/view_brand';
#$route['brandbyid'] = 'crud/GetBrandById';
#$route['color'] = 'crud/view_color';
#$route['colorbyid'] = 'crud/GetcolorById';
#$route['size'] = 'crud/view_size';
#$route['sizebyid'] = 'crud/GetSizeById';
#$route['categoryby'] = 'crud/Get_categoryByID';
#$route['add_subcategory'] = 'crud/Add_SubCategoryData';
#$route['ProductSubmit'] = 'crud/Add_ProductData';
#$route['addsize'] = 'crud/Add_SizeData';
#$route['addcolor'] = 'crud/Add_ColorData';
#$route['addbrand'] = 'crud/Add_BrandData';
#$route['Product'] = 'crud/View_Product';
#$route['prodata'] = 'crud/Getprodatabyid';
#$route['Profile'] = 'crud/View_profile';
#$route['prolist'] = 'crud/product_list';
#$route['viewpro'] = 'crud/product_details';
#$route['Unlink'] = 'crud/UnlinkImage';
#$route['ProductUpdate'] = 'crud/UpdateProduct';
#$route['Deletproduct'] = 'crud/Delet_ProductInfo';
#$route['userupdate'] = 'crud/Update_Value';
#$route['Retriev'] = 'login/forgotten_page';
#$route['password'] = 'login/forgot_password';
#$route['Reset_password'] = 'login/Reset_View';
#$route['password_validation'] = 'login/Reset_password_validation';
#$route['Download'] = 'crud/Download_image';
#$route['View'] = 'crud/View_userDataBYID';
#$route['Confirm_Account'] = 'login/verification_confirm';
#$route['backupdb'] = 'crud/Backup_page';
#$route['Backup'] = 'crud/Backup_Database';
#$route['Settings'] = 'crud/Site_Settings';
#$route['setSettings'] = 'crud/Add_Settings';
/*Static html page*/
#$route['Static-forms-validation'] = 'Static_html/Forms_validation';


$route['404_override'] = 'Errors';
$route['translate_uri_dashes'] = FALSE;
