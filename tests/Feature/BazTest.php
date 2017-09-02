<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BazTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBazaarInsert()
    {
        $url = '/api/marketList';

        $payload =[
            'data' => json_encode([
                [
                    'id' => '00000',
                    'name' => 'ｹﾞ-ﾑでｽﾀﾃﾞｨ! 真壁瑞希',
                    'skill' => '他Pﾗｲﾌﾞ参加時､Vo属性のAPｱｯﾌﾟ(小)',
                    'cardPrice' => 'スパークドリンク (1)',
                    'cost' => '11',
                    'url' => 'xx',
                ]

            ]) ,
            'line' => 0
        ];

        $result = $this->post(  $url , $payload );
        dd( $result );
    }
}
