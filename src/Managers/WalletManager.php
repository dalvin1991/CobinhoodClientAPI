<?php 
namespace CobinhoodClientAPI\Managers;

use CobinhoodClientAPI\Repos\WalletRepo;

class WalletManager
{
    public function getLedger($url,$apiKey,$currency,$limit)
    {
        $repo = new WalletRepo();
        return $repo->getLedger($url,$apiKey,$currency,$limit);
    }

    public function getDepositAddresses($url,$apiKey,$currency)
    {
        $repo = new WalletRepo();
        return $repo->getDepositAddresses($url,$apiKey,$currency);
    }

    public function getWithdrawalAddresses($url,$apiKey,$currency)
    {
        $repo = new WalletRepo();
        return $repo->getWithdrawalAddresses($url,$apiKey,$currency);
    }

    public function getWithdrawal($url,$apiKey,$withdrawalID)
    {
        $repo = new WalletRepo();
        return $repo->getWithdrawal($url,$apiKey,$withdrawalID);
    }

    public function getWithdrawals($url,$apiKey)
    {
        $repo = new WalletRepo();
        return $repo->getWithdrawals($url,$apiKey);
    }

    public function getDeposit($url,$apiKey,$depositID)
    {
        $repo = new WalletRepo();
        return $repo->getDeposit($url,$apiKey,$depositID);
    }

    public function getDeposits($url,$apiKey)
    {
        $repo = new WalletRepo();
        return $repo->getDeposits($url,$apiKey);
    }
}

?>