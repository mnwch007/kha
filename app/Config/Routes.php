<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Modules\Main\Controllers');
$routes->setDefaultController('Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('/', ['namespace' => 'App\Modules\Main\Controllers'], function ($routes) {
    $routes->get('', 'Main::index');
    $routes->get('en', 'Main::index');
    //$routes->get('lang/(:any)', 'Main::language_changer/$1');
    //$routes->get('change_pwd', 'Main::change_pwd');
});

$routes->group('', ['namespace' => 'App\Modules\Pages\Controllers'], function ($routes) {

    $routes->get('en/privacy-policy', 'Pages::privacy_policy');
    $routes->get('นโยบายความเป็นส่วนตัว', 'Pages::privacy_policy');

    $routes->get('terms-services', 'Pages::terms_services');
    $routes->get('en/terms-services', 'Pages::terms_services');

    $routes->get('en/projects', 'Pages::projects');
    $routes->get('en/projects/(:any)', 'Pages::projects_detail/$1');
    $routes->get('โครงการ', 'Pages::projects');
    $routes->get('โครงการ/(:any)', 'Pages::projects_detail/$1');

    $routes->get('en/news', 'Pages::news');
    $routes->get('en/news/(:any)', 'Pages::news_detail/$1');
    $routes->get('ข่าวสาร', 'Pages::news');
    $routes->get('ข่าวสาร/(:any)', 'Pages::news_detail/$1');

    $routes->get('en/about-us', 'Pages::abouts');
    $routes->get('en/about-us/(:any)', 'Pages::abouts/$1');
    $routes->get('รู้จักเคหะสุขประชา', 'Pages::abouts');
    $routes->get('รู้จักเคหะสุขประชา/(:any)', 'Pages::abouts/$1');

    $routes->get('en/investor', 'Pages::investor');
    $routes->get('en/investor/(:any)', 'Pages::investor/$1');
    $routes->get('en/investor/(:any)/(:any)', 'Pages::investor/$1/$2');
    $routes->get('นักลงทุนสัมพันธ์', 'Pages::investor');
    $routes->get('นักลงทุนสัมพันธ์/(:any)', 'Pages::investor/$1');
    $routes->get('นักลงทุนสัมพันธ์/(:any)/(:any)', 'Pages::investor/$1/$2');

    $routes->get('en/contact-us', 'Pages::contacts');
    $routes->get('en/contact-us/(:any)', 'Pages::contacts/$1');
    $routes->get('ติดต่อเรา', 'Pages::contacts');
    $routes->get('ติดต่อเรา/(:any)', 'Pages::contacts/$1');

    $routes->get('en/career', 'Pages::career');
    $routes->get('ร่วมงานกับเรา', 'Pages::career');

    $routes->get('gen_searchbox', 'Pages::gen_searchbox');
    $routes->post('gen_searchbox', 'Pages::gen_searchbox');

    $routes->get('subscribe', 'Pages::subscribe');
    $routes->post('subscribe', 'Pages::subscribe');

    $routes->get('(:any)', 'Pages::$1');
    $routes->get('(:any)/(:any)', 'Pages::$1/$2');
    $routes->get('(:any)/(:any)/(:any)', 'Pages::$1/$2/$3');

    //$routes->get('(:any)', 'Pages::not_found');
    //$routes->get('(:any)/(:any)', 'Pages::not_found');

    /* $routes->get('(:any)', 'Pages::$1');
      $routes->get('(:any)/(:any)', 'Pages::$1/$2');
      $routes->get('(:any)/(:any)/(:any)', 'Pages::$1/$2/$3');

      $routes->get('en/(:any)', 'Pages::$1');
      $routes->get('en/(:any)/(:any)', 'Pages::$1/$2');
      $routes->get('en/(:any)/(:any)/(:any)', 'Pages::$1/$2/$3');
     */


    // $routes->post('(:any)', 'Login::$1');
});

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


/*$modules_path = APPPATH . 'Modules/';
$modules = scandir($modules_path);
foreach ($modules as $module) {
    if ($module === '.' || $module === '..') {
        continue;
    }
    if (is_dir($modules_path) . '/' . $module) {
        // $routes_path = $modules_path . $module . '/../../Config/Routes.php';
        $routes_path = $modules_path . $module . '/Routes.php';
        if (file_exists($routes_path)) {
            //echo $routes_path.'<br/>';
            require $routes_path;
        } else {
            continue;
        }
    }
}
*/