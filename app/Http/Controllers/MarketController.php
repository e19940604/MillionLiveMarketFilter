<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use MillionLiveMarketFilter\Repositories\BazaarRepository;
use MillionLiveMarketFilter\Services\BazaarService;
use MillionLiveMarketFilter\Services\LatestMarketDataEvent;
use Sse\SSE;

class MarketController extends Controller
{
    private $bazaarRepository;
    private $bazaarService;

    public function __construct( BazaarRepository $bazaarRepository , BazaarService $bazaarService ){
        $this->bazaarRepository = $bazaarRepository;
        $this->bazaarService = $bazaarService;
    }

    /** api **/

    public function listCreate( Request $request ){

        $data = json_decode( $request->get("data") );
        $line = $request->get("line");
        $this->bazaarService->insertPack( $data , $line );

        $response = [
            'status' => 'success'
        ];
        return response( )->json( $response , 200);

    }

    public function firstNewList( Request $request ){
        $currentFirstId = $request->input('firstId');
        $queryConstrict = $this->getConstrict( $request );
        $queryString = preg_replace( "/&page.*/" , "" , $request->getQueryString() );

        $sse = new SSE();
        $sse->exec_limit = 0;
        $sse->sleep_time = 15;
        $sse->keep_alive_time = 600;
        $sse->addEventListener('message', new LatestMarketDataEvent( $currentFirstId , $queryConstrict , $queryString));
        return $sse->createResponse();
    }

    /** web **/

    public function showIndex( Request $request ){;

        $constrict = $this->getConstrict( $request );

        $queryString = preg_replace( "/&page.*/" , "" , $request->getQueryString() );
        //\Log::info( $queryString );

        $cardList = $this->bazaarService->getIndexListWithConstrict( $constrict , $queryString );

        return view('million.bazaar')->with('data', $cardList);
    }


    private function getConstrict( $request ){
        return [
            "name" => $request->input('name' , "" ),
            "type" => $request->input('type' , "0" ),
            "idol" => $request->input('idol' , "0" ),
            "cost" => $request->input('cost' , "0" ),
            "skillPower" => $request->input('skillPower' , "0"),
            "line" => $request->input('line' , "0"),
            "candyOrDrink" => $request->input('candyOrDrink' , "0")
        ];

    }

}
