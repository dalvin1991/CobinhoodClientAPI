<?php 
namespace CobinhoodClientAPI\Managers;

use CobinhoodClientAPI\Repos\ChartRepo;

class ChartManager
{
    public function getCandles($url, $tradingPairID, $timeframe, $startTime, $endTime)
    {
        $timeframeArray = array("1m","5m","15m","30m","1h","3h","6h","12h","1D","7D","14D","1M");
        if(in_array($timeframe, $timeframeArray))
        {
            $repo = new ChartRepo();        
            return $repo->getCandles($url,$tradingPairID,$timeframe,$startTime,$endTime);
        }
        else
        {
            $res=[
                "success" => false, 
                "error" => "timeframe only accept [1m, 5m, 15m, 30m, 1h, 3h, 6h, 12h, 1D, 7D, 14D, 1M]"
            ];
            return json_encode($res,0);
        }        
    }
}

?>