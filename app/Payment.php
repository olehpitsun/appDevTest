<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'id', 'user_id', 'type', 'total', 'currency', 'description', 'created_at', 'updated_at'
    ];
}
