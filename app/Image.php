<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['type', 'path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
