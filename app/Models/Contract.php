<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Representative;
use App\Models\User;

class Contract extends Model
{
    use HasFactory;

    protected $attributes = ['client_id' => 0, 'sum' => 0];

    protected $fillable = [
        'client_id',
        'representative_id',
        'number',
        'date',
        'begin',
        'end',
        'sum',
        'number_billout',
        'date_billout',
        'date_billout_payment',
        'number_act',
        'date_act',
        'date_act_accept'
    ];

    public function client() { // с кем договор
        return $this->belongsTo(Client::class);
    }

    public function representative() { // договор подписал
        return $this->belongsTo(Representative::class);
    }

    public function creater() { // пользователь - создатель
        return $this->belongsTo(User::class);
    }

    public function updater() { // последний пользователь, обновивший модель
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function (Contract $contract) {
            if (Auth::check()) {
                $contract->creater_id = Auth::id();
            }
        });
    }
}
