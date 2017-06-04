<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MillionLiveMarketFilter\Repositories\BazaarRepository;
use MillionLiveMarketFilter\Services\BazaarService;

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

    public function showIndex(){

    }

    /** web **/
    public function showBazaar(){

        $cardList = $this->bazaarService->getIndexList();

        return view('million.bazaar')->with('data', $cardList);

    }
}
