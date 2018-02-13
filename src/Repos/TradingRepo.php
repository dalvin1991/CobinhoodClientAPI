<?php 
namespace CobinhoodClientAPI\Repos;

use CobinhoodClientAPI\NonceGenerate;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;

class TradingRepo
{
    private $getOrderURL = '/v1/trading/orders/%s';
    private $getOrderTradesURL = '/v1/trading/orders/%s/trades';
    private $getOrdersURL = '/v1/trading/orders';
    private $placeOrdersURL = '/v1/trading/orders';
    private $modifyOrderURL = '/v1/trading/orders/%s';
    private $cancelOrderURL = '/v1/trading/orders/%s';
    private $getOrderHistoryURL = '/v1/trading/order_history';
    private $getTradeURL = '/v1/trading/trades/%s';
    private $getTradesURL = '/v1/trading/trades';
    
    public function getOrder($url,$apiKey,$orderID)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.sprintf($this->getOrderURL, $orderID), 
                [
                    'headers' => ['authorization' => $apiKey]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 
    
    public function getOrderTrades($url,$apiKey,$orderID)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.sprintf($this->getOrderTradesURL, $orderID), 
                [
                    'headers' => ['authorization' => $apiKey]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 

    public function getOrders($url,$apiKey,$tradingPairID,$limit)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.$this->getOrdersURL, 
                [
                    'headers' => ['authorization' => $apiKey],
                    'query' => [
                        'trading_pair_id' => $tradingPairID,
                        'limit' => $limit
                    ]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    }
    
    public function placeOrder($url,$apiKey,$nonce,$tradingPairID,$side,$type,$price,$size)
    {
        $client = new \GuzzleHttp\Client();
        //echo round(microtime(true) * 1000);
        try {
            $res = $client->request(
                'POST', 
                $url.$this->placeOrdersURL, 
                [
                    'headers' => [
                        'authorization' => $apiKey,
                        'nonce' => $nonce['result']['time'] //strval(intval($nonce['result']['time'])+100000)
                    ],
                    'form_params' => [
                                        'trading_pair_id' => $tradingPairID,
                                        'side' => $side,
                                        'type' => $type,
                                        'price' => $price,
                                        'size' => $size,
                    ]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    }

    public function modifyOrder($url,$apiKey,$nonce,$orderID,$price,$size)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'PUT', 
                $url.$this->modifyOrderURL, 
                [
                    'headers' => [
                        'authorization' => $apiKey,
                        'nonce' => $nonce['result']['time']
                    ],
                    'form_params' => [
                                        'order_id' => $orderID,
                                        'price' => $price,
                                        'size' => $size,
                    ]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    }

    public function cancelOrder($url,$apiKey,$nonce,$orderID)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'DELETE', 
                $url.$this->cancelOrderURL, 
                [
                    'headers' => [
                        'authorization' => $apiKey,
                        'nonce' => $nonce['result']['time']
                    ],
                    'form_params' => [
                                        'order_id' => $orderID
                    ]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    }

    public function getOrderHistory($url,$apiKey,$tradingPairID,$limit)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.$this->getOrderHistoryURL, 
                [
                    'headers' => ['authorization' => $apiKey],
                    'query' => [
                        'trading_pair_id' => $tradingPairID,
                        'limit' => $limit
                    ]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    }

    public function getTrade($url,$apiKey,$tradeID)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET',
                $url.sprintf($this->getTradeURL, $tradeID),
                [
                    'headers' => ['authorization' => $apiKey]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    }

    public function getTrades($url,$apiKey,$tradingPairID,$limit)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.$this->getTradesURL,
                [
                    'headers' => ['authorization' => $apiKey],
                    'query' => [
                        'trading_pair_id' => $tradingPairID,
                        'limit' => $limit
                    ]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    }
}

?>