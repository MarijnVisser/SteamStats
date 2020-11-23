<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Game as gameModel;
use App\Models\Genre as genreModel;
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
                $query->where('appid', 'like', $search)
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

        foreach($games as $game){
            
            sleep(0.1);

            $id = strval($game['appid']);

            $gameExists = gameModel::where('appid', $id)->first();

            if($gameExists === null){

                $gameInfo = new gameModel();
                $gameInfo = $gameInfo->getGame($id);

                $price = $gameInfo['data']['price_overview']['final'] ?? 0;

                if(!empty($gameInfo)){
                    if($gameInfo['success'] == true){
                        gameModel::firstOrCreate(['appid' => $game['appid']],['appid' => $game['appid'],'name' => $game['name'],'price' => $price]);
                    }
                }
                
                if(!empty($gameInfo['data']['genres'])){
                    foreach($gameInfo['data']['genres'] as $genre){
            
                        genreModel::firstOrCreate(['id' => $genre['id']], ['name' => $genre['description']]);

                        DB::table('genres_games')->upsert(['game_id' => $id, 'genre_id' => $genre['id']], ['game_id', 'genre_id']);
                    }
                }
            }
        }
    }


    /**
     * @param Request $id
     * @param $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request){

        $game = new gameModel();
        $game->id = $request->id;
        $game = $game->getGame($game['id']);

        if(!empty($game['data']))
            return view('games.game_page')->with('game', $game['data']);
        else
            return $this->index();
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
