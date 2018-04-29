<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class TwitterAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $twitter_id)
    {
        $me = User::find(Auth::user()->id);
        $twitterAccount = $me->twitter_users()->where('twitter_id', $twitter_id)->get()->first();

        if ($twitterAccount) {

            return view('pages.twitterAccount', compact('twitterAccount'));

        } else {
            return redirect()->route('dashboard')->withErrors(["Forbidden"]);
        }

    }

    public function start(Request $request, $twitter_id) {

        $me = User::find(Auth::user()->id);
        $twitterAccount = $me->twitter_users()->where('twitter_id', $twitter_id)->get()->first();

        if ($twitterAccount) {

            $twitterAccount->running = true;
            $twitterAccount->save();
            return redirect()->route('twitterAccount', ['twitter_id' => $twitter_id]);

        } else {
            return redirect()->route('dashboard')->withErrors(["Forbidden"]);
        }

    }

    public function stop(Request $request, $twitter_id) {

        $me = User::find(Auth::user()->id);
        $twitterAccount = $me->twitter_users()->where('twitter_id', $twitter_id)->get()->first();

        if ($twitterAccount) {

            $twitterAccount->running = false;
            $twitterAccount->save();
            return redirect()->route('twitterAccount', ['twitter_id' => $twitter_id]);

        } else {
            return redirect()->route('dashboard')->withErrors(["Forbidden"]);
        }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
