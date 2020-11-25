<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Game extends Model
{
    use HasFactory;

    public function Genre()
    {
        return $this->belongsToMany('App\Models\Genre');
    }

    protected $table = "games";

    protected $guarded = [];

    protected $fillable = [
        'appid',
        'name',
        'price',
        'price_formatted',
        'image'
    ];

    public $incrementing = false;

    public function getGames(){

        $url = http::get("https://api.steampowered.com/ISteamApps/GetAppList/v2/")->json();

        return $this->games = $url["applist"]["apps"];

    }

    public function getGame($appid){

        $url = http::get("https://store.steampowered.com/api/appdetails?appids=".$appid)->json();

        if(!empty($url)){
            if($url[$appid]['success'] == true){
                return $url[$appid];
            }
        }
    }

}
