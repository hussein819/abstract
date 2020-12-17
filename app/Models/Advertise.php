<?php

namespace App\Models;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class)->orderBy('name');
    }

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->videos)->parseUrl();

        if (!$embed) {
            return '';
        }

        $embed->setAttribute(['width' => 1000, 'hight' => 500]);
        return $embed->getHtml();
    }
}
