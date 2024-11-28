<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'company_address',
        'company_telephone',
        'company_email',
        'owner_name',
        'owner_number',
        'owner_email',
        'contact_name',
        'contact_number',
        'contact_email',
        'company_status'
    ];
    public $timestamps = false;
    public $primaryKey = 'id';
}