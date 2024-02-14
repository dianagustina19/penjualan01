<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    protected $table = 'transaction_header';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function username()
    {
        return $this->hasOne(User::class,'id','user');
    }

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class, 'document_number', 'document_number');
    }    
}
