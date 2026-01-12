<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ProfileEdit extends Component
{
    use WithFileUploads;

    public User $user;


    #[Validate('required|string|max:30')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|min:11|max:11')]
    public $phone;

    // Profile

    #[Validate('required|string|min:10|max:100')]
    public $job_name;

    #[Validate('required|string|min:50|max:250')]
    public $hero_description;

    // Tech Skills

    #[Validate("nullable|string|min:3|max:30")]
    public $tech_skill;
    public $tech_skills = [];

    public function addTechSkill()
    {
        $this->validate(["tech_skill" => "required|string|min:3|max:30"]);
        $this->tech_skill = strtolower(trim($this->tech_skill, " "));

        if (in_array(ucfirst($this->tech_skill), $this->tech_skills)) {
            $this->addError("tech_skill", "Please Enter Another Skill");
            return;
        }

        $this->tech_skills[] = ucfirst($this->tech_skill);
        $this->tech_skill = "";
    }

    public function removeTechSkill($index)
    {
        unset($this->tech_skills[$index]);

        $this->tech_skills = array_values($this->tech_skills);
    }

    // Soft Skills

    #[Validate("nullable|string|min:3|max:30")]
    public $soft_skill = "";
    public $soft_skills = [];

    public function addSoftSkill()
    {
        $this->validate(["soft_skill" => "required|string|min:3|max:30"]);

        $this->soft_skill = strtolower(trim($this->soft_skill, " "));

        if (in_array(ucfirst($this->soft_skill), $this->soft_skills)) {
            $this->addError("soft_skill", "Please Enter Another Skill");
            return;
        }

        $this->soft_skills[] = ucfirst($this->soft_skill);
        $this->soft_skill = "";
    }

    public function removeSoftSkill($index)
    {
        unset($this->soft_skills[$index]);

        $this->soft_skills = array_values($this->soft_skills);
    }

    // --- Social Links ---

    #[Validate('nullable|url')]
    public $linked_in;

    #[Validate('nullable|url')]
    public $facebook;

    #[Validate('required|string')]
    public $whatsapp;

    #[Validate('nullable|url')]
    public $github;

    // About
    #[Validate('required|string|min:50|max:150')]
    public $about_caption;

    #[Validate('required|string|min:100')]
    public $description;

    // --- Stats ---
    #[Validate('nullable|integer|min:1')]
    public $apps = 1;

    #[Validate('nullable|integer|min:1')]
    public $experience = 1;

    // --- Images ---

    // للرفع (الصور الجديدة)
    #[Validate('nullable|image|mimes:png,jpeg,jpg|mimetypes:image/png,image/jpeg,image/jpg|max:2048')] // 2MB Max
    public $new_avatar = null;
    public $avatar_upload = null;


    public function removeNewAvatar()
    {
        $this->new_avatar = null;
    }

    #[Validate('nullable|image|max:4096')] // 4MB Max for Hero
    public $new_hero = null;
    public $hero_upload = null;

    public function removeNewHero()
    {
        $this->new_hero = null;
    }

    // CV File

    #[Validate('nullable|file|max:4096|mimes:pdf')] // 4MB Max for Hero
    public $new_cv = null;

    public $cv = null;


    public function mount()
    {
        $this->user = Auth::user();

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;

        // Profile Data

        $this->job_name = $this->user->profile?->job_name ?? "";
        $this->hero_description = $this->user->profile?->hero_description ?? "";
        $this->tech_skills = $this->user->profile?->tech_skills ?? [];
        $this->soft_skills = $this->user->profile?->soft_skills ?? [];
        $this->linked_in = $this->user->profile?->linked_in ?? "";
        $this->facebook = $this->user->profile?->facebook ?? "";
        $this->whatsapp = $this->user->profile?->whatsapp ?? "";
        $this->github = $this->user->profile?->github ?? "";
        $this->about_caption = $this->user->profile?->about_caption ?? "";
        $this->description = $this->user->profile?->description ?? "";
        $this->apps = $this->user->profile?->apps ?? 1;
        $this->experience = $this->user->profile?->experience ?? 1;
        $this->avatar_upload = $this->user->profile?->getFirstMediaUrl("avatar-image") ?? null;
        $this->hero_upload = $this->user->profile?->getFirstMediaUrl("hero-image") ?? null;
        $this->cv = $this->user->profile?->getFirstMedia("dev-cv") ?? null;


    }


    public function save()
    {
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,

        ]);

        $profile = $this->user->profile()->updateOrCreate(
            ["user_id" => $this->user->id], [
            'job_name' => $this->job_name,
            'hero_description' => $this->hero_description,
            'tech_skills' => $this->tech_skills,
            'soft_skills' => $this->soft_skills,
            'linked_in' => $this->linked_in,
            'facebook' => $this->facebook,
            'whatsapp' => $this->whatsapp,
            'github' => $this->github,
            'about_caption' => $this->about_caption,
            'description' => $this->description,
            'apps' => $this->apps,
            'experience' => $this->experience,
        ]);

        if (!is_null($this->new_avatar) && $this->new_avatar instanceof TemporaryUploadedFile) {
            $profile->addMedia($this->new_avatar)->toMediaCollection("avatar-image");

            $this->avatar_upload = $profile->getFirstMediaUrl("avatar-image");
        }

        if (!is_null($this->new_hero) && $this->new_hero instanceof TemporaryUploadedFile) {
            $profile->addMedia($this->new_hero)->toMediaCollection("hero-image");
            $this->hero_upload = $profile->getFirstMediaUrl("hero-image");
        }

        if (!is_null($this->new_cv) && $this->new_cv instanceof TemporaryUploadedFile) {
            $profile->addMedia($this->new_cv)->toMediaCollection("dev-cv");
            $this->cv = $profile->getFirstMedia('dev-cv');
        }
        session()->flash('success', 'Profile Saved Successfully');
        return back();
    }

    public function render()
    {
        return view('livewire.profile.profile-edit');
    }
}
