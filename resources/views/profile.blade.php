@extends('layouts.app')

    @section('content')

        <h1>Profile</h1>

        <?php
            $lastLogoff = $data['lastlogoff'];
            $timeCreated = $data['timecreated'];
            $gameInfo = $data['gameextrainfo'] ?? '';
            $gameID = $data['gameid'] ?? '';
        ?>

        <!--    Profile information    -->
        <img src="{{$data['avatarfull']}}"><br>
        <a href="{{$data['profileurl']}}">Name: {{$data['personaname']}}</a>
        <p>Steamid: {{$data['steamid']}}</p>
        <p>Last logoff: {{ gmdate('D: d M Y', $lastLogoff) }}</p>
        <p>Account created: {{ gmdate('D: d M Y', $timeCreated) }}</p>
        <p>Country: {{$data['loccountrycode']}}</p>

        @if(!empty($gameInfo))
            <p>Currently playing: {{$data['gameextrainfo']}}</p>
            <p>Game id: {{$data['gameid']}}</p>
          @endif

        <!--    Ban information     -->

        <p>Vac ban: @if($banInfo['VACBanned'] == false) None @else {{$banInfo['NumberOfVACBans']}} Ban(s)  ({{ $banInfo['DaysSinceLastBan'] }} Days ago) @endif</p>
        <p>Community ban: @if($banInfo['CommunityBanned'] == false) None @else Banned @endif</p>
        <p>Game bans: @if($banInfo['NumberOfGameBans'] == false) None @else {{$banInfo['NumberOfGameBans']}} @endif</p>
        <p>Trade ban: @if($banInfo['EconomyBan'] == 'none') None @else {{$banInfo['EconomyBan']}} @endif</p>


        <!--    Recently Played information     -->

        <?php

        foreach ($recentlyPlayedGames as $recentlyPlayedGame){

            print_r($recentlyPlayedGame['appid']. '<br>');

        }

        ?>

{{--        {{$recentlyPlayedGames[0]['appid']}}--}}
{{--        {{$recentlyPlayedGames['name']}}--}}



@endsection
