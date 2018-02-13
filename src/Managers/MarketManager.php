<?php 
namespace CobinhoodClientAPI\Managers;

use CobinhoodClientAPI\Repos\MarketRepo;

class MarketManager
{
    public function getCurrencies($url)
    {
        $repo = new MarketRepo();
        return $repo->getCurrencies($url);
    }

    public function getTradingPairs($url)
    {
        $repo = new MarketRepo();
        return $repo->getTradingPairs($url);
    }

    public function getOrderBooks($url,$tradingPairID,$limit)
    {
        $repo = new MarketRepo();        
        return $repo->getOrderBooks($url,$tradingPairID,$limit);
    }

    public function getStats($url)
    {
        $repo = new MarketRepo();
        return $repo->getStats($url);
    }

    public function getTickers($url,$tradingPairID)
    {
        $repo = new MarketRepo();
        return $repo->getTickers($url,$tradingPairID);
    }

    public function getRecentTrades($url,$tradingPairID,$limit)
    {
        $repo = new MarketRepo();
        return $repo->getRecentTrades($url,$tradingPairID,$limit);
    }
}

?>