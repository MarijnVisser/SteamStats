@extends('layouts.app')


@section('content')

<script>
    var currentPlayerLevel = "<?= $gamedata['playerLevel']['player_level'] ?>";

    function showLevel(currentPlayerLevel) {
        var divLevel = document.getElementById("divLevel");
        divLevel.classList.add("friendPlayerLevel");

        if (currentPlayerLevel < 100) {
            var level_1 = Math.floor(currentPlayerLevel / 10) * 10; //level 35 becomes 30
            divLevel.classList.add("lvl_" + level_1);
        } else {
            var level_1 = Math.floor(currentPlayerLevel % 100 / 10) * 10; // level 235 becomes 30
            var level_2 = Math.floor(currentPlayerLevel / 100) * 100; // level 235 becomes 200
            divLevel.classList.add("lvl_" + level_2);
            divLevel.classList.add("lvl_plus_" + level_1);
        }

    }
</script>

<h1>Profile</h1>
<!-- <button onclick="showLevel(currentPlayerLevel)">kkr mooie button</button> -->

<?php
$lastLogoff = $gamedata['data']['lastlogoff'] ?? '';
$timeCreated = $gamedata['data']['timecreated'] ?? '';
$gameInfo = $gamedata['data']['gameextrainfo'] ?? '';
$gameID = $gamedata['data']['gameid'] ?? '';
'https://steamcdn-a.akamaihd.net/steamcommunity/public/images/'
?>

<!--    Profile information    -->
<div class="wrapContainer" style="background-image: url('https://steamcdn-a.akamaihd.net/steamcommunity/public/images/{{$gamedata['profileBackground']['image_large']}}')">
    <div class="container pt-3">
        <div class="row bg-secondary">
            <div class="col-md-3 py-3">
                <img class="img-fluid w-100" src="{{$gamedata['data']['avatarfull']}}">
            </div>
            <div class="col-md-5">
                <a id="profilelink" href="{{$gamedata['data']['profileurl']}}">{{$gamedata['data']['personaname']}}</a>
                @if(!empty($gameInfo))
                <p class="userPageInfo">Currently playing: {{$gamedata['data']['gameextrainfo']}}</p>
                <p class="userPageInfo">Game id: {{$gamedata['data']['gameid']}}</p>
                @else
                <p class="userPageInfo">Currently not ingame</p>
                @endif
                <span class="userPageInfo">Level: <div id="divLevel" class="friendPlayerLevelNum">{{ $gamedata['playerLevel']['player_level'] }}</div></span>
                <p class="userPageInfo">{{"Total XP: " .  $gamedata['playerLevel']['player_xp'] }}</p>
                <p class="userPageInfo">{{ $gamedata['playerLevel']['player_xp_needed_to_level_up'] . " / ".  $gamedata['playerLevel']['player_xp_needed_current_level'] . " XP to next level "}}</p>
                <p class="userPageInfo">Country: {{$gamedata['data']['loccountrycode']}}</p>
            </div>
            <div class="col-md-4 pt-3">
                <p class="userPageInfo border border-dark">Vac ban: @if($gamedata['banInfo']['VACBanned'] == false) None @else {{$gamedata['banInfo']['NumberOfVACBans']}} Ban(s) ({{ $gamedata['banInfo']['DaysSinceLastBan'] }} Days ago) @endif</p>
                <p class="userPageInfo border border-dark">Community ban: @if($gamedata['banInfo']['CommunityBanned'] == false) None @else Banned @endif</p>
                <p class="userPageInfo border border-dark">Game bans: @if($gamedata['banInfo']['NumberOfGameBans'] == false) None @else {{$gamedata['banInfo']['NumberOfGameBans']}} @endif</p>
                <p class="userPageInfo border border-dark">Trade ban: @if($gamedata['banInfo']['EconomyBan'] == 'none') None @else {{$gamedata['banInfo']['EconomyBan']}} @endif</p>
                <p class="userPageInfo border border-dark">Account age: {{ date('y') - gmdate('y', $timeCreated) }} years</p>
                <p class="userPageInfo border border-dark">Steamid: {{$gamedata['data']['steamid']}}</p>
            </div>
        </div>
        @if(!empty($gamedata['recentlyPlayedGames']))
            <div class="card-group row">
                @foreach ($gamedata['recentlyPlayedGames'] as $recentlyPlayedGame)
                    <div class="card profileCards col-md-3 p-0">
                        @if(!empty($recentlyPlayedGame['img_logo_url']))
                            <img class="card-img-top"
                                 src="http://media.steampowered.com/steamcommunity/public/images/apps/{{ $recentlyPlayedGame['appid'] }}/{{ $recentlyPlayedGame['img_logo_url'] }}.jpg">
                        @else
                            <img class="card-img-top noImageFound"
                                 src="https://piotrkowalski.pw/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ !empty($recentlyPlayedGame['name']) ? $recentlyPlayedGame['name'] : "No name found" }}</h5>
                            <p>Appid: {{ $recentlyPlayedGame['appid'] }}</p>
                            <p>Last 2 weeks: {{ round($recentlyPlayedGame['playtime_2weeks'] / 60, 1) . " Hours" }}</p>
                            <p>Overall
                                playtime: {{ round($recentlyPlayedGame['playtime_forever'] / 60, 1) . " Hours" }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

<script>
    showLevel(currentPlayerLevel)
</script>

@endsection