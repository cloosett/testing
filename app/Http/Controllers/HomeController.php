<?php

namespace App\Http\Controllers;

use App\Models\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $votesIgor = Cache::get('votes_igor');
        $votesSidjey = Cache::get('votes_sidjey');

        if (!$votesIgor || !$votesSidjey) {
            $votesIgor = Votes::where('vote', 'igor')->count();
            $votesSidjey = Votes::where('vote', 'sidjey')->count();

            Cache::put('votes_igor', $votesIgor, now()->addMinutes(10));
            Cache::put('votes_sidjey', $votesSidjey, now()->addMinutes(10));
        }

        return view('welcome', compact('votesIgor', 'votesSidjey'));
    }
}
