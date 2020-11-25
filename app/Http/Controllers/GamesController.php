<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Game as gameModel;
use App\Models\Genre as genreModel;
use App\Models\Review as reviewModel;
use App\Models\User as userModel;
use PhpParser\Node\Stmt\DeclareDeclare;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
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

                if(!empty($gameInfo)){
                    if($gameInfo['data']['release_date']['coming_soon'] == true){
                        $price = "Coming Soon";
                    }
                    elseif($gameInfo['data']['is_free'] == true){
                        $price = "Free to Play";
                    }
                    elseif(!empty($gameInfo['data']['price_overview'])){
                        $price = $gameInfo['data']['price_overview']['final_formatted'];
                    }

                    if($gameInfo['success'] == true){
                        if($gameInfo['data']['type'] == 'game'){

                            gameModel::updateOrCreate(['appid' => $game['appid']],['appid' => $game['appid'],'name' => $game['name'],'price' => $price, 'image' => $gameInfo['data']['header_image']]);

                            if(!empty($gameInfo['data']['genres'])){
                                foreach($gameInfo['data']['genres'] as $genre){

                                    genreModel::firstOrCreate(['id' => $genre['id']], ['name' => $genre['description']]);

                                    DB::table('genres_games')->insert(['game_id' => $game['appid'], 'genre_id' => $genre['id']]);
                                }
                            }
                        }
                    }
                }
            }
        }
    }


    /**
     * @param Request $id
     * @param $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function show(Request $request){

        $game = new gameModel();
        $game->id = $request->id;
        $game = $game->getGame($game['id']);

//        dd($game);


        if(!empty($game['data'])) {
            $reviews = reviewModel::where('appid', $game['data']['steam_appid'])->orderBy('id', 'DESC')->get();

            foreach ($reviews as $review) {
                $review['steam'] = userModel::where('steamid', $review['steamid'])->get();
                unset($review['steamid']);
            }

            return view('games.game_page')->with('game', $game['data'])->with('reviews', $reviews);
        }
        else
            return redirect()->back();
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
