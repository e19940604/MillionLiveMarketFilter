<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function firstNewList( SSE $sse ,  $currentFirstId , $line = -1 ){
        \Log::info("here");
        $sse->exec_limit = 0;
        $sse->sleep_time = 5;
        $sse->keep_alive_time = 600;
        $sse->addEventListener('message', new LatestMarketDataEvent( $line , $currentFirstId ));
        $sse->start();
    }

    /** web **/

    public function showIndex(){
        $cardList = $this->bazaarService->getIndexList();

        return view('million.bazaar')->with('data', $cardList);
    }

    public function showBazaar( $line ){

        $cardList = $this->bazaarService->getIndexListWithLine( $line );

        return view('million.bazaar')->with('data', $cardList);

    }


}
