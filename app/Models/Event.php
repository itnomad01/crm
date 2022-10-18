<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Bid;
use App\Models\User;

class Event extends Model
{
    use HasFactory;

    protected $attributes = ['bid_id' => 0, 'text' => ''];

    protected $fillable = [
        'bid_id',
        'text'
    ];

    public function bid() { // заявка
        return $this->belongsTo(Bid::class);
    }

    public function creater() { // пользователь - создатель
        return $this->belongsTo(User::class);
    }

    public function updater() { // последний пользователь, обновивший модель
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function (Event $event) {
            if (Auth::check()) {
                $event->creater_id = Auth::id();
            }
        });
    }
}
