<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributions extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'contribution_count',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
