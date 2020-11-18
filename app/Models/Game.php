<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'appid',
        'name'
    ];

    public function getGames(){

        $url = "http://api.steampowered.com/ISteamApps/GetAppList/v0002/";
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);
        return $this->games = $json_data["applist"]["apps"];

    }
}
