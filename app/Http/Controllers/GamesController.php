<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Game as gameModel;
use PhpParser\Node\Stmt\DeclareDeclare;

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
     * Remove the specified resource from storage.
     *
      * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search =  $request->input('q');
        if($search!=""){
            $games = gameModel::where(function ($query) use ($search){
                $query->where('appid', 'like', '%'.$search.'%')
                    ->orWhere('name', 'like', '%'.$search.'%');
            })
            ->orderBy('name')
            ->paginate(15);
            $games->appends(['q' => $search]);
        }
        else{
            $games = gameModel::paginate(15);
        }
        return View('games.games')->with('games',$games);
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
     * @param Request $id
     * @param $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request){

////        dd($request->id);
//        if($request->id>0){
//            $game = gameModel::where('id', $request->id)->first();
//
//            return view('games.game_page')->with('game', $game);
//        }
//
//        $request->session()->put('appid', $id);

        $game = new gameModel();
        $game->id = $request->id;
        $game = $game->getGame($game['id']);

        return view('games.game_page')->with('game', $game);
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
