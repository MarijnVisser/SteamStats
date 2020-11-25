<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [

    ];

    public $steamid;
    public $customid;

    /**
     * @return mixed
     */
    public function getProfileSummary(){

        $this->steamid = Auth::user()->steamid;
        $data = Http::get('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamids='. $this->steamid)->json();

        return $data;
    }

    /**
     * @return array|mixed
     */
    public function getBanInfo(){
        $this->steamid = Auth::user()->steamid;
        $banInfo = Http::get('http://api.steampowered.com/ISteamUser/GetPlayerBans/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamids='. $this->steamid)->json();

        return $banInfo;
    }

    /**
     * @return array|mixed
     */
    public function getRecentlyPlayedGames(){
        $this->steamid = Auth::user()->steamid;
        $recentlyPlayedGames = Http::get('http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid='. $this->steamid .'&format=json')->json();

        return $recentlyPlayedGames;
    }

    public function getPlayerLevel(){
        $this->steamid = Auth::user()->steamid;
        $playerLevel = Http::get("https://api.steampowered.com/IPlayerService/GetBadges/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid=".$this->steamid)->json();

        return $playerLevel;
    }

    public function getProfileBackground(){
        $this->steamid = Auth::user()->steamid;
        $profileBackground = Http::get("https://api.steampowered.com/IPlayerService/GetProfileBackground/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid=".$this->steamid)->json();

        return $profileBackground;

    }

    public function getAvatarFrame(){
        $this->steamid = Auth::user()->steamid;
        $customFrame = Http::get("https://api.steampowered.com/IPlayerService/GetAvatarFrame/v1/?key=3FE725B04637FA6637A3BA1684CFEEF9&steamid=".$this->steamid)->json();

        return $customFrame;
    }



    public function resolveCustomURL(){
        $this->customid = "colorfulcat";
        $resolvedurl = Http::get("https://api.steampowered.com/ISteamUser/ResolveVanityURL/v1/?key=122A8E9CFFA3C7CDE537F464AF8ACCC4&vanityurl=".$this->customid)->json();

        return $resolvedurl;
    }

//     WISHLIST API CALL   https://store.steampowered.com/wishlist/profiles/76561198088141566/wishlistdata/?p=0

}
