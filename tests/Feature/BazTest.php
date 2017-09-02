<?php

namespace Tests\Feature;

use Tests\TestCase;

class BazTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBazaarInsert()
    {
        $bazaarService =  $this->app->make( \MillionLiveMarketFilter\Services\BazaarService::class );
        $data = json_encode( [[
            'id' => '00000',
            'name' => 'わたわたﾍﾞ-ｼｽﾄ 高槻やよい',
            'skill' => 'Vo属性のAP/DPｱｯﾌﾟ(極大)',
            'cardPrice' => 'スパークドリンク (122)',
            'cost' => '11',
            'url' => 'xx',
        ]] );

        $bazaarService->insertPack(json_decode($data) , 0 );


    }
}
