<?php

namespace App\Models;

use App\Models\Member;
use Illuminate\Support\Str;
use App\Models\CartTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Barang extends Model implements Authenticatable
{
    use HasFactory, Notifiable;
    use AuthenticableTrait;

    protected $table = 'Barang';

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
        'Nama_Barang',
        'Harga_Barang',
        'Image',
        'Description',
        'Stock',
    ];



    public function scopeSearching($query, array $search){
        // ternary
        // if search ada atau tidak null
        // maka kita ambil aeeay searchnya
        // selain itu return false atau get -> tidak di jalankan
        // if(isset($search['search']) ? $search['search'] : false){
        //     return $query->where('Nama_Barang', 'like', '%' . $search['search'] . '%');
        // }

        // when collection and null coalescing operator
        $query->when($search['search'] ?? false, function($query, $search){
            return $query->where('Nama_Barang', 'like', '%' . $search . '%');
        });
    }

    public function CartTransactions(){
        return $this->belongsToMany(Member::class, "CartTransactions", "id_Barang", 'id_Member');
    }

    public function Cart(){
        return $this->hasMany(CartTransaction::class, 'id_Barang', 'id');
    }
}
