<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NawabganjSubComitee extends Model
{
    use HasFactory;
    protected $table = 'nawabganj_sub_comitees';

    protected $fillable = [
        'name',
        'mobile_no',
        'nid',
        'designation',
        'bank_name',
        'comitte_designation',
        'form',
        'to_year',
        'comitee',
        'current',
        'member_id',
    ];

    public function bankUser () {
        return $this->hasOne(BankUser::class, 'id', 'member_id');
    }
}
