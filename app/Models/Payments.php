<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $fillable = [
        'camera_id',
        'camera_name',
        'camera_category',
        'camera_price',
        'total_price',
        'days_rent',
        'rent_date',
        'return_date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function camera()
    {
        return $this->belongsTo(Cameras::class, 'camera_id');
    }
}
