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
            <a class="panel-default" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"  aria-controls="collapseOne" aria-expanded="false">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        Search panel
                    </h4>
                </div>
            </a>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <form id="search-form" class="form-horizontal col-sm-12">
                        <input type="hidden" id="firstId" name="firstId" value="{{ isset( $data->items()[0]->id ) ? $data->items()[0]->id : 0  }}">

                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">關鍵字</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="Card" name="name" placeholder="關鍵字" >
                                </div>
                            </div>
                        </div>

                        <!-- Rarity -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">屬性</label>

                                <div class="col-sm-8">
                                    <select id="typeList" class="form-control" name="type">
                                        <option value="0" >--全部--</option>
                                        <option value="Vo" >Vo</option>
                                        <option value="Da" >Da</option>
                                        <option value="Vi" >Vi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- idol -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">アイドル</label>
                                <div class="col-sm-8">
                                    <select id="idolList" class="form-control" name="idol">
                                        <option value="0" >--全部--</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- cost -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">Cost</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="cost">
                                        <option value="0" >--全部--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- skill power -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">技能加成</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="skillPower">
                                        <option value="0" >--全部--</option>
                                        <option value="5">極大</option>
                                        <option value="4">特大</option>
                                        <option value="3">大</option>
                                        <option value="2">中</option>
                                        <option value="1">小</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- line -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">世界線</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="line">
                                        <option value="0" >--全線--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- line -->
                        <div class="row">
                            <div class="form-group">
                                <label for="Card" class="col-sm-2 control-label">希望品</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="candyOrDrink">
                                        <option value="0" >--全部--</option>
                                        <option value="1">スパークドリンク</option>
                                        <option value="2">バトルキャンディ</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-9 col-sm-1 ">
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

        <div id="tbody">
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
        </div>
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
                                <a class="page-link" href="{{ $bazaarPresenter->fixPagination( $data->nextPageUrl() )  }}"  onClick="ga('send', 'event', 'pagination', 'next', 'click')" aria-label="Next">
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

@section('script')
    <script src="{{ asset("js/serverPush.js") }}"></script>
@endsection