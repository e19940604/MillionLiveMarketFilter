<?php
namespace MillionLiveMarketFilter\Repositories;
use MillionLiveMarketFilter\Bazaar;

/**
 * Created by PhpStorm.
 * User: e19940604
 * Date: 2017/5/27
 * Time: 下午9:11
 */
class BazaarRepository
{

    private $bazaar;
    public function __construct( Bazaar $bazaar ){
        $this->bazaar = $bazaar;
    }

    public function create( $data ){
        $this->bazaar->unguarded();
        $this->bazaar->create( $data );
    }

}