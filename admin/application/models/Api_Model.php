<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Api_Model extends CI_Model
{
    public $api_url = "http://www.api.com/";
    public $api_key = "";

    function __construct() {
        $this->load->library('Zend');
		$this->zend->load('Zend/Loader');
		Zend_Loader::loadClass('Zend_Http_Client');
    }

    public function call($type = 'POST', $method = '', $headers = array(), $data = array(), $getarray = true)
    {

        $client = new Zend_Http_Client($this->api_url . $method, array(
            'maxredirects' => 3,
            'timeout' => 30
        ));

        $client->setHeaders($headers);
        $response = $client->setRawData(json_encode($data), 'application/json')->request($type);

        if ($response->isSuccessful())
            return json_decode($response->getBody(), $getarray);
        else
            return json_decode($response->getRawBody(), $getarray);
    }

    public function callform($type = 'POST', $method = '', $headers = array(), $data = array(), $getarray = true) {

        $client = new Zend_Http_Client($this->api_url . $method, array(
            'maxredirects' => 3,
            'timeout' => 30
        ));

        $client->setHeaders($headers);

        if (strtolower($type) == 'get') {
            $client->setParameterGet($data);
        } else if (strtolower($type) == 'post') {
            $client->setParameterPost($data);
        }

        $response = $client->request($type);

        if ($response->isSuccessful())
            return json_decode($response->getBody(), $getarray);
        else
            return json_decode($response->getRawBody(), $getarray);
    }

    public function callformoth($type = 'POST', $method = '', $headers = array(), $data = array(), $getarray = true) {

        $client = new Zend_Http_Client($method, array(
            'maxredirects' => 3,
            'timeout' => 30
        ));

        $client->setHeaders($headers);

        if (strtolower($type) == 'get') {
            $client->setParameterGet($data);
        } else if (strtolower($type) == 'post') {
            $client->setParameterPost($data);
        }

        $response = $client->request($type);

        if ($response->isSuccessful())
            return json_decode($response->getBody(), $getarray);
        else
            return json_decode($response->getRawBody(), $getarray);
    }

    public function getJson($method = '', $json = true) {
        $contents = file_get_contents($this->api_url . $method);
        return json_decode($contents, $json);
    }

    public function postJson($method = '', $data = array(), $json = true) {
        $post_data = http_build_query($data);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $post_data
            )
        );
        
        $context  = stream_context_create($opts);
        $contents = file_get_contents($this->api_url . $method, false, $context);

        return json_decode($contents, $json);
    }

    public function postJsonOth($method = '', $headers = '', $data = array(), $json = true) {
        $post_data = http_build_query($data);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => $headers,
                'content' => $post_data
            )
        );
        
        $context  = stream_context_create($opts);
        $contents = file_get_contents($method, false, $context);

        return json_decode($contents, $json);
    }

    public function uploadform($type = 'POST', $method = '', $headers = array(), $data = array(), $getarray = true) {
        $client = new Zend_Http_Client($this->api_url . $method, array(
            'maxredirects' => 3,
            'timeout' => 30
        ));
        $client->setHeaders($headers);

        if(count($data) > 0) {
            foreach ($data as $key => $row) {
                if($row != "") {
                    $client->setFileUpload($row, $key);
                }
            }
        }
        
         // this must be either POST or PUT
         $response = $client->request($type);

         if ($response->isSuccessful())
             return json_decode($response->getBody(), $getarray);
         else
             return json_decode($response->getRawBody(), $getarray);
    }


    
}
