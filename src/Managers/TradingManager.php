<?php 
namespace CobinhoodClientAPI\Managers;

use CobinhoodClientAPI\Repos\TradingRepo;

class TradingManager
{
    public function getOrder($url,$apiKey,$orderID)
    {
        $repo = new TradingRepo();
        return $repo->getOrder($url,$apiKey,$orderID);
    }

    public function getOrderTrades($url,$apiKey,$orderID)
    {
        $repo = new TradingRepo();
        return $repo->getOrderTrades($url,$apiKey,$orderID);
    }

    public function getOrders($url,$apiKey,$tradingPairID,$limit)
    {
        $repo = new TradingRepo();
        return $repo->getOrders($url,$apiKey,$tradingPairID,$limit);
    }

    public function placeOrder($url,$apiKey,$nonceJson,$tradingPairID,$side,$type,$price,$size)
    {
        $repo = new TradingRepo();
        $nonce = json_decode($nonceJson, true);
        return $repo->placeOrder($url,$apiKey,$nonce,$tradingPairID,$side,$type,$price,$size);
    }

    public function modifyOrder($url,$apiKey,$nonceJson,$orderID,$price,$size)
    {
        $repo = new TradingRepo();
        $nonce = json_decode($nonceJson, true);
        return $repo->modifyOrder($url,$apiKey,$nonce,$orderID,$price,$size);
    }

    public function cancelOrder($url,$apiKey,$nonceJson,$orderID)
    {
        $repo = new TradingRepo();
        $nonce = json_decode($nonceJson, true);
        return $repo->cancelOrder($url,$apiKey,$nonce,$orderID);
    }

    public function getOrderHistory($url,$apiKey,$tradingPairID,$limit)
    {
        $repo = new TradingRepo();
        return $repo->getOrderHistory($url,$apiKey,$tradingPairID,$limit);
    }

    public function getTrade($url,$apiKey,$tradeID)
    {
        $repo = new TradingRepo();
        return $repo->getTrade($url,$apiKey,$tradeID);
    }

    public function getTrades($url,$apiKey,$tradingPairID,$limit)
    {
        $repo = new TradingRepo();
        return $repo->getTrades($url,$apiKey,$tradingPairID,$limit);
    }
}

?>