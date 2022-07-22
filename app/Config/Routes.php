<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

// general routes
$general_routes=[
    'saveFeedbackMessage/'=>'LandingController::insertFeedbackMessage',
    'generalShowPage/(:any)'=>'LandingController::showPage/$1',
];
foreach ($general_routes as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}

// admin routes
$admin_routes=[
    'adminShowPage/(:any)'=>'AdminController::showPage/$1',

    'adminSignIn/'=>'AdminController::signIn',
    'adminLogout/'=>'AdminController::logout',

    'adminEditDetails/'=>'AdminController::editDetails',
    'adminEditContrib/'=>'AdminController::editContributor',
    'adminEditBenef/'=>'AdminController::editBenef',
    'adminEditEventStatus'=>'AdminController::editEventStatus',

    'adminChangeMessageBenefId/'=>'AdminController::changeMessageBenefId',
    'adminBenefSendMessage/'=>'AdminController::benefSendMessage',

];
foreach ($admin_routes as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}


// user routes
$user_routes=[
    'userSignUp/'=>'UserController::signUp',
    'userSignIn/'=>'UserController::signIn',
    'userShowPage/(:any)'=>'UserController::userShowPage/$1',
];
foreach ($user_routes as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}

// benef routes
$benef_routes=[
    'benefShowPage/(:any)'=>'BeneficiaryController::showPage/$1',

    'benefAddSuggestion/'=>'BeneficiaryController::addSuggestion',
    'benefAddContributor/'=>'BeneficiaryController::addContributor',
    'benefEditDetails/'=>'BeneficiaryController::editDetails',
    'benefChangeMessageAdminId/'=>'BeneficiaryController::changeMessageAdminId',
    'benefAdminSendMessage/'=>'BeneficiaryController::adminSendMessage',

    'benefLogout/'=>'BeneficiaryController::logout',
];
foreach ($benef_routes as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}

// contrib routes
$contrib_routes=[
    'contribShowPage/(:any)'=>'ContributorController::showPage/$1',
    
    'contribEditDetails'=>'ContributorController::editDetails',
    'contribDonate/'=>'ContributorController::donate',

    'contribLogout/'=>'ContributorController::logout',
];
foreach($contrib_routes as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}

// api_routes
$api_routes=[
    'api/ApiDoc'=>'ApiController::showApiDoc/',
    'api/allBeneficiaries'=>'ApiController::getAllBeneficiaries',
    'api/allContributors'=>'ApiController::getAllContributors',
    'api/allEvents'=>'ApiController::getAllEvents',
    'api/allFinancials'=>'ApiController::getAllFinancials',
    'api/allSuggestions'=>'ApiController::getAllSuggestions',
    'api/allOpportunities'=>'ApiController::getAllOpportunities',

];
foreach($api_routes as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
