<?php
/**
 * Created by PhpStorm.
 * User: e19940604
 * Date: 2017/5/27
 * Time: 下午9:37
 */

namespace MillionLiveMarketFilter\Services;


use Carbon\Carbon;
use MillionLiveMarketFilter\Bazaar;

class BazaarService
{
    public function insertPack( $data ){

        foreach( $data as $card ){
            $record = Bazaar::find( $card->id );
            if( $record === null ){
                Bazaar::create([
                    'id' => $card->id,
                    'name' => $card->name,
                    'cost' => $card->cost,
                    'skill' => $card->skill,
                    'price' => $card->cardPrice,
                    'postDate' => Carbon::now()->format("Y-m-d H:i:s"),
                    'transactionUrl' => $card->url,
                ]);
            }
        }

    }
}