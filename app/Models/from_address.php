<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class from_address extends Model
{
    use HasFactory;

    protected $table= "from_addresses";

    protected $fillable = ['ep_id', 'name', 'street1', 'city', 'state', 'zip', 'country', 'phone', 'email', 'verify'];
}
