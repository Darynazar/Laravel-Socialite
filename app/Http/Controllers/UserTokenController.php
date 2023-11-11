<?php

namespace App\Http\Controllers;

use App\Models\UserToken;
use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class UserTokenController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $userToken = new UserToken();
        $userToken->user_id = $user->id;
        $userToken->github = $request->token;
        $userToken->github_expire_date = $request->date;
        $userToken->save();

        return redirect()->route('UserTokenShow');
    }

    public function show()
    {
        $githubToken = UserToken::where('user_id', auth()->user()->id)->first();
        Config::set('github.connections.main.token', $githubToken->github);
        $repositories =GitHub::me()->repositories(['affiliation' => 'owner,organization']);
        $repositories = json_decode(json_encode($repositories), FALSE);
        return view('github.show', compact('repositories'));
    }

}
