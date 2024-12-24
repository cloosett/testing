<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Votes;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function getVote()
    {
        $votesIgor = Votes::where('vote', 'igor')->first(); // Отримуємо перший запис для Igor
        $votesSidjey = Votes::where('vote', 'sidjey')->first(); // Отримуємо перший запис для Sidjey

        return response()->json([
            'igor' => $votesIgor ? $votesIgor->count : 0,  // Якщо є голоси для Igor, виводимо їх, інакше 0
            'sidjey' => $votesSidjey ? $votesSidjey->count : 0,  // Якщо є голоси для Sidjey, виводимо їх, інакше 0
        ]);
    }

    public function vote(Request $request)
    {
        $validated = $request->validate([
            'vote' => 'required|in:igor,sidjey',
        ]);

        // Отримуємо IP-адресу користувача
        $ipAddress = $request->ip();

        // Шукаємо голос, чи існує вже голосування для цього кандидата
        $vote = Votes::with('ips')->where('vote', $validated['vote'])->first();
        if (!$vote) {
            // Якщо голосу ще немає, створюємо новий запис
            $vote = Votes::create([
                'vote' => $validated['vote'],
                'count' => 1,
            ]);
        }

        // Перевіряємо, чи вже є запис з цією IP-адресою для цього голосу
        $existingVoteIp = $vote->ips()->where('ip_address', $ipAddress)->first();
        if ($existingVoteIp) {
            // Якщо голос з цієї IP вже є, повертаємо помилку з кодом 400
            return response()->json('Ви вже проголосували за цього кандидата!', 400);
        }

        // Додаємо нову IP-адресу для голосування
        $vote->ips()->create([
            'ip_address' => $ipAddress,
        ]);

        // Збільшуємо лічильник голосів
        $vote->increment('count');

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
