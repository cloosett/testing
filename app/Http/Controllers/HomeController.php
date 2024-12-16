<?php

namespace App\Http\Controllers;

use App\Models\Votes;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $votesIgor = Votes::where('vote', 'igor')->count();
        $votesSidjey = Votes::where('vote', 'sidjey')->count();
        return view('welcome', compact('votesIgor', 'votesSidjey'));
    }
}
