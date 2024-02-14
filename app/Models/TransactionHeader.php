<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    protected $table = 'transaction_header';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(User::class,'id','user_id');
    }

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, 'id','document_number');
    }
}
