@extends('layouts.master')

@section('content')
    <div class="service">
        @if(is_a($category, \App\GamesTag::class))
            <h3 class='strikearound'>Gry z tagiem: {{$category->name}}</h3>
        @else
            <h3 class='strikearound'>{{$category->name}}</h3>
        @endif
        @if($category->games->count())
            <div class="col-xs-12">
                @foreach($category->games as $game)
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <!-- Service item -->
                        <div class="service-item animated">
                            @if($game->getFirstMedia('poster'))
                                <img src="{{$game->getFirstMedia('poster')->getUrl('thumb')}}">
                            @else
                                <img src="https://via.placeholder.com/150x200">
                        @endif
                            <!-- Service item heading -->
                            <div>
                                <h4><a href="{{$game->getUrl()}}">{{$game->name}}</a></h4>
                                <p>
                                    @if($game->introtext)
                                        {{$game->introtext}}
                                    @else
                                        @if(strlen(strip_tags($game->fulltext))>150)
                                            {{substr(strip_tags($game->fulltext),0,150)}}...
                                        @else
                                            {{$game->fulltext}}
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="col-xs-12 no-games">
                {{--                <span>(⌣́_⌣̀)</span>--}}
                <span>༼ つ ಥ_ಥ ༽つ</span>
                {{--                <span>(ノಠ益ಠ)ノ彡┻━┻</span>--}}
                Nie mamy tego czego szukasz
            </div>
        @endif
    </div>
@endsection
