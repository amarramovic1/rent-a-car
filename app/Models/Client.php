<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'document_type',
        'number_of_documents',
        'country',
        'date_of_birth',
    ];


    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'client_id');
    }

}
