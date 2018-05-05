<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TwitterUser;
use App\KeywordTwitterUser;
use App\Lang;
use Illuminate\Support\Facades\Auth;
use App\Keyword;

class TwitterAccountSettingsController extends Controller
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
        $keywordsCount = $twitterAccount->keywords()->where('own_keyword', true)->count();
        $keywords = $twitterAccount->keywords()->where('own_keyword', true)->get();
        $langs = Lang::get();

        if ($twitterAccount) {

            return view('pages.twitterAccountSettings', compact(
                'twitterAccount',
                'keywords',
                'keywordsCount',
                'langs'
            ));

        } else {
            return redirect()->route('dashboard')->withErrors(["Forbidden"]);
        }
    }

    public function addKeyword(Request $request, $twitter_id, $keyword, $lang) {
        // check if the keyword is already linked to the user
        $me = User::find(Auth::user()->id);
        $twitterAccount = $me->twitter_users()->where('twitter_id', $twitter_id)->get()->first();
        $keywords = $twitterAccount->keywords()->where('own_keyword', true)->get();

        // check plan
        if (count($keywords) >= $me->plan->keyword_max_count) {
            return "You can't add more keywords";
        }

        foreach ($keywords as $k) {
            if ($k->name === urldecode($keyword) && $k->lang->code == $lang) {
                return 'This keyword already exists';
            }
        }

        // get lang object
        $l = Lang::where('code', $lang)->get()->first();

        $k = Keyword::where('name', urldecode($keyword))->where('lang_id', $l->id)->get()->first();
        if (!isset($k)) {
            $k = new Keyword();
            $k->name = urldecode($keyword);
            $k->lang_id = $l->id;
            $k->save();
        }

        $rel = new KeywordTwitterUser();
        $rel->twitter_user_id = $twitterAccount->id;
        $rel->keyword_id = $k->id;
        $rel->own_keyword = true;
        $rel->save();

        return 'Ok';

    }

    public function removeKeyword(Request $request, $twitter_id, $keyword, $lang) {
        $l = Lang::where('name', $lang)->get()->first();
        $me = User::find(Auth::user()->id);
        $twitterAccount = $me->twitter_users()->where('twitter_id', $twitter_id)->get()->first();
        $k = Keyword::where('name', urldecode($keyword))->where('lang_id', $l->id)->get()->first();
        KeywordTwitterUser::where('twitter_user_id', $twitterAccount->id)
            ->where('keyword_id', $k->id)
            ->where('own_keyword', 1)
            ->get()->first()->delete();
        return 'OK';
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
