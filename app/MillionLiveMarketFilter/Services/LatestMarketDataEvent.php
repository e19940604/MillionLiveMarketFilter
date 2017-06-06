<?php
/**
 * Created by PhpStorm.
 * User: e19940604
 * Date: 2017/6/5
 * Time: 下午9:15
 */

namespace MillionLiveMarketFilter\Services;


use Sse\Event;
use MillionLiveMarketFilter\Services\BazaarService;

class LatestMarketDataEvent implements Event
{
    private $test;
    private $line;
    private $oldFirstTransctionId;
    private $bazaarService;
    private $queryConstrict;

    public function __construct( $line , $oldFirstTransactionId )
    {
        $this->test = 10;
        $this->line = $line;
        $this->oldFirstTransactionId = $oldFirstTransactionId;
        $this->bazaarService = new BazaarService();
    }

    /**
     * Check for continue to send event.
     *
     * @return bool
     */
    public function check()
    {
        // TODO: Implement check() method.
        $this->test = $this->test-1;
        \Log::info("check");
        if( $this->test % 2 == 0)
            return true;
        else{
            return false;
        }
    }

    /**
     * Get Updated Data.
     *
     * @return string
     */
    public function update()
    {
        \Log::info("send");
        // TODO: Implement update() method.
        return "$this->test";
    }
}