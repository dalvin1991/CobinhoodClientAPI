<?php 
namespace CobinhoodClientAPI\Repos;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;

class MarketRepo
{
    private $getCurrenciesURL = '/v1/market/currencies';
    private $getTradingPairsURL = '/v1/market/trading_pairs';
    private $getOrderBooksURL = '/v1/market/orderbooks/%s';
    private $getStatsURL = '/v1/market/stats';
    private $getTickersURL = '/v1/market/tickers/%s';
    private $getRecentTradesURL = '/v1/market/trades/%s';

    public function getCurrencies($url)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url.$this->getCurrenciesURL);
            return $res->getBody();
        } catch (RequestException $e) {
            $res = $e->getResponse();
            return $res->getBody()->getContents();  
        }
    }

    public function getTradingPairs($url)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url.$this->getTradingPairsURL);
            return $res->getBody();
        } catch (RequestException $e) {
            $res = $e->getResponse();
            return $res->getBody()->getContents();  
        }
    } 
    
    public function getOrderBooks($url,$tradingPairID,$limit)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url.sprintf($this->getOrderBooksURL, $tradingPairID),
            [
                'query' => ['limit' => $limit]
            ]);
            return $res->getBody();
        } catch (RequestException $e) {
            $res = $e->getResponse();
            return $res->getBody()->getContents();  
        }
    } 

    public function getStats($url)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url.$this->getStatsURL);
            return $res->getBody();
        } catch (RequestException $e) {
            $res = $e->getResponse();
            return $res->getBody()->getContents();  
        }
    } 

    public function getTickers($url,$tradingPairID)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url.sprintf($this->getTickersURL, $tradingPairID));
            return $res->getBody();
        } catch (RequestException $e) {
            $res = $e->getResponse();
            return $res->getBody()->getContents();  
        }
    } 

    public function getRecentTrades($url,$tradingPairID,$limit)
    {
        $client = new \GuzzleHttp\Client();
        try {            
            $res = $client->request('GET', $url.sprintf($this->getRecentTradesURL, $tradingPairID),
            [
                'query' => ['limit' => $limit]
            ]);
            return $res->getBody();
        } catch (RequestException $e) {
            $res = $e->getResponse();
            return $res->getBody()->getContents();  
        }
    } 
    
}

?>