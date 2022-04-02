<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConditionPayment extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fees',
        'assessment',
        'discount',
        'installment_amount',
        'id'
    ];

    public function formPayments()
    {
        return $this->belongsToMany(FormPayment::class);
    }
}
