<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'referrer_id',
        'email',
        'referral_code',
        'is_registered',
    ];

    public static function generateReferralCode()
    {
        return bin2hex(random_bytes(5));
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }
}
