@extends('layouts.app')

@section('content')

<div class="container mt-5" >
    <div class="row mt-3">
        <div class="col-md-3">
            <label for="genres"><h2 class="p-0 m-0">Game List</h2></label>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="container">
                    <form action="/search" method="get" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search games">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3 h-100 p-3 mr-1" style="background-color: #21262f">
            <label for="genres"><h4 class="p-0 m-0">Genres:</h4></label>
            <form action="/sort_genre" method="get" role="sortGenre">
                <?php $var = 1; ?>
                @foreach ($genres as $genre)
            <input type="checkbox" name="genre{{$var}}" value="{{$genre->id}}">
                    <label for="{{$genre->name}}">{{$genre->name}}</label><br>
                    <?php $var +=1 ;?>
                @endforeach
                <button type="submit" value="submit" class="btn btn-dark">submit</button>
            </form> 
        </div>
        <div class="col-md-8 ml-5">
            <div class="row">
                <table class="table" style="color: rgb(255, 255, 255)">
                    <thead>
                        <tr>
                        <th></th>
                            <th>@sortablelink('appid', 'Appid')</th>
                            <th>@sortablelink('name', 'Name')</th>
                            <th>@sortablelink('price', 'Price')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($games))
                            @foreach ($games as $game)
                                <tr>
                                    <td><img src="{{$game->image}}" alt="{{$game->name}}" style="width: 100px"></td>
                                    <td>{{$game->appid}}</td>
                                    <td><a href="{{route('game', ['id' => $game->appid])}}">{{$game->name}}</a></td>
                                    <td>{{$game->price_formatted}}</td>
                                </tr>
                            @endforeach
                        @else
                            @foreach ($gamesOnGenre as $game)
                                <tr>
                                    <td><img src="{{$game['image']}}" alt="{{$game['name']}}" style="width: 100px"></td>
                                    <td>{{$game['appid']}}</td>
                                    <td><a href="{{route('game', ['id' => $game['appid']])}}">{{$game['name']}}</a></td>
                                    <td>{{$game['price_formatted']}}</td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    @if (isset($gamesOnGenre))
                        {{$gamesOnGenre->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4')}}
                    @else   
                        {{$games->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4')}}  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
