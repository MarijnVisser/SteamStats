<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class ReviewController extends Controller
{

    // public function index()
    // {
    //     $data = Review::orderBy('id','desc')->paginate(10)->setPath('contacts');
    //     return view('admin.contacts.index', $data);
    // }

    // public function create()
    // {
    //     return view('admin.contacts.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required',
            'stars' => 'required',
            'steamid' => 'required'
        ]);

        if ($request->steamid == Auth::user()->steamid) {
            Review::create(request()->except(['_token']));
            return redirect()->back()->with('success','Review successfully submitted! Thank you!');
        } else {
            return redirect()->back()->with('error_steam_id',"Steam-ID doesn't match your Steam-ID. Login and try again.");
        }
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'reply'=>'required',
            'steamid'=>'required'
        ]);


//        DB::table('game_genre')->insert(['review_id' => $newGame->id, 'reply_id' => $genre['id']]);

        if($request->steamid == Auth::user()->steamid){
            Reply::create(request()->except(['_token']));
            return redirect()->back()->with('success','Reply successfully submitted! Thank you!');
        } else {
            return redirect()->back()->with('error_steam_id',"Steam-ID doesn't match your Steam-ID. Login and try again.");
        }

    }

    // public function show($id)
    // {
    //    $data =  Review::find($id);
    //    return view('admin.contacts.show',compact(['data']));
    // }

    // public function edit($id)
    // {
    //    $data = Review::find($id);
    //    return view('admin.contacts.edit',compact(['data']));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //      'name' => 'required',
    //      'email' => 'required|email',
    //      'phone' => 'required'
    //     ]);

    //     Review::where('id',$id)->update($request->all());
    //     return redirect()->back()->with('success','Update Successfully');

    // }

    // public function destroy($id)
    // {
    //     Review::where('id',$id)->delete();
    //     return redirect()->back()->with('success','Delete Successfully');
    // }

}
