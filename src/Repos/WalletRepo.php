<?php 
namespace CobinhoodClientAPI\Repos;

use CobinhoodClientAPI\NonceGenerate;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7;

class WalletRepo
{
    private $getLedgerURL = '/v1/wallet/ledger';
    private $getDepositAddressesURL = '/v1/wallet/deposit_addresses';
    private $getWithdrawalAddressesURL = '/v1/wallet/withdrawal_addresses';
    private $getWithdrawalURL = '/v1/wallet/withdrawals/%s';
    private $getWithdrawalsURL = '/v1/wallet/withdrawals';
    private $getDepositURL = '/v1/wallet/deposits/%s';
    private $getDepositsURL = '/v1/wallet/deposits';
    
    public function getLedger($url,$apiKey,$currency,$limit)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.$this->getLedgerURL, 
                [
                    'headers' => ['authorization' => $apiKey],
                    'query' => [
                        'currency' => $currency,
                        'limit' => $limit
                    ]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 

    public function getDepositAddresses($url,$apiKey,$currency)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.$this->getDepositAddressesURL, 
                [
                    'headers' => ['authorization' => $apiKey],
                    'query' => ['currency' => $currency]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 

    public function getWithdrawalAddresses($url,$apiKey,$currency)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.$this->getWithdrawalAddressesURL, 
                [
                    'headers' => ['authorization' => $apiKey],
                    'query' => ['currency' => $currency]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 
    
    public function getWithdrawal($url,$apiKey,$withdrawalID)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.sprintf($this->getWithdrawalURL, $withdrawalID), 
                [
                    'headers' => ['authorization' => $apiKey]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 

    public function getWithdrawals($url,$apiKey)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.$this->getWithdrawalsURL, 
                [
                    'headers' => ['authorization' => $apiKey]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 

    public function getDeposit($url,$apiKey,$depositID)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.sprintf($this->getDepositURL, $depositID), 
                [
                    'headers' => ['authorization' => $apiKey]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 

    public function getDeposits($url,$apiKey)
    {
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request(
                'GET', 
                $url.$this->getDepositsURL, 
                [
                    'headers' => ['authorization' => $apiKey]
                ]
            );
            return $res->getBody();
        } catch (RequestException $e) {
            $response = $e->getResponse();
            return $response->getBody()->getContents();  
        }
    } 

    
}

?>