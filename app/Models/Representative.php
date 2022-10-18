<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\User;

class Representative extends Model
{
    use HasFactory;

    protected $attributes = ['client_id' => 0];

    protected $fillable = [
        'client_id',
        'family',
        'name',
        'ibn',
        'role',
        'email',
        'tel'
    ];

    public function client() { // на кого работает
        return $this->belongsTo(Client::class);
    }

    public function creater() { // пользователь - создатель
        return $this->belongsTo(User::class);
    }

    public function updater() { // последний пользователь, обновивший модель
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function (Representative $representative) {
            if (Auth::check()) {
                $representative->creater_id = Auth::id();
            }
        });
    }
}
