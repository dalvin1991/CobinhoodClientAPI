<?php 
namespace CobinhoodClientAPI\Repos;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;

class SystemRepo
{
    private $getTimeURL='/v1/system/time';
    private $getInfoURL='/v1/system/info';

    public function getTime($url)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url.$this->getTimeURL);
            return $res->getBody();
        } catch (RequestException $e) {
            $res = $e->getResponse();
            return $res->getBody()->getContents();  
        }
    }

    public function getInfo($url)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url.$this->getInfoURL);
            return $res->getBody();
        } catch (RequestException $e) {
            $res = $e->getResponse();
            return $res->getBody()->getContents();  
        }
    }    
}

?>