<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class to_address extends Model
{
    use HasFactory;

    protected $table= "to_addresses";

    protected $fillable = ['ep_id', 'name', 'street1', 'city', 'state', 'zip', 'country', 'phone', 'email', 'verify'];
}
