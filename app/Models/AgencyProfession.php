<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyProfession extends Model
{
	protected $table="agencies_profession";
    use HasFactory;

    protected $fillable = [
        "profession_id",
		"agency_id",
		"price"
    ];
}
