<?php
include "vendor/autoload.php";

use CobinhoodClientAPI\CobinhoodClientAPI;


$apikey="API-KEY";
$client = new CobinhoodClientAPI($apikey);

/*
echo "<h1>System</h1>";
echo "<h3>Time</h3>";
echo $client->getTime();
echo "<h3>Info</h3>";
echo $client->getInfo();
*/

/*
echo "<h1>Market</h1>";
echo "<h3>Currencies</h3>";
echo $client->getCurrencies();
echo "<h3>Trading Pairs</h3>";
echo $client->getTradingPairs();
echo "<h3>Order Books</h3>";
echo $client->getOrderBooks('STK-BTC');
echo "<h3>Stats</h3>";
echo $client->getStats();
echo "<h3>Tickers</h3>";
echo $client->getTickers('STK-BTC');
echo "<h3>Recent Trades</h3>";
echo $client->getRecentTrades('STK-BTC');
*/

/*
echo "<h1>Chart</h1>";
echo "<h3>Candles</h3>";
echo $client->getCandles('STK-BTC','1m');
*/

/*
echo "<h1>Trading</h1>";
echo "<h3>Order</h3>";
echo $client->getOrder('');
echo "<h3>Order Trades</h3>";
echo $client->getOrderTrades('');
echo "<h3>All Orders</h3>";
echo $client->getOrders();
echo "<h3>Place Order</h3>";
echo $client->placeOrder('STK-BTC','bid','limit','1','1');
echo "<h3>Modify Order</h3>";
echo $client->modifyOrder('STK-BTC','bid','limit','0.00','0');
echo "<h3>Cancel Order</h3>";
echo $client->cancelOrder('STK-BTC','bid','limit','0.00','0');
echo "<h3>Order History</h3>";
echo $client->getOrderHistory('STK-BTC','bid','limit','0.00','0');
echo "<h3>Trade</h3>";
echo $client->getTrade('');
echo "<h3>All Trades</h3>";
echo $client->getTrades();
*/

/*
echo "<h1>Wallet</h1>";
echo "<h3>Ledger Entries</h3>";
echo $client->getLedger();
echo "<h3>Deposit Addresses</h3>";
echo $client->getDepositAddresses();
echo "<h3>Withdrawal Addresses</h3>";
echo $client->getWithdrawalAddresses();
echo "<h3>Withdrawal</h3>";
echo $client->getWithdrawal('');
echo "<h3>All Withdrawal</h3>";
echo $client->getWithdrawals();
echo "<h3>Deposit</h3>";
echo $client->getDeposit('');
echo "<h3>All Deposit</h3>";
echo $client->getDeposits();
*/

/*
echo "<h1>WebSocket</h1>";
$tradingPairsForCandlesWS=[
    ["tradingPairID"=>"BAT-BTC","timeframe"=>"30m"],
    ["tradingPairID"=>"COB-BTC","timeframe"=>"30m"],
    ["tradingPairID"=>"ETH-BTC","timeframe"=>"30m"]
];
$tradingPairsForOrderBookWS=[
    ["tradingPairID"=>"BAT-BTC","precision"=>"1E-8"],
    ["tradingPairID"=>"COB-BTC","precision"=>"1E-8"],
    ["tradingPairID"=>"ETH-BTC","precision"=>"1E-8"]
];
$customFunction=new CustomFunction();
echo "<h3>Order</h3>";
echo $client->startOrderWS();
echo "<h3>Trades</h3>";
echo $client->startTradesWS('BAT-BTC');
echo "<h3>Order Book</h3>";
echo $client->startOrderBookWS($tradingPairsForOrderBookWS);
echo "<h3>Tinker</h3>";
echo $client->startTinkerWS('BAT-BTC');
echo "<h3>Candles</h3>";
echo $client->startCandlesWS($tradingPairsForCandlesWS);
*/

//custom class & function
class CustomFunction {    
    static function LogMessage($message) { 
        $filename="\\log.txt";       
        // open file 
        $fd = fopen(__DIR__.$filename, "a"); 
        // write string 
        fwrite($fd, $message . "\n"); 
        // close file 
        fclose($fd); 
    }
}
?>