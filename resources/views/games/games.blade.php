@extends('layouts.app')

@section('content')

<div class="container mt-5" >
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <div class="container">
                    <form action="/search" method="get" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search games"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">appid</th>
                        <th scope="col">name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $game)
                            <tr>
                                <th>{{$game->appid}}</th>
                                <td><a href="{{route('game', ['id' => $game->appid])}}">{{$game->name}}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    {{$games->links('vendor.pagination.bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
