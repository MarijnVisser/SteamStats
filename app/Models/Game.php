<?php

namespace App\Models;

//use http\Env\Request;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use app\Http\Controllers\GamesController;
use Illuminate\Support\Facades\DB;


class Game extends Model
{
    use HasFactory;

    protected $table = "games";

    protected $guarded = [];

    protected $fillable = [
        'appid',
        'name'
    ];

    public function getGames(){

        $url = http::get("https://api.steampowered.com/ISteamApps/GetAppList/v2/")->json();

        return $this->games = $url["applist"]["apps"];
    //https://store.steampowered.com/api/appdetails?appids=
    }

    public function getGame($appid){


        $url = http::get("https://store.steampowered.com/api/appdetails?appids=".$appid)->json();
//        dd($url[$appid]);
        return $url[$appid]['data'];
    }

}
