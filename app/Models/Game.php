<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'appid',
        'name'
    ];

    public function getGames(){

        $url = http::get("https://api.steampowered.com/ISteamApps/GetAppList/v2/")->json();

        return $this->games = $url["applist"]["apps"];

    }
}
