# Cobinhood Client API

Cobinhood Client API

Refer Cobinhood Public API https://cobinhood.github.io/api-public

Composer Command
```
composer create-project dalvin1991/cobinhood_client_api
```  

## Initialize 
##### Initialize 
`Client $client = new CobinhoodClientAPI("API-KEY");`

## System Section 
##### Get System Time 
`$client->getTime();`

### Get System Info 
`$client->getInfo();`

## Market Section 
##### Get Currencies 
`$client->getCurrencies();`

##### Get Trading Pairs 
`$client->getTradingPairs();`

##### Get Order Books 
`$client->getOrderBooks($tradingPairID,$limit);`  
$tradingPairID (string) : you may use the value return by *Get Trading Pairs*  
$limit (int) : number of records return (Optional parameter)

##### Get Trading Statistics 
`$client->getStats();`

##### Get Tickers 
`$client->getTickers($tradingPairID);`  
$tradingPairID (string) : you may use the value return by *Get Trading Pairs*

##### Get Recent Trades 
`$client->getRecentTrades($tradingPairID,$limit);`  
$tradingPairID (string) : you may use the value return by *Get Trading Pairs*  
$limit (int) : number of records return (Optional parameter)  

## Chart Section 
##### Get Candles
`$client->getCandles($tradingPairID,$timeframe,$startTime,$endTime);`  
$tradingPairID (string) : you may use the value return by *Get Trading Pairs*  
$timeframe (string) :  candles timeframe ("1m", "5m", "15m", "30m", "1h", "3h", "6h", "12h", "1D", "7D", "14D", "1M")  
$startTime (int) : the unix timestamp for the first of candles (Optional parameter)  
$endTime (int) : the unix timestamp for the last of candles (Optional parameter)  

## Trading Section 
##### Get Order 
`$client->getOrder($orderID);`  
$orderID (string) : order id for the order

##### Get Order's Trades 
`$client->getOrderTrades($orderID);`  
$orderID (string) : order id for the order

##### Get All Orders 
`$client->getOrders($tradingPairID,$limit);`  
$tradingPairID (string) : you may use the value return by *Get Trading Pairs* (Optional parameter)  
$limit (int) : number of records return (Optional parameter)

##### Place Order 
`$client->placeOrder($tradingPairID, $side, $type, $price, $size);`  
$tradingPairID (string) : you may use the value return by *Get Trading Pairs*  
$side (string) : the order side ("bid", "ask")  
$type (string) : the order type ("market", "limit", "stop", "stop_limit")  
$price (string) : price for the order  
$size (string) : size for the order

##### Modify Order 
`$client->modifyOrder($orderID,$price,$size);`  
$orderID (string) : order id for the order  
$price (string) : price for the order  
$size (string) : size for the order  

##### Cancel Order 
`$client->cancelOrder($orderID);`  
$orderID (string) : order id for the order

##### Get Order History 
`$client->getOrderHistory($tradingPairID, $limit);`  
$tradingPairID (string) : you may use the value return by *Get Trading Pairs* (Optional parameter)  
$limit (int) : number of records return (Optional parameter)

##### Get Trade 
`$client->getTrade($tradeID);`  
$tradeID (string) : trade id for the trade

##### Get Trades History 
`$client->getTrades($tradingPairID, $limit);`  
$tradingPairID (string) : you may use the value return by *Get Trading Pairs* (Optional parameter)  
$limit (int) : number of records return (Optional parameter)

## Wallet Section 
##### Get Ledger Entries 
`$client->getLedger($currency,$limit);`  
$currency (string) :  you may use the value return by *Get Currencies* (Optional parameter)  
$limit (int) : number of records return (Optional parameter)

##### Get Deposit Addresses 
`$client->getDepositAddresses($currency);`  
$currency (string) : you may use the value return by *Get Currencies* (Optional parameter)

##### Get Withdrawal Addresses 
`$client->getWithdrawalAddresses($currency);`   
$currency (string) : you may use the value return by *Get Currencies* (Optional parameter)

##### Get Withdrawal 
`$client->getWithdrawal($withdrawalID);`  
$withdrawalID (string) : withdrawal ID  

##### Get All Withdrawal 
`$client->getWithdrawals();`

##### Get Deposit 
`$client->getDeposit($depositID);`  
$depositID (string) : depositID ID

##### Get All Deposit 
`$client->getDeposits();`

## Websocket Section
In websocket, I have implemented the ping message to be sent every 5 sec to maintain the socket 
stay open after each socket function has called.

You may refer my index.php example, for each websocket function you may put in your callback function,
when receive any message. $class will be your class, then $functionName is the class function name 
to be call.

##### Order
```
$client->startOrderWS($keepAlive,$timeout,$class,$functionName);
```
$keepAlive (bool) : keep the socket alive until the timeout (Optional parameter)  
$timeout (int) : the socket timeout time with seconds (Optional parameter)  
$class (class) : the callback Class (Optional parameter)  
$functionName (string) : the callback Class's function (Optional parameter)  

##### Trades
```
$client->startTradesWS($tradingPairID,$keepAlive,$timeout,$class,$functionName);
```
$tradingPairID (string or array) : it can be string for single trading pair or array for multiple trading pair subscribe  
$keepAlive (bool) : keep the socket alive until the timeout (Optional parameter)  
$timeout (int) : the socket timeout time with seconds (Optional parameter)  
$class (class) : the callback Class (Optional parameter)  
$functionName (string) : the callback Class's function (Optional parameter)  

##### Order Book
```
$client->startOrderBookWS($tradingPairsForOrderBookWS,$keepAlive,$timeout,$class,$functionName);
```
$tradingPairsForOrderBookWS (array) : you may refer the structure like this  
```
$tradingPairsForOrderBookWS=[
    ["tradingPairID"=>"BAT-BTC","precision"=>"1E-8"],
    ["tradingPairID"=>"COB-BTC","precision"=>"1E-8"],
    ["tradingPairID"=>"ETH-BTC","precision"=>"1E-8"]
];
```
$keepAlive (bool) : keep the socket alive until the timeout (Optional parameter)  
$timeout (int) : the socket timeout time with seconds (Optional parameter)  
$class (class) : the callback Class (Optional parameter)  
$functionName (string) : the callback Class's function (Optional parameter)  

##### Tinker
```
$client->startTinkerWS($tradingPairID,$keepAlive,$timeout,$class,$functionName);
```  
$tradingPairID (string or array) : it can be string for single trading pair or array for multiple trading pair subscribe  
$keepAlive (bool) : keep the socket alive until the timeout (Optional parameter)  
$timeout (int) : the socket timeout time with seconds (Optional parameter)  
$class (class) : the callback Class (Optional parameter)  
$functionName (string) : the callback Class's function (Optional parameter)  

##### Candles
```
$client->startCandlesWS($tradingPairsForCandlesWS,$keepAlive,$timeout,$class,$functionName);
```  
$tradingPairsForOrderBookWS (array) : you may refer the structure like this  
```
$tradingPairsForCandlesWS=[
    ["tradingPairID"=>"BAT-BTC","timeframe"=>"30m"],
    ["tradingPairID"=>"COB-BTC","timeframe"=>"30m"],
    ["tradingPairID"=>"ETH-BTC","timeframe"=>"30m"]
];
```
$keepAlive (bool) : keep the socket alive until the timeout (Optional parameter)  
$timeout (int) : the socket timeout time with seconds (Optional parameter)  
$class (class) : the callback Class (Optional parameter)  
$functionName (string) : the callback Class's function (Optional parameter)  
