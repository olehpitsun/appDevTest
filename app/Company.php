<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    protected $table = 'users';

    protected $fillable = [
        'id', 'company_name', 'company_description'
    ];
}
