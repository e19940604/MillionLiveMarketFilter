@extends('bazaar.layout')

@section('title' , 'MillionLiveBazaarFilter')

@section('style')
    <link rel="stylesheet" href={{ asset('css/main.css') }}>
@endsection

@section('content')
    @inject('bazaarPresenter' , 'MillionLiveMarketFilter\Presenters\BazaarPresenter')
    <div class="page-header">
        <h1>ミリオンライブ バザー</h1>
        <p class="lead">這是一個<del>沒有UI</del>的ML市場資料網站<!--，目前只有2線資料，有意願提供其他線資料的話請聯絡噗浪 @e19940604--> </p>
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
            <div class="td col-sm-1"><p class="text"><a href="{{ $row->transactionUrl }}">バザー</a></p></div>
            <div class="td col-sm-2"><p class="text">{{ $row->postDate }}</p></div>
            <div class="td col-sm-1"><p class="text">2</p></div>
        </div>
            @endforeach

            <div class="text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        {{ $bazaarPresenter->showPrePageIcon( $data->currentPage() ) }}
                                <a class="page-link " href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>

                        </li>


                        @foreach( $data->getUrlRange( $bazaarPresenter->getUrlRange( $data->currentPage() , $data->lastPage() )[0] , $bazaarPresenter->getUrlRange( $data->currentPage() , $data->lastPage() )[1] )  as $pageNumber => $url )
                            @if( $pageNumber === $data->currentPage() )
                                <li class="page-item active"><a class="page-link" href="{{ $url }}">{{$pageNumber}}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{$pageNumber}}</a></li>
                            @endif
                        @endforeach


                        {{ $bazaarPresenter->showLastPageIcon( $data->currentPage() , $data->lastPage()) }}
                                <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
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