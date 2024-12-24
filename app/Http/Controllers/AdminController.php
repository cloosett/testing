<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $votes = \App\Models\Votes::with('ips')->get();
        $offers = \App\Models\Offers::all();
        return view('admin.index', compact('votes', 'offers'));
    }

    public function updateVotes(Request $request)
    {
        $voteigor = $request->votesigor;
        $votesidjey = $request->votessidjey;
        \App\Models\Votes::where('vote', 'igor')->update(['count' => $voteigor]);
        \App\Models\Votes::where('vote', 'sidjey')->update(['count' => $votesidjey]);

        return redirect()->back()->with('success', 'Votes have been updated');
    }

    public function clearVotes()
    {
        DB::table('votes_ips')->truncate();

        return redirect()->back()->with('success', 'All data has been cleared');
    }
}
