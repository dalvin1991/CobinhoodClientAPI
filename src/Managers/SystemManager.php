<?php 
namespace CobinhoodClientAPI\Managers;

use CobinhoodClientAPI\Repos\SystemRepo;

class SystemManager
{
    public function getTime($url)
    {
        $repo = new SystemRepo();
        return $repo->getTime($url);
    }

    public function getInfo($url)
    {
        $repo = new SystemRepo();
        return $repo->getInfo($url);
    }    
}

?>