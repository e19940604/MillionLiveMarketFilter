<?php
namespace MillionLiveMarketFilter\Presenters;
/**
 * Created by PhpStorm.
 * User: e19940604
 * Date: 2017/6/1
 * Time: 上午2:19
 */
class BazaarPresenter
{


    public function getUrlRange( $currentPage , $lastPage ){
        if( $currentPage > 10 ){
            $from = $currentPage - 9;
        } else {
            $from = 1;
        }

        if( $lastPage > 20 ){
            if( $currentPage + 10 > $lastPage ){
                $end = $currentPage + 10;
            } else {
                $end = $lastPage;
            }
        } else {
            $end = $lastPage;
        }

        return [ $from , $end ];
    }

    public function showPrePageIcon( $currentPage ){
        if( $currentPage !== 1 )
            echo '<li class="page-item">';
        else
            echo '<li class="page-item disabled">';
    }

    public function showLastPageIcon( $currentPage , $lastPage ){
        if( $currentPage !== $lastPage )
            echo '<li class="page-item">';
        else
            echo '<li class="page-item disabled">';

    }
}