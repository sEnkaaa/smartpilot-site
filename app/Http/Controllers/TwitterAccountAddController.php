<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Lang;
use App\User;
use App\TwitterUser;
use App\TwitterUserUser;

class TwitterAccountAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $me = User::find(Auth::user()->id);

        if (count($me->twitter_users()->get()) < $me->plan->twitter_user_max_count) { 
            return view('pages.twitterAccountAdd');
        } else {
            return redirect()->route('dashboard')->withErrors(["You can't add more Twitter accounts"]);
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
        $me = User::find(Auth::user()->id);

        if (count($me->twitter_users()->get()) < $me->plan->twitter_user_max_count) {
            
            $post_data = $request->all();

            $validator = Validator::make($post_data, [
                'consumer_key' => 'required|string',
                'consumer_secret' => 'required|string',
                'access_token' => 'required|string',
                'access_token_secret' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->route('twitterAccountAdd')
                    ->withErrors($validator);
            }

            Twitter::reconfig([
                'consumer_key' => $post_data['consumer_key'], 
                'consumer_secret' => $post_data['consumer_secret'], 
                'token' => $post_data['access_token'],
                'secret' => $post_data['access_token_secret']
            ]);


            try {
                $credentials = Twitter::getCredentials();
            } catch (\Exception $e) {
                return redirect()->route('twitterAccountAdd')
                    ->withErrors(['One of the tokens you just submitted is wrong, please try again']);
            }

            $me = User::find(Auth::user()->id);
            $TwitterAccounts = $me->twitter_users()->get();

            // Check if the twitter account is not already linked to this user
            if (count($TwitterAccounts) !== 0) {

                foreach ($TwitterAccounts as $account) {
                    if ($account->twitter_id === $credentials->id) {
                         return redirect()->route('twitterAccountAdd')
                            ->withErrors(['You already registered this Twitter account']);
                    }
                }

            }

            // Get lang id
            $lang_id = Lang::where('code', $credentials->lang)->get()->first()->id;

            // Check if the Twitter account is not already in the database
            $account = TwitterUser::where('twitter_id', $credentials->id)->get()->first();
            if ( isset($account) ) {

                // Update this Twitter account
                $account->twitter_id = $credentials->id;
                $account->screen_name = $credentials->screen_name;
                $account->name = $credentials->name;
                $account->description = $credentials->description;
                $account->statuses_count = $credentials->statuses_count;
                $account->consumer_key = $post_data['consumer_key'];
                $account->consumer_secret = $post_data['consumer_secret'];
                $account->access_token = $post_data['access_token'];
                $account->access_token_secret = $post_data['access_token_secret'];
                $account->profile_image_url = $credentials->profile_image_url_https;
                $account->followers_count = $credentials->followers_count;
                $account->followings_count = $credentials->friends_count;
                $account->lang_id = $lang_id;
                $account->save();

            } else {

                // Create this account
                $account = new TwitterUser;
                $account->twitter_id = $credentials->id;
                $account->screen_name = $credentials->screen_name;
                $account->name = $credentials->name;
                $account->description = $credentials->description;
                $account->statuses_count = $credentials->statuses_count;
                $account->consumer_key = $post_data['consumer_key'];
                $account->consumer_secret = $post_data['consumer_secret'];
                $account->access_token = $post_data['access_token'];
                $account->access_token_secret = $post_data['access_token_secret'];
                $account->profile_image_url = $credentials->profile_image_url_https;
                $account->followers_count = $credentials->followers_count;
                $account->followings_count = $credentials->friends_count;
                $account->lang_id = $lang_id;
                $account->save();            

            }

            // Define relationship
            $relation = new TwitterUserUser;
            $relation->twitter_user_id = $account->id;
            $relation->user_id = $me->id;
            $relation->save();

            return redirect()->route('dashboard');

        } else {
            return redirect()->route('dashboard')->withErrors(["You can't add more Twitter accounts"]);
        }
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
