@extends('layouts.app')

    @section('content')

        <h1>Profile</h1>

        <?php
            $lastLogoff = $gamedata['data']['lastlogoff'] ?? '';
            $timeCreated = $gamedata['data']['timecreated'] ?? '';
            $gameInfo = $gamedata['data']['gameextrainfo'] ?? '';
            $gameID = $gamedata['data']['gameid'] ?? '';
        ?>

        <!--    Profile information    -->

        <div class="container">
            <div class="row bg-secondary">
                <div class="col-md-3 py-3">
                    <img class="img-fluid w-100" src="{{$gamedata['data']['avatarfull']}}">
                </div>
                <div class="col-md-5">
                    <a id="profilelink" href="{{$gamedata['data']['profileurl']}}">{{$gamedata['data']['personaname']}}</a>
                    <p class="userPageInfo">Steam level: {{ $gamedata['playerLevel']['player_level'] }}</p>
                    <p class="userPageInfo">{{"Total XP: " .  $gamedata['playerLevel']['player_xp'] }}</p>
                    <p class="userPageInfo">{{ $gamedata['playerLevel']['player_xp_needed_to_level_up'] . " / ".  $gamedata['playerLevel']['player_xp_needed_current_level'] . " XP to next level "}}</p>
                    <p class="userPageInfo">Country: {{$gamedata['data']['loccountrycode']}}</p>
                </div>
                <div class="col-md-4 pt-3">
                <p class="userPageInfo border border-dark">Vac ban: @if($gamedata['banInfo']['VACBanned'] == false) None @else {{$gamedata['banInfo']['NumberOfVACBans']}} Ban(s)  ({{ $gamedata['banInfo']['DaysSinceLastBan'] }} Days ago) @endif</p>
                <p class="userPageInfo border border-dark">Community ban: @if($gamedata['banInfo']['CommunityBanned'] == false) None @else Banned @endif</p>
                <p class="userPageInfo border border-dark">Game bans: @if($gamedata['banInfo']['NumberOfGameBans'] == false) None @else {{$gamedata['banInfo']['NumberOfGameBans']}} @endif</p>
                <p class="userPageInfo border border-dark">Trade ban: @if($gamedata['banInfo']['EconomyBan'] == 'none') None @else {{$gamedata['banInfo']['EconomyBan']}} @endif</p>
                <p class="userPageInfo border border-dark">Account age: {{ date('y') - gmdate('y', $timeCreated) }} years</p>
                <p class="userPageInfo border border-dark">Steamid: {{$gamedata['data']['steamid']}}</p>

                </div>
            </div>
        </div>






        <a href="{{$gamedata['data']['profileurl']}}">Name: {{$gamedata['data']['personaname']}}</a>
        <p>Steam level: {{ $gamedata['playerLevel']['player_level'] }}</p>
        <p>{{ $gamedata['playerLevel']['player_xp_needed_to_level_up'] . " / ".  $gamedata['playerLevel']['player_xp_needed_current_level'] . " XP to next level "}}</p>
        <progress id="file" max="{{$gamedata['playerLevel']['player_xp_needed_current_level']}}" value="{{ $gamedata['playerLevel']['player_xp_needed_to_level_up']}}"> </progress>
        <p>{{"Total XP: " .  $gamedata['playerLevel']['player_xp'] }}</p>
        <p>Steamid: {{$gamedata['data']['steamid']}}</p>
        @if(!empty($lastLogoff)) <p>Last logoff: {{ gmdate('D: d M Y', $lastLogoff) }} </p> @endif
        <p>Account age: {{ date('y') - gmdate('y', $timeCreated) }} years</p>
        <p>Country: {{$gamedata['data']['loccountrycode']}}</p>
        @if(!empty($gameInfo))
            <p>Currently playing: {{$gamedata['data']['gameextrainfo']}}</p>
            <p>Game id: {{$gamedata['data']['gameid']}}</p>
        @endif

        <!--    Ban information     -->
        <p>Vac ban: @if($gamedata['banInfo']['VACBanned'] == false) None @else {{$gamedata['banInfo']['NumberOfVACBans']}} Ban(s)  ({{ $gamedata['banInfo']['DaysSinceLastBan'] }} Days ago) @endif</p>
        <p>Community ban: @if($gamedata['banInfo']['CommunityBanned'] == false) None @else Banned @endif</p>
        <p>Game bans: @if($gamedata['banInfo']['NumberOfGameBans'] == false) None @else {{$gamedata['banInfo']['NumberOfGameBans']}} @endif</p>
        <p>Trade ban: @if($gamedata['banInfo']['EconomyBan'] == 'none') None @else {{$gamedata['banInfo']['EconomyBan']}} @endif</p>


        <!--    Recently Played information     -->
        @foreach ($gamedata['recentlyPlayedGames'] as $recentlyPlayedGame)
            <img src="http://media.steampowered.com/steamcommunity/public/images/apps/{{ $recentlyPlayedGame['appid'] }}/{{ !empty($recentlyPlayedGame['img_logo_url']) ? $recentlyPlayedGame['img_logo_url'] : "No img"}}.jpg">
            <img src="http://media.steampowered.com/steamcommunity/public/images/apps/{{ $recentlyPlayedGame['appid'] }}/{{ !empty($recentlyPlayedGame['img_icon_url']) ? $recentlyPlayedGame['img_icon_url'] : "No img"}}.jpg">
            <p>Appid: {{ $recentlyPlayedGame['appid'] }}</p>
            <p>Name: {{ !empty($recentlyPlayedGame['name']) ? $recentlyPlayedGame['name'] : "No name found" }}</p>
            <p>Last 2 weeks: {{  round($recentlyPlayedGame['playtime_2weeks'] / 60, 1) . " Hours" }}</p>
            <p>Overall playtime: {{ round($recentlyPlayedGame['playtime_forever'] / 60, 1) . " Hours" }}</p>
        @endforeach

@endsection
