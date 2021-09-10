<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function profileImage()
    {
        return ($this->image) ? '/storage/' . $this->image : '/storage/profile/D3jZPThHX9FMJY3x2g532TKefhUqP32ClhOGUY3o.png';
    }
}
