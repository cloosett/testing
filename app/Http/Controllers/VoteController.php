<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Votes;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request)
    {
//        $existingVote = Votes::where('ip_address', $request->ip())->first();
//
//        if ($existingVote) {
//            return redirect()->back()->withErrors(['error' => 'You have already voted.'])->withFragment('about');
//        }

        $validated = $request->validate([
            'vote' => 'required|in:igor,sidjey',
        ]);

        $vote = Votes::create([
            'vote' => $validated['vote'],
            'ip_address' => $request->ip(),
        ]);

        return redirect()->back()->with('message', 'Your vote has been recorded.')->withFragment('about');
    }

    public function offers(Request $request)
    {
        $validated = $request->validate([
            'offer' => 'required|string|max:255',
        ]);

        $offer = Offers::create([
            'offer' => $validated['offer'],
        ]);
        if ($offer) {
            return redirect()->back()->with('message', 'Дякую за пропозицію!')->withFragment('about');
        }
    }

}
