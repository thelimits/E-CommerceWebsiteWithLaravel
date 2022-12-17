<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class CartTransaction extends Model implements Authenticatable
{
    use HasFactory, Notifiable;
    use AuthenticableTrait;

    protected $table = 'CartTransactions';

    // for UUID
    public $increment = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function($models){
            if($models->getKey() == null){
                $models->setAttribute($models->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    protected $fillable = [
        'id_Member',
        'id_Barang',
        'Quantity',
    ];

    public function Barang(){
        return $this->belongsTo(Barang::class);
    }
}
