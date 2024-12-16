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

        return redirect()->back()->with('message', 'Ваш голос успішно зараховано!')->withFragment('about');
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
            return redirect()->back()->with('message', 'Дякую за пропозицію!')->withFragment('about');
        }
    }

}
