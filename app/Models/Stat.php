<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Stat extends Model
{
    use HasFactory;

     public function getMostPlayedGames(){

    //     $mostPlayedgames = [];

    //     $url = http::get("https://api.steampowered.com/ISteamApps/GetAppList/v2/")->json();

    

        

    //     set_time_limit(0);

    //     foreach($url['applist']['apps'] as $item){ 
    //         $current = http::get('https://api.steampowered.com/ISteamUserStats/GetNumberOfCurrentPlayers/v1/?key=8609245A6AB59AF2B3BE61C23B4E352E&appid='.$item['appid'])->json();
    //          if(isset($current['response']['player_count']))
    //             $mostPlayedgames[$item['name']] = $current['response']['player_count'];

    //     }
    //     return $mostPlayedgames;
     }


































}
