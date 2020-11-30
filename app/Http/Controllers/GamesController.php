<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Game as gameModel;
use App\Models\Genre as genreModel;
use App\Models\Review as reviewModel;
use App\Models\User as userModel;
use PhpParser\Node\Stmt\DeclareDeclare;

use App\Helper\Helper;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {

        $games = gameModel::select('appid','name', 'price', 'price_formatted', 'image')
            ->whereNotNull('price')
            ->sortable()
            ->paginate(15);

        $genres = DB::table('genres')
            ->select('*')
            ->get();

        return view('games.games')
            ->with('games', $games)
            ->with('genres', $genres);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Application|Factory|View|Response
     */
    public function sortGenre(Request $request){

        $inputs = $request->input();
// dd($inputs);

        $games = DB::table('games')->select('games.*')
            ->join('game_genre', 'games.id', '=', 'game_genre.game_id')
            ->join('genres', 'game_genre.genre_id', '=', 'genres.id')
            ->whereIn('genres.id', $inputs)
            ->distinct('games.id')
            ->paginate(10);

        $genres = DB::table('genres')
            ->select('*')
            ->get();

        return view('games.games', compact($games))
            ->with('games', $games)
            ->with('genres', $genres);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
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

        $genres = DB::table('genres')
            ->select('*')
            ->get();

        return View('games.games')->with('games',$games)->with('genres', $genres);;
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
        $games = new gameModel();
        $games = $games->getGames();

        set_time_limit(0);

        foreach($games as $game){

            sleep(0.1);

            $id = $game['appid'];

            $gameExists = gameModel::where('appid', $id)->first();

            if($gameExists === null){

                $gameInfo = new gameModel();
                $gameInfo = $gameInfo->getGame($id);

                if(!empty($gameInfo)){
                    if($gameInfo['data']['release_date']['coming_soon'] == true){
                        $priceFormatted = "Coming Soon";
                        $price = NULL;
                    }
                    elseif($gameInfo['data']['is_free'] == true){
                        $priceFormatted = "Free to Play";
                        $price = NULL;
                    }
                    elseif(!empty($gameInfo['data']['price_overview'])){
                        $priceFormatted = $gameInfo['data']['price_overview']['final_formatted'];
                        $price = $gameInfo['data']['price_overview']['final'];
                    }

                    if($gameInfo['success'] == true){
                        if($gameInfo['data']['type'] == 'game'){

                            $newGame = gameModel::updateOrCreate(['appid' => $game['appid']],['appid' => $game['appid'],'name' => $game['name'], 'price' => $price, 'price_formatted' => $priceFormatted, 'image' => $gameInfo['data']['header_image']]);

                            if(!empty($gameInfo['data']['genres'])){
                                foreach($gameInfo['data']['genres'] as $genre){

                                    genreModel::firstOrCreate(['id' => $genre['id']], ['name' => $genre['description']]);

                                    DB::table('game_genre')->insert(['game_id' => $newGame->id, 'genre_id' => $genre['id']]);
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

        if(!empty($game['data'])) {
            $reviews = reviewModel::where('appid', $game['data']['steam_appid'])->orderBy('id', 'DESC')->get();

            foreach ($reviews as $review) {
                $review['steam'] = userModel::where('steamid', $review['steamid'])->get();
                unset($review['steamid']);
                if (date('d/m/Y') == $review['created_at']->format('d/m/Y')) {
                    $review['ago'] = Helper::time_elapsed_string($review['created_at']);
                    unset($review['created_at']);
                }
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
     * @return Response
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
     * @return Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return Response
     */
    public function destroy()
    {
        //
    }
}
