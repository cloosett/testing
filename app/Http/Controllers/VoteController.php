<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Votes;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function getVote(){
        $votesIgor = Votes::where('vote', 'igor')->count();
        $votesSidjey = Votes::where('vote', 'sidjey')->count();

        return response()->json([
            'igor' => $votesIgor,
            'sidjey' => $votesSidjey,
        ]);
    }
    public function vote(Request $request)
    {
        $validated = $request->validate([
            'vote' => 'required|in:igor,sidjey',
        ]);

        $vote = Votes::create([
            'vote' => $validated['vote'],
            'ip_address' => $request->ip(),
        ]);

        return response()->json('success');
    }

    public function offers(Request $request)
    {
        $validated = $request->validate([
            'offer' => 'required|string|min:3|max:255',
        ], [
            'offer.required' => 'Будь ласка, введіть вашу пропозицію.',
            'offer.min' => 'Пропозиція повинна бути не менше 3 символів.',
            'offer.max' => 'Пропозиція не може перевищувати 255 символів.',
        ]);

        $offer = Offers::create([
            'offer' => $validated['offer'],
        ]);

        if ($offer) {
            return redirect()->back()->with('messageoffers', 'Дякую за пропозицію!')->withFragment('about');
        }
    }

}
