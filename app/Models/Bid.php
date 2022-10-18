<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Representative;
use App\Models\Event;
use App\Models\User;

class Bid extends Model
{
    use HasFactory;

    const TA = [
        0 => 'Отказ клиента',
        1 => 'Обращение',
        2 => 'Ожидание решения клиента',
        3 => 'Договор заключен',
        4 => 'Договор завершен'
    ];

    protected $attributes = ['client_id' => 0, 'type' => 1];

    protected $fillable = [
        'client_id',
        'representative_id',
        'title',
        'about',
        'type'
    ];

    public function getTAttribute()
    {
        return self::TA[$this->type];
    }

    public function events() // события заявки
    {
        return $this->hasMany(Event::class);
    }

    public function client() { // от кого заявка
        return $this->belongsTo(Client::class);
    }

    public function representative() { // основной представитель клиента по заявке
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
        static::creating(function (Bid $bid) {
            if (Auth::check()) {
                $bid->creater_id = Auth::id();
            }
        });
    }
}
