<?php
namespace MillionLiveMarketFilter;
use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: e19940604
 * Date: 2017/6/6
 * Time: 下午1:24
 */

class SearchBlackList extends Model {

    protected $primaryKey = "id";

    protected $table = "SearchBlackList";

    protected $guarded = [];

    public $timestamps = false;
}