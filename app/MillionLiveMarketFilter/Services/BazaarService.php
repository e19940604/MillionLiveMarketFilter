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

    private $idolType = [
        '天海春香' => 'Vo',
        '春日未来' => 'Vo',
        '如月千早' => 'Vo',
        '木下ひなた' => 'Vo',
        '四条貴音' => 'Vo',
        'ｼﾞｭﾘｱ' => 'Vo',
        '高山紗代子' => 'Vo',
        '田中琴葉' => 'Vo',
        '天空橋朋花' => 'Vo',
        '箱崎星梨花' => 'Vo',
        '松田亜利沙' => 'Vo',
        '三浦あずさ' => 'Vo',
        '水瀬伊織' => 'Vo',
        '最上静香' => 'Vo',
        '望月杏奈' => 'Vo',
        '矢吹可奈' => 'Vo',
        'ｴﾐﾘ-' => 'Da',
        '大神環' => 'Da',
        '我那覇響' => 'Da',
        '菊地真' => 'Da',
        '北上麗花' => 'Da',
        '高坂海美' => 'Da',
        '佐竹美奈子' => 'Da',
        '島原ｴﾚﾅ' => 'Da',
        '高槻やよい' => 'Da',
        '永吉昴' => 'Da',
        '野々原茜' => 'Da',
        '馬場このみ' => 'Da',
        '福田のり子' => 'Da',
        '舞浜歩' => 'Da',
        '真壁瑞希' => 'Da',
        '百瀬莉緒' => 'Da',
        '横山奈緒' => 'Da',
        '秋月律子' => 'Vi',
        '伊吹翼' => 'Vi',
        '北沢志保' => 'Vi',
        '篠宮可憐' => 'Vi',
        '周防桃子' => 'Vi',
        '徳川まつり' => 'Vi',
        '所恵美' => 'Vi',
        '豊川風花' => 'Vi',
        '中谷育' => 'Vi',
        '七尾百合子' => 'Vi',
        '二階堂千鶴' => 'Vi',
        '萩原雪歩' => 'Vi',
        '双海亜美' => 'Vi',
        '双海真美' => 'Vi',
        '星井美希' => 'Vi',
        '宮尾美也' => 'Vi',
        'ﾛｺ' => 'Vi',
    ];

    public function insertPack( $data , $line ){

        foreach( $data as $card ){
            $record = Bazaar::find( $card->id );
            if( $record === null ){
                $skillPower = null;
                $skillRange = null;
                $split = explode(" ", $card->name );
                $idolName = end( $split );
                if( isset($this->idolType[$idolName]) )
                    $idolType = $this->idolType[$idolName];
                else
                    $idolType = 'EX';

                if( $card->skill !== null ){
                    $result = preg_match('/(極大)|(特大)|(大)|(中)|(小)/', $card->skill , $match , PREG_OFFSET_CAPTURE);
                    if( $result === 1 )
                        $skillPower = $match[0][0];

                    $result = preg_match('/(AP\/DP)|(AP)|(DP)/' , $card->skill  , $match , PREG_OFFSET_CAPTURE );
                    if( $result === 1 )
                        $skillRange = $match[0][0];
                }

                Bazaar::create([
                    'id' => $card->id,
                    'name' => $card->name,
                    'cost' => $card->cost,
                    'skill' => $card->skill,
                    'price' => $card->cardPrice,
                    'postDate' => Carbon::now('Asia/Taipei')->format("Y-m-d H:i:s"),
                    'transactionUrl' => $card->url,
                    'type' => $idolType,
                    'idolName' => $idolName,
                    'skillRange' => $skillRange,
                    'skillPower' => $skillPower,
                    'line' => $line
                ]);
            }
        }

    }

    public function getIndexList( ){
        $cardList = Bazaar::where('cost', '!=' , 99 )->orderBy('postDate','desc')->paginate(15);

        return $cardList;
    }
}