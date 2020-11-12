@extends('layouts.app')

@section('content')

<div class="container mt-5" >
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="row">
                <table class="table text-white">
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
