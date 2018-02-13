<?php 
namespace CobinhoodClientAPI\Managers;

use WebSocket\Client;
use \DateTime;
use \DateInterval;
use \Exception;

class WebSocketManager
{
    public function startOrderWS($wss,$apiKey,$keepAlive,$timeout)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout,
            'headers' => array('authorization' => $apiKey)
        ));

        $client->send(json_encode([
            "action"=>"subscribe",
            "type"=>"order"
        ]));
        
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $date->add(new DateInterval('PT' . 5 . 'S'));
        
        while (true) {
            try
            {
                $message = $client->receive();
                if ($message) {
                    echo $message. "</br>";
                    if ($date < DateTime::createFromFormat('U.u', microtime(TRUE)) && $keepAlive) {
                        $client->send(json_encode(["action"=>"ping"]));
                        $date->add(new DateInterval('PT' . 5 . 'S'));
                    }
                }
            }
            catch(Exception $e)
            {
                echo "Socket Timeout";
                break;
            }            
        } 
    }

    public function startTradesWS($wss,$tradingPairID,$keepAlive,$timeout)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout
        ));
        
        $client->send(json_encode([
            "action" => "subscribe",
            "type" => "trade",
            "trading_pair_id" => $tradingPairID
        ]));
        
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $date->add(new DateInterval('PT' . 5 . 'S'));

        while (true) {
            try
            {
                $message = $client->receive(); 
                if ($message) {
                    echo $message. "</br>";
                    if ($date < DateTime::createFromFormat('U.u', microtime(TRUE)) && $keepAlive) {
                        $client->send(json_encode(["action"=>"ping"]));
                        $date->add(new DateInterval('PT' . 5 . 'S'));
                    }
                }
            }
            catch(Exception $e)
            {
                echo "Socket Timeout";
                break;
            }            
        } 
    }

    public function startOrderBookWS($wss,$tradingPairID,$precision,$keepAlive,$timeout)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout
        ));
        
        $client->send(json_encode([
            "action"=>"subscribe",
            "type"=>"order-book",
            "trading_pair_id"=>$tradingPairID,
            "precision"=>$precision
        ]));
        
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $date->add(new DateInterval('PT' . 5 . 'S'));
        
        while (true) {
            try
            {
                $message = $client->receive();
                if ($message) {
                    echo $message. "</br>";
                    if ($date < DateTime::createFromFormat('U.u', microtime(TRUE)) && $keepAlive) {
                        $client->send(json_encode(["action"=>"ping"]));
                        $date->add(new DateInterval('PT' . 5 . 'S'));
                    }
                }
            }
            catch(Exception $e)
            {
                echo "Socket Timeout";
                break;
            }            
        } 
    }

    public function startTinkerWS($wss,$tradingPairID,$keepAlive,$timeout)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout
        ));
        
        $client->send(json_encode([
            "action"=>"subscribe",
            "type"=>"ticker",
            "trading_pair_id"=>$tradingPairID
        ]));
        
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $date->add(new DateInterval('PT' . 5 . 'S'));
        
        while (true) {
            try
            {
                $message = $client->receive();
                if ($message) {
                    echo $message. "</br>";
                    if ($date < DateTime::createFromFormat('U.u', microtime(TRUE)) && $keepAlive) {
                        $client->send(json_encode(["action"=>"ping"]));
                        $date->add(new DateInterval('PT' . 5 . 'S'));
                    }
                }
            }
            catch(Exception $e)
            {
                echo "Socket Timeout";
                break;
            }            
        } 
    }

    public function startCandlesWS($wss,$timeframe,$tradingPairID,$keepAlive,$timeout)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout
        ));
        
        $client->send(json_encode([
            "action"=>"subscribe",
            "type"=>"candle",
            "trading_pair_id"=>$tradingPairID,
            "timeframe"=>$timeframe
        ]));
        
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $date->add(new DateInterval('PT' . 5 . 'S'));
        
        while (true) {
            try
            {
                $message = $client->receive();
                if ($message) {
                    echo $message. "</br>";
                    if ($date < DateTime::createFromFormat('U.u', microtime(TRUE)) && $keepAlive) {
                        $client->send(json_encode(["action"=>"ping"]));
                        $date->add(new DateInterval('PT' . 5 . 'S'));
                    }
                }
            }
            catch(Exception $e)
            {
                echo "Socket Timeout";
                break;
            }            
        } 
    }
}

?>