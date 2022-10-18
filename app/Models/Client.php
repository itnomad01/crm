<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Representative;
use App\Models\Bid;
use App\Models\Contract;

class Client extends Model
{
    use HasFactory;

    const TA = [
        0 => 'Юридическое лицо',
        1 => 'Индивидуальный предприниматель',
        2 => 'Физическое лицо'
    ];

    protected $attributes = ['type' => 0, 'title' => ''];

    protected $fillable = [
        'fulltitle',
        'title',
        'brandtitle',
        'type',
        'ogrn',
        'inn',
        'kpp',
        'address',
        'fintitle',
        'personal_acc',
        'bank_name',
        'bic',
        'corresp_acc',
        'oktmo',
        'email',
        'site',
        'tel',
        'comment'
    ];

    public function getTAttribute()
    {
        return self::TA[$this->type];
    }

    public function representatives() // представители клиента
    {
        return $this->hasMany(Representative::class);
    }

    public function bids() // заявки клиента
    {
        return $this->hasMany(Bid::class);
    }

    public function contracts() // договоры с клиентом
    {
        return $this->hasMany(Contract::class);
    }

    public function creater() { // пользователь - создатель
        return $this->belongsTo(User::class);
    }

    public function updater() { // последний пользователь, обновивший модель
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function (Client $client) {
            if (Auth::check()) {
                $client->creater_id = Auth::id();
            }
        });
    }
}
