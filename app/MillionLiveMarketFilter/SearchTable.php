<?php
namespace MillionLiveMarketFilter;

use Illuminate\Database\Eloquent\Model;
/**
 * Created by PhpStorm.
 * 
 * User: e19940604
 * Date: 2017/5/27
 * Time: 下午8:58
 *
 * @mixin \Eloquent
 */
class SearchTable extends  Model
{
    protected $primaryKey = "id";

    protected $table = "SearchTable";

    protected $guarded = [];



    public $timestamps = false;
}