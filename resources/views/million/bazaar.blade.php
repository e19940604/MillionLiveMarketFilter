@extends('million.layout')

@section('title' , 'MillionLiveBazaar')

@section('style')
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
@endsection

@section('content')
    @inject('bazaarPresenter' , 'MillionLiveMarketFilter\Presenters\BazaarPresenter')
    <div class="page-header">
        <h1>ミリオンライブ バザー</h1>
        <p class="lead">這是一個<del>沒有UI</del>的ML市場資料網站<!--，目前只有2線資料，有意願提供其他線資料的話請聯絡噗浪 @e19940604--> </p>
    </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <a class="panel-default" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        Search panel
                    </h4>
                </div>
            </a>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <form class="form-horizontal col-sm-12">
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">關鍵字</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Card" placeholder="關鍵字" >
                                </div>
                            </div>
                        </div>

                        <!-- Rarity -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">屬性</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="type[]" id="Vo" value="Vo"> Vo
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="type[]" id="Da" value="Da"> Da
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="type[]" id="Vi" value="Da"> Vi
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="type[]" id="Ex" value="Ex"> Ex
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- idol -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">アイドル</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="idol">
                                        <option value="0" >--請先選擇屬性--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- cost -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">Cost</label>
                                <div class="col-sm-3">
                                    <!--<label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost1" value="1"> 1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost2" value="2"> 2
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost3" value="3"> 3
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost4" value="4"> 4
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost5" value="5"> 5
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost6" value="6"> 6
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost7" value="7"> 7
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost8" value="8"> 8
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost9" value="9"> 9
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost10" value="10"> 10
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost11" value="11"> 11
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost11" value="12"> 12
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost13" value="13"> 13
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost14" value="14"> 14
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost15" value="15"> 15
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost16" value="16"> 16
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost17" value="17"> 17
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost18" value="18"> 18
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost19" value="19"> 19
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="cost[]" id="cost20" value="20"> 20
                                    </label>-->

                                    <select class="form-control" name="costUp">
                                        <option value="0" >--最小cost--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="costDown">
                                        <option value="0" >--最大cost--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        <option>11</option>
                                        <option>12</option>
                                        <option>13</option>
                                        <option>14</option>
                                        <option>15</option>
                                        <option>16</option>
                                        <option>17</option>
                                        <option>18</option>
                                        <option>19</option>
                                        <option>20</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- skill power -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">技能加成</label>
                                <div class="col-sm-10">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="skillRange[]" id="super" value="0"> 極大
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="skillRange[]" id="max" value="1"> 特大
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="skillRange[]" id="large" value="2"> 大
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="skillRange[]" id="medium" value="3"> 中
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="skillRange[]" id="small" value="4"> 小
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- line -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">世界線</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="idol">
                                        <option value="0" >--全線--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-11 col-sm-1 ">
                                <button type="submit" class="btn btn-default">搜尋</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="block-table  ">
        <div class="row th">
            <div class="td col-sm-2 ">卡名</div>
            <div class="td col-sm-1">Cost</div>
            <div class="td col-sm-2">技能</div>
            <div class="td col-sm-3">希望品</div>
            <div class="td col-sm-1">連結</div>
            <div class="td col-sm-2">記錄時間</div>
            <div class="td col-sm-1">線路</div>
        </div>

        @if( isset( $data ) )
            @foreach( $data->items() as $row )
        <div class="row tr">
            <div class="td col-sm-2"><p class="text">{{ $row->name }}</p></div>
            <div class="td col-sm-1"><p class="text">{{ $row->cost }}</p></div>
            <div class="td col-sm-2"><p class="text">{{ $row->skill }}</p></div>
            <div class="td col-sm-3"><p class="text">{{ $row->price }}</p></div>
            <div class="td col-sm-1"><p class="text"><a href="{{ $row->transactionUrl }}" onClick="ga('send', 'event', 'bazaar', 'checkPage', 'click')" >バザー</a></p></div>
            <div class="td col-sm-2"><p class="text">{{ $row->postDate }}</p></div>
            <div class="td col-sm-1"><p class="text">2</p></div>
        </div>
            @endforeach

            <div class="text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{ $bazaarPresenter->showPrePageIcon( $data->currentPage() ) }}
                                <a class="page-link " href="{{ $data->previousPageUrl() }}" onClick="ga('send', 'event', 'pagination', 'previous', 'click');" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>

                        </li>


                        @foreach( $data->getUrlRange( $bazaarPresenter->getUrlRange( $data->currentPage() , $data->lastPage() )[0] , $bazaarPresenter->getUrlRange( $data->currentPage() , $data->lastPage() )[1] )  as $pageNumber => $url )
                            @if( $pageNumber === $data->currentPage() )
                                <li class="page-item active"><a class="page-link" href="{{ $url }}"  onClick="ga('send', 'event', 'pagination', 'number', 'click')" >{{$pageNumber}}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{$pageNumber}}</a></li>
                            @endif
                        @endforeach


                        {{ $bazaarPresenter->showLastPageIcon( $data->currentPage() , $data->lastPage()) }}
                                <a class="page-link" href="{{ $data->nextPageUrl() }}"  onClick="ga('send', 'event', 'pagination', 'next', 'click')" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                        </li>
                    </ul>
                </nav>
            </div>
        @endif


    </div>


@endsection