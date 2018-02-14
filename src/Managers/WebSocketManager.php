<?php 
namespace CobinhoodClientAPI\Managers;

use WebSocket\Client;
use \DateTime;
use \DateInterval;
use \Exception;

class WebSocketManager
{
    public function startOrderWS($wss,$apiKey,$keepAlive,$timeout,$class,$functionName)
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
                    if($class)
                    {
                        call_user_func_array(array($class, $functionName), array($message));
                    }
                    else
                    {
                        echo $message. "</br>";   
                    }   

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

    public function startTradesWS($wss,$tradingPairID,$keepAlive,$timeout,$class,$functionName)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout
        ));
        
        if(is_array($tradingPairID))
        {
            foreach ($tradingPairID as $item)
            {
                $client->send(json_encode([
                    "action" => "subscribe",
                    "type" => "trade",
                    "trading_pair_id" => $item
                ]));                               
            }
        }
        else
        {
            $client->send(json_encode([
                "action" => "subscribe",
                "type" => "trade",
                "trading_pair_id" => $tradingPairID
            ]));
        } 

        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $date->add(new DateInterval('PT' . 5 . 'S'));

        while (true) {
            try
            {
                $message = $client->receive(); 
                if ($message) {
                    if($class)
                    {
                        call_user_func_array(array($class, $functionName), array($message));
                    }
                    else
                    {
                        echo $message. "</br>";   
                    } 

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

    public function startOrderBookWS($wss,$tradingPair,$keepAlive,$timeout,$class,$functionName)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout
        ));
        
        foreach ($tradingPair as $item)
        {
            $client->send(json_encode([
                "action"=>"subscribe",
                "type"=>"order-book",
                "trading_pair_id"=>$item["tradingPairID"],
                "precision"=>$item["precision"]
            ]));                            
        }
        
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $date->add(new DateInterval('PT' . 5 . 'S'));
        
        while (true) {
            try
            {
                $message = $client->receive();
                if ($message) {
                    if($class)
                    {
                        call_user_func_array(array($class, $functionName), array($message));
                    }
                    else
                    {
                        echo $message. "</br>";   
                    } 

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

    public function startTinkerWS($wss,$tradingPairID,$keepAlive,$timeout,$class,$functionName)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout
        ));
        
        if(is_array($tradingPairID))
        {
            foreach ($tradingPairID as $ID)
            {
                $client->send(json_encode([
                    "action"=>"subscribe",
                    "type"=>"ticker",
                    "trading_pair_id"=>$ID
                ]));                                
            }
        }
        else
        {
            $client->send(json_encode([
                "action"=>"subscribe",
                "type"=>"ticker",
                "trading_pair_id"=>$tradingPairID
            ]));
        }        
        
        $date = DateTime::createFromFormat('U.u', microtime(TRUE));
        $date->add(new DateInterval('PT' . 5 . 'S'));
        
        while (true) {
            try
            {
                $message = $client->receive();
                if ($message) {
                    call_user_func_array(array(new CustomFunction, 'LogMessage'), array($message));
                    //call_user_func(array('\CustomFunction', 'LogMessage',$message));
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

    public function startCandlesWS($wss,$tradingPair,$keepAlive,$timeout)
    {
        $client = new Client($wss, array(
            'timeout' => $timeout
        ));
        
        foreach ($tradingPairID as $item)
        {
            $client->send(json_encode([
                "action"=>"subscribe",
                "type"=>"candle",
                "trading_pair_id"=>$item["tradingPairID"],
                "timeframe"=>$item["timeframe"]
            ]));                                
        }
        
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