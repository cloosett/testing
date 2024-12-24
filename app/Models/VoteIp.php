<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteIp extends Model
{
    use HasFactory;

    protected $fillable = ['vote_id', 'ip_address'];
    protected $table = 'votes_ips';
    public function votes()
    {
        return $this->belongsTo(Votes::class);
    }
}
