<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        "user_id",
        "name",
        "short_description",
        "description",
        "android",
        "ios",
        "repo",
        "technology",
        "features",
        "status",
    ];

    protected function casts()
    {
        return [
            "features"      => "array",
            "technology"    => "array",
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('app-image')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->singleFile();
    }
}
