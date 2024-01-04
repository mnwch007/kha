<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller {

    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['general', 'url'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        // Preload any models, libraries, etc, here.
        // E.g.: $this->session = \Config\Services::session();

        $response->removeHeader('Cache-Control');
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Cache-Control: no-cache");
        header("Pragma: no-cache");

        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->router = \Config\Services::router();

        $page_url_en = 'en';
        $page_url_th = '';
        if ($request->uri->getSegment(1) && $request->uri->getSegment(1) == 'en'):
            $this->language = \Config\Services::language();
            $this->language->setLocale($request->uri->getSegment(1));
            $this->lang = 'en';
            $this->lang_url = 'en';
            if ($request->getUri()->getTotalSegments() > 1):
                $page_url_en .= '/' . $request->uri->getSegment(2);
                $page_url_th .= $request->uri->getSegment(2);
            endif;
        else:
            $this->language = \Config\Services::language();
            $this->language->setLocale('th');
            $this->lang = 'th';
            $this->lang_url = '';

            if ($request->uri->getSegment(1)):
                $page_url_en .= '/' . $request->uri->getSegment(1);
                $page_url_th .= $request->uri->getSegment(1);
            endif;
            if ($request->getUri()->getTotalSegments() > 1):
                $page_url_en .= '/' . $request->uri->getSegment(2);
                $page_url_th .= '/' . $request->uri->getSegment(2);
            endif;
        endif;
        if ($request->getUri()->getTotalSegments() > 2):
            $page_url_en .= '/' . $request->uri->getSegment(3);
            $page_url_th .= '/' . $request->uri->getSegment(3);
        endif;
        if ($request->getUri()->getTotalSegments() > 3):
            $page_url_en .= '/' . $request->uri->getSegment(4);
            $page_url_th .= '/' . $request->uri->getSegment(4);
        endif;

        $this->page_url_en = $page_url_en;
        $this->page_url_th = $page_url_th;
    }

    public function __construct() {
        //$session = \Config\Services::session();
        //$language = \Config\Services::language();
        //$language->setLocale($session->scu_bulliontexweb_lang);
    }

    public function crop_upload($upload, $folder = 'uploads', $uid = true) {
        # Slim Upload
        $images = \App\Libraries\SlimCrop\Slim::getImages($upload);
        $data_information = '';
        foreach ($images as $image) {
            $files = array();
            if (isset($image['output']['data'])) {
                $name = $image['output']['name'];
                $data = $image['output']['data'];
                $data_information = \App\Libraries\SlimCrop\Slim::saveFile($data, $name, dirname($_SERVER["SCRIPT_FILENAME"]) . '/' . $folder, $uid);
            }
        }

        return $data_information;
    }

    public function now() {
        return date('Y-m-d H:i:s');
    }

    public function daterange_now() {
        return dateFormat(date('Y-m-d')) . ' - ' . dateFormat(date('Y-m-d'));
    }

    public function date_now() {
        return date('Y-m-d');
    }

    public function ip_address() {
        $request = \Config\Services::request();
        return $request->getIPAddress();
    }

    public function set_page_title($title = '') {
        $session = \Config\Services::session();
        $language = \Config\Services::language();
        $language->setLocale($session->scu_bulliontexweb_lang);
        return lang('global_lang.' . $title);
    }

}
