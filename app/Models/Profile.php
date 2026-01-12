<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        "user_id",
        "job_name",
        "hero_description",
        "tech_skills",
        "soft_skills",
        "linked_in",
        "facebook",
        "whatsapp",
        "github",
        "about_caption",
        "description",
        "apps",
        "experience",
        "views",
    ];

    protected function casts()
    {
        return [
            "tech_skills" => "array",
            "soft_skills" => "array",
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('hero-image')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->singleFile();

        $this
            ->addMediaCollection('avatar-image')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->singleFile();

        $this
            ->addMediaCollection('dev-cv')
            ->acceptsMimeTypes([
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ])
            ->singleFile();
    }


}
