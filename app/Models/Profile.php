<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function profileImage()
    {
        return ($this->image) ? '/storage/' .$this->image : '/storage/profiles/eWBvQtlm1dFuBqdsQVzKQ9B2p0544ELLBmoEOk54.jpg';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        
        return $this->belongsToMany(User::class);
    }
}
