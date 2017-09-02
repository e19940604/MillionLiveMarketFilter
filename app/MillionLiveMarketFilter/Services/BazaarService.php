<?php
/**
 * Created by PhpStorm.
 * User: e19940604
 * Date: 2017/5/27
 * Time: 下午9:37
 */

namespace MillionLiveMarketFilter\Services;


use App\Jobs\SendPlurk;
use Carbon\Carbon;
use MillionLiveMarketFilter\Bazaar;
use MillionLiveMarketFilter\SearchTable;

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

    private $idolId = [
        9=>"秋月律子",
        1=>"天海春香",
        16=>"伊吹翼",
        32=>"ｴﾐﾘ-",
        40=>"大神環",
        51=>"音無小鳥",
        14=>"春日未来",
        13=>"我那覇響",
        6=>"菊地真",
        2=>"如月千早",
        48=>"北上麗花",
        33=>"北沢志保",
        35=>"木下ひなた",
        29=>"高坂海美",
        19=>"佐竹美奈子",
        8=>"四条貴音",
        45=>"篠宮可憐",
        18=>"島原ｴﾚﾅ",
        50=>"ｼﾞｭﾘｱ",
        49=>"周防桃子",
        5=>"高槻やよい",
        27=>"高山紗代子",
        17=>"田中琴葉",
        31=>"天空橋朋花",
        21=>"徳川まつり",
        20=>"所恵美",
        41=>"豊川風花",
        30=>"中谷育",
        47=>"永吉昴",
        26=>"七尾百合子",
        38=>"二階堂千鶴",
        23=>"野々原茜",
        4=>"萩原雪歩",
        22=>"箱崎星梨花",
        39=>"馬場このみ",
        43=>"福田のり子",
        11=>"双海亜美",
        12=>"双海真美",
        3=>"星井美希",
        34=>"舞浜歩",
        44=>"真壁瑞希",
        28=>"松田亜利沙",
        10=>"三浦あずさ",
        7=>"水瀬伊織",
        42=>"宮尾美也",
        15=>"最上静香",
        24=>"望月杏奈",
        46=>"百瀬莉緒",
        36=>"矢吹可奈",
        37=>"横山奈緒",
        25=>"ﾛｺ",
    ];

    private $skillPower = [
        "1" => "小",
        "2" => "中",
        "3" => "大",
        "4" => "特大",
        "5" => "極大"
    ];

    public function insertPack( $data , $line ){

        $searchTable = \MillionLiveMarketFilter\SearchTable::all();

        foreach( $data as $card ){
            $record = Bazaar::find( $card->id );
            if( $record === null ) {
                $skillPower = null;
                $skillRange = null;
                $split = explode(" ", $card->name);
                if (count($split) === 1)
                    $split = $split = explode("　", $card->name);

                $idolName = end($split);
                if (isset($this->idolType[$idolName]))
                    $idolType = $this->idolType[$idolName];
                else
                    $idolType = 'EX';

                if ($card->skill !== null) {
                    $result = preg_match('/(極大)|(特大)|(大)|(中)|(小)/', $card->skill, $match, PREG_OFFSET_CAPTURE);
                    if ($result === 1)
                        $skillPower = $match[0][0];

                    $result = preg_match('/(AP\/DP)|(AP)|(DP)/', $card->skill, $match, PREG_OFFSET_CAPTURE);
                    if ($result === 1)
                        $skillRange = $match[0][0];
                }

                if (mb_strpos($card->cardPrice, "バトルキャンディ") !== false) {
                    $candyOrDrink = 2;
                    preg_match('/\([0-9]*\)/', $card->cardPrice, $match, PREG_OFFSET_CAPTURE);
                    $price = substr($match[0][0], 1, -1);
                } else if (mb_strpos($card->cardPrice, "スパークドリンク") !== false) {
                    $candyOrDrink = 1;
                    preg_match('/\([0-9]*\)/', $card->cardPrice, $match, PREG_OFFSET_CAPTURE);
                    $price = substr($match[0][0], 1, -1);
                } else {
                    $candyOrDrink = 0;
                }


                try{
                    \DB::beginTransaction();

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
                        'line' => $line,
                        'candyOrDrink' => $candyOrDrink
                    ]);

                    foreach ($searchTable as $row) {
                        if ($row->card_name && $card->name != $row->card_name) {

                            continue;
                        }
                        if ($row->candy_or_drink && $candyOrDrink != $row->candy_or_drink) {
                            //\Log::info( $candyOrDrink );
                            continue;
                        }
                        if ($row->skill && $skillPower != $row->skill) {
                           // \Log::info( $skillPower );
                            continue;
                        }
                        if ($row->cost && $card->cost != $row->cost) {
                          //  \Log::info( $card->cost );
                            continue;
                        }

                        if ($row->range && $row->range != $skillRange) {
                            // \Log::info( $skillRange );
                            continue;
                        }

                        if ($row->price_less_than && ( $candyOrDrink == 0 || $row->price_less_than < $price ) ) {
                           // \Log::info( $price );
                            continue;
                        }



                        dispatch(new SendPlurk($row->plurk_id, $card, $line));
                    }
                    \DB::commit();
                } catch(\Exception $e ){
                    \DB::rollBack();
                    \Log::error( $e->getMessage() );
                }

            }
        }

    }

    public function getIndexList( ){
        $cardList = Bazaar::where('cost', '!=' , 99 )->orderBy('postDate','desc')->paginate(15);
        return $cardList;
    }

    public function getIndexListWithLine( $line ){
        $cardList = Bazaar::where('cost', '!=' , 99 )->where('line',$line)->orderBy('postDate','desc')->paginate(15);
        return $cardList;
    }

    /**
     * @param array $constrict = [
     *      name = "",
     *      type = "",
     *      idol = "",
     *      cost = "",
     *      skillPower = ""
     *      line = "",
     *      candyOrDrink = ""
     * ]
     */
    public function getIndexListWithConstrict( $constrict , $url ){

        $skillPower = $this->skillPower;
        $idolId = $this->idolId;
        $cardList = Bazaar::where( function( $query ) use ($constrict , $skillPower , $idolId ) {
            $query->where('cost', '!=' , 99 );

            if(  $constrict["name"] !== "" )
                $query->where("name" , "like" , "%" . $constrict['name'] . "%" );

            if( $constrict["type"] !== "0" )
                $query->where("type", $constrict["type"] );

            if( $constrict["idol"] !== "0" )
                $query->where("idolName", $idolId[ $constrict["idol"] ] );

            if( $constrict["cost"] !== "0" )
                $query->where("cost" , $constrict["cost"] );

            if( $constrict["skillPower"] !== "0" )
                $query->where("skillPower" , $skillPower[ $constrict["skillPower"] ]  );

            if( $constrict["candyOrDrink"] !== "0" )
                $query->where("candyOrDrink" , $constrict["candyOrDrink"]  );

            if( $constrict["range"] !== "0"){
                if( $constrict["range"] == "1" )
                    $query->where("skillRange" , null  );
                else
                    $query->where("skillRange" , $constrict["range"]  );
            }

            if( $constrict["line"] !== "0" )
                $query->where("line" , $constrict["line"]  );
            
        })->orderBy('postDate','desc')->paginate(15);


        $cardList->withPath( "?" . $url);

        return $cardList;

    }

    public function getNewestList( $line = -1 ){
        if( $line === -1 ){
            $cardList = Bazaar::where('cost', '!=' , 99 )->orderBy('postDate','desc')->take(15)->get();
        } else {
            $cardList = Bazaar::where('cost', '!=' , 99 )->where('line' , $line )->orderBy('postDate','desc')->take(15)->get();
        }

        return $cardList;
    }
}