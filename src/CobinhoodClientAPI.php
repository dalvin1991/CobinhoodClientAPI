<?php 
namespace CobinhoodClientAPI;

use CobinhoodClientAPI\Managers\SystemManager;
use CobinhoodClientAPI\Managers\MarketManager;
use CobinhoodClientAPI\Managers\ChartManager;
use CobinhoodClientAPI\Managers\TradingManager;
use CobinhoodClientAPI\Managers\WalletManager;
use CobinhoodClientAPI\Managers\WebSocketManager;

class CobinhoodClientAPI
{
    private $apikey;
    private $url;
    private $wss;
    private $wssClient;

    public function __construct($apikeystr)
    {
        $this->apikey = $apikeystr;
        $this->url = "https://api.cobinhood.com";
        $this->wss = "wss://feed.cobinhood.com/ws";
    }

    public function getTime(){
        $manager= new SystemManager();
        return $manager->getTime($this->url);
    }

    public function getInfo(){
        $manager= new SystemManager();
        return $manager->getInfo($this->url);
    }

    public function getCurrencies(){
        $manager= new MarketManager();
        return $manager->getCurrencies($this->url);
    }

    public function getTradingPairs(){
        $manager= new MarketManager();
        return $manager->getTradingPairs($this->url);
    }

    public function getOrderBooks($tradingPairID, $limit = null){
        $manager= new MarketManager();
        return $manager->getOrderBooks($this->url,$tradingPairID,$limit);
    }

    public function getStats(){
        $manager= new MarketManager();
        return $manager->getStats($this->url);
    }

    public function getTickers($tradingPairID){
        $manager= new MarketManager();
        return $manager->getTickers($this->url,$tradingPairID);
    }

    public function getRecentTrades($tradingPairID, $limit = null){
        $manager= new MarketManager();
        return $manager->getRecentTrades($this->url,$tradingPairID,$limit);
    }

    public function getCandles($tradingPairID, $timeframe, $startTime = null, $endTime = null){
        $manager= new ChartManager();
        return $manager->getCandles($this->url,$tradingPairID, $timeframe, $startTime, $endTime);
    }

    public function getOrder($orderID){
        $manager= new TradingManager();
        return $manager->getOrder($this->url,$this->apikey,$orderID);
    }
    
    public function getOrderTrades($orderID){
        $manager= new TradingManager();
        return $manager->getOrderTrades($this->url,$this->apikey,$orderID);
    }

    public function getOrders($tradingPairID = null, $limit = null){
        $manager= new TradingManager();
        return $manager->getOrders($this->url,$this->apikey,$tradingPairID,$limit);
    }

    public function placeOrder($tradingPairID, $side, $type, $price, $size){
        $manager= new TradingManager();
        $nonceJson=$this->getTime();
        return $manager->placeOrder($this->url,$this->apikey,$nonceJson,$tradingPairID,$side,$type,$price,$size);
    }

    public function modifyOrder($orderID,$price,$size){
        $manager= new TradingManager();
        $nonceJson=$this->getTime();
        return $manager->modifyOrder($this->url,$this->apikey,$nonceJson,$orderID,$price,$size);
    }

    public function cancelOrder($orderID){
        $manager= new TradingManager();
        $nonceJson=$this->getTime();
        return $manager->cancelOrder($this->url,$this->apikey,$nonceJson,$orderID);
    }

    public function getOrderHistory($tradingPairID = null, $limit = null){
        $manager= new TradingManager();
        return $manager->getOrderHistory($this->url,$this->apikey,$tradingPairID,$limit);
    }

    public function getTrade($tradeID){
        $manager= new TradingManager();
        return $manager->getTrade($this->url,$this->apikey,$tradeID);
    }

    public function getTrades($tradingPairID = null, $limit = null){
        $manager= new TradingManager();
        return $manager->getTrades($this->url,$this->apikey,$tradingPairID,$limit);
    }

    public function getLedger($currency = null, $limit = null){
        $manager= new WalletManager();
        return $manager->getLedger($this->url,$this->apikey,$currency,$limit);
    }

    public function getDepositAddresses($currency = null){
        $manager= new WalletManager();
        return $manager->getDepositAddresses($this->url,$this->apikey,$currency);
    }

    public function getWithdrawalAddresses($currency = null){
        $manager= new WalletManager();
        return $manager->getWithdrawalAddresses($this->url,$this->apikey,$currency);
    }

    public function getWithdrawal($withdrawalID){
        $manager= new WalletManager();
        return $manager->getWithdrawal($this->url,$this->apikey,$withdrawalID);
    }

    public function getWithdrawals(){
        $manager= new WalletManager();
        return $manager->getWithdrawals($this->url,$this->apikey);
    }

    public function getDeposit($depositID){
        $manager= new WalletManager();
        return $manager->getDeposit($this->url,$this->apikey,$depositID);
    }

    public function getDeposits(){
        $manager= new WalletManager();
        return $manager->getDeposits($this->url,$this->apikey);
    }

    public function startOrderWS($keepAlive = false, $timeout = 60){
        $manager= new WebSocketManager();  
        $manager->startOrderWS($this->wss,$this->apikey,$keepAlive,$timeout);
    }

    public function startTradesWS($tradingPairID, $keepAlive = false, $timeout = 60){
        $manager= new WebSocketManager();  
        $manager->startTradesWS($this->wss,$tradingPairID,$keepAlive,$timeout);        
    }

    public function startOrderBookWS($tradingPairID, $precision = "1E-8", $keepAlive = false, $timeout = 60){
        $manager= new WebSocketManager();  
        $manager->startTradesWS($this->wss,$tradingPairID,$precision,$keepAlive,$timeout);        
    }

    public function startTinkerWS($tradingPairID, $keepAlive = false, $timeout = 60){
        $manager= new WebSocketManager();  
        $manager->startTradesWS($this->wss,$tradingPairID,$keepAlive,$timeout);        
    }

    public function startCandlesWS($tradingPairID,$timeframe){
        $manager= new WebSocketManager();  
        $manager->startTradesWS($this->wss,$tradingPairID,$keepAlive,$timeout); 
    }    
}
?>