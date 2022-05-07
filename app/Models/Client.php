<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'client',
        'nickname',
        'corporate_name',
        'district',
        'cep',
        'adress',
        'number',
        'complement',
        'id_city',
        'telephone',
        'cellphone',
        'email',
        'nationality',
        'cpf',
        'rg',
        'birth_date',
        'state_registration',
        'cnpj',
        'note'
    ];
}
