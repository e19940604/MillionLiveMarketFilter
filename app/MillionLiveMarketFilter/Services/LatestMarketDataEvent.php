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
    private $url;
    private $oldFirstTransactionId;
    private $bazaarService;
    private $queryConstrict;
    private $newData;

    public function __construct( $oldFirstTransactionId  , $queryConstrict , $url  )
    {
        $this->oldFirstTransactionId = $oldFirstTransactionId;
        $this->bazaarService = new BazaarService();
        $this->queryConstrict = $queryConstrict;
        $this->url = $url;
    }

    /**
     * Check for continue to send event.
     *
     * @return bool
     */
    public function check()
    {
        // TODO: Implement check() method.

        $latest = $this->bazaarService->getIndexListWithConstrict( $this->queryConstrict , $this->url );
        $data = $latest->items();
        if( $data !== [] ){
            if( $data[0]->id === $this->oldFirstTransactionId ){

                //\Log::info("false");
                return false;
            }
            else
                $this->oldFirstTransactionId = $data[0]->id;
        }
        $this->newData = $latest->items();
        //\Log::info("true");
        return true;
    }

    /**
     * Get Updated Data.
     *
     * @return string
     */
    public function update()
    {
        //\Log::info("send");
        // TODO: Implement update() method.
        return json_encode( $this->newData );
    }
}