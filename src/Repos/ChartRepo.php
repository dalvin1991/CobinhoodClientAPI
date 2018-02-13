<?php 
namespace CobinhoodClientAPI\Repos;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;

class ChartRepo
{
    private $getCandlesURL='/v1/chart/candles/%s';

    public function getCandles($url, $tradingPairID, $timeframe, $startTime, $endTime)
    {
        $client = new \GuzzleHttp\Client();
        try {            
            $res = $client->request('GET', $url.sprintf($this->getCandlesURL, $tradingPairID),
            [
                'query' => 
                [
                    'timeframe' => $timeframe,
                    'start_time' => $startTime,
                    'end_time' => $endTime
                ]
            ]);
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    }    
}

?>