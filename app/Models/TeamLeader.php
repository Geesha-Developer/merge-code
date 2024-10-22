<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamLeader extends Model
{
    use HasFactory;

    protected $table = 'teamleader';

    protected $fillable = ['tl','leader_email','leader_manager','office'];

    public function user()
    {
        return $this->belongsTo(User::class, 'team_lead');
    }
}
