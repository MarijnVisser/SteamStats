<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Game as gameModel;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        $games = DB::table('games')
            ->select('appid','name')
            ->orderBy('appid', 'asc')
            ->paginate(15);

        return view('games.games')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $games = new gameModel();
        $games = $games->getGames();

        set_time_limit(0);

        foreach ($games as $game) {

            gameModel::firstOrCreate(['appid' => $game['appid']], ['appid' => $game['appid'], 'name' => $game['name']]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game $game
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('games.game_page');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
