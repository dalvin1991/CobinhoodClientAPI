# CobinhoodClientAPI
Cobinhood Client API

Refer Cobinhood Public API https://cobinhood.github.io/api-public 

##Initialize
###Initialize Client
$client = new CobinhoodClientAPI("API-KEY");

##System Section
###Get System Time
$client->getTime();

###Get System Info
$client->getInfo();

##Market Section
###Get Currencies
$client->getCurrencies();

###Get Trading Pairs
$client->getTradingPairs();

###Get Order Books
$client->getOrderBooks('STK-BTC');

###Get Trading Statistics
$client->getStats();

###Get Tickers
$client->getTickers('STK-BTC');

###Get Recent Trades
$client->getRecentTrades('STK-BTC');

##Chart Section
###Get Candles
$client->getCandles('STK-BTC','1m',);

##Trading Section
###Get Order
$client->getOrder('');

###Get Order's Trades</h3>
echo $client->getOrderTrades('');

###Get All Orders
echo $client->getOrders();

###Place Order
$client->placeOrder('STK-BTC','bid','limit','1','1');

###Modify Order
$client->modifyOrder('STK-BTC','bid','limit','0.00','0');

###Cancel Order
$client->cancelOrder('STK-BTC','bid','limit','0.00','0');

###Get Order History
$client->getOrderHistory('STK-BTC','bid','limit','0.00','0');

###Get Trade
$client->getTrade('');

###Get Trades History
$client->getTrades();

#Wallet Section
###Get Ledger Entries
$client->getLedger();

###Get Deposit Addresses
$client->getDepositAddresses();

###Get Withdrawal Addresses
$client->getWithdrawalAddresses();

###Get Withdrawal
$client->getWithdrawal('');

###Get All Withdrawal
$client->getWithdrawals();

###Get Deposit
$client->getDeposit('');

###Get All Deposit
$client->getDeposits();