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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['product/category'] = 'ProductController/category';
$route['product/create-product-category'] = 'ProductController/createProductCategory';
$route['product/edit-category/(:any)'] = 'ProductController/editCategory/$1';
$route['product/edit-product-name/(:any)'] = 'ProductController/editProductName/$1';
$route['product/product'] = 'ProductController/product';
$route['product/create-product'] = 'ProductController/createProduct';

$route['operation/category'] = 'OperationController/category';
$route['operation/create-category'] = 'OperationController/createCategory';
$route['operation/edit-category/(:any)'] = 'OperationController/editCategory/$1';
$route['operation/delete-category/(:any)'] = 'OperationController/deleteCategory/$1';
$route['operation/operation-name'] = 'OperationController/operationName';
$route['operation/create-operation-name'] = 'OperationController/createOperationName';
$route['operation/edit-operation-name/(:any)'] = 'OperationController/editOperationName/$1';
$route['operation/delete-operation-name/(:any)'] = 'OperationController/deleteOperationName/$1';
$route['operation/expenditure'] = 'OperationController/expenditure';
$route['operation/create-expenditure'] = 'OperationController/createExpenditure';
$route['operation/edit-expenditure/(:any)'] = 'OperationController/editExpenditure/$1';
$route['operation/delete-expenditure/(:any)'] = 'OperationController/deleteExpenditure/$1';
//Patient Admission
//$route['admission'] = 'AdmissionController/index';
//$route['admission/create-admission'] = 'AdmissionController/createAdmission';
//$route['admission/edit-admission/(:any)/(:any)'] = 'AdmissionController/editAdmission/$1/$2';
//$route['admission/update-admission'] = 'AdmissionController/updateAdmission';
$route['admission/admission-invoice'] = 'AdmissionController/admissionInvoice';
$route['admission/admission-create-invoice'] = 'AdmissionController/admissionCreateInvoice';
$route['admission/edit-admission-invoice/(:any)'] = 'AdmissionController/editAdmissionInvoice/$1';
$route['admission/update-admission-invoice'] = 'AdmissionController/updateAdmissionInvoice';
$route['admission/print-invoice/(:any)'] = 'AdmissionController/printInvoice/$1';
$route['admission/delete-admission-invoice/(:any)'] = 'AdmissionController/deleteAdmissionInvoice/$1';
$route['admission/operation-details'] = 'AdmissionController/operationDetails';
$route['admission/edit-operation-details/(:any)/(:any)'] = 'AdmissionController/editOperationDetails/$1/$2';
$route['admission/update-operation-details/(:any)'] = 'AdmissionController/updateOperationDetails/$1';
$route['admission/operation-details-invoice'] = 'AdmissionController/operationDetailsInvoice';
$route['admission/patient-admission-info'] = 'AdmissionController/patientAdmissionInfo';
$route['admission/invoice-individual/(:any)'] = 'AdmissionController/invoiceIndividual/$1';
$route['admission/delete-operation-details/(:any)'] = 'AdmissionController/deleteOperationDetails/$1';

