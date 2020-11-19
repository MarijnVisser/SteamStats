<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */


    public function index()
    {
        $data = new Profile;
        $data = $data->getProfileSummary();


        $banInfo = new profile;
        $banInfo = $banInfo->getBanInfo();

        $recentlyPlayedGames = new profile;
        $recentlyPlayedGames = $recentlyPlayedGames->getRecentlyPlayedGames();

        $playerLevel = new profile;
        $playerLevel = $playerLevel->getPlayerLevel();

        $gamedata = [];

        if (!empty($data['response'])) {
            $gamedata['data'] = $data['response']['players'][0];
        }
        if (!empty($banInfo)) {
            $gamedata['banInfo'] = $banInfo['players'][0];
        }
        if (!empty($recentlyPlayedGames['response'])) {
            $gamedata['recentlyPlayedGames'] = $recentlyPlayedGames['response']['games'];
        }
        if (!empty($playerLevel['response'])) {
            $gamedata['playerLevel'] = $playerLevel['response'];
        }

        return view('profile', ['gamedata'=>$gamedata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
