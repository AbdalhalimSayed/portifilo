<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

// use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;


class ProjectCreate extends Component
{
    use WithFileUploads;

    #[Validate("required|string|min:5|unique:projects,name")]
    public $name;

    #[Validate("required|string|min:30|max:50")]
    public $short_description;

    #[Validate("required|string|min:50")]
    public $description;

    // Add Features For Projects
    #[Validate("nullable|string|min:5")]
    public $feature = "";
    public $features = [];

    public function addFeature()
    {
        $this->validateOnly('feature');
        if ($this->feature == "") {
            $this->addError("feature", "Please Enter Feature");
            return;
        }
        $this->feature = trim($this->feature);
        if (in_array($this->feature, $this->features)) {
            $this->addError("feature", "This Feature Already Exists.");
            return;
        }

        $this->features[] = $this->feature;
        $this->feature = "";
    }

    public function removeFeature($index)
    {
        unset($this->features[$index]);
        $this->features = array_values($this->features);
    }

    // Add Technology For Projects
    #[Validate("nullable|string|min:3")]
    public $tech = "";
    public $technology = [];

    public function addTech()
    {
        $this->validateOnly('tech');
        if ($this->tech == "") {
            $this->addError("tech", "Please Enter Technology");
            return;
        }
        $this->tech = strtolower(trim($this->tech));
        if (in_array($this->tech, $this->technology)) {
            $this->addError("tech", "This Technology Already Exists.");
            return;
        }

        $this->technology[] = $this->tech;
        $this->tech = "";
    }

    public function removeTech($index)
    {
        unset($this->technology[$index]);
        $this->technology = array_values($this->technology);
    }

    // Projects Links

    #[Validate("nullable|min:10|url:http,https")]
    public $android;

    #[Validate("nullable|min:10|url:http,https")]
    public $ios;

    #[Validate("nullable|min:10|url:http,https")]
    public $repo;

    // Project Status

    #[Validate("required|in:published,draft")]
    public $status;

    #[Validate("required|image|max:2048|mimes:jpeg,jpg,png,webp")]
    public $image = null;

    public function removeImage()
    {
        $this->image = null;
    }

    // store Project

    public function store()
    {

        $this->validate();
        if (empty($this->features)) {
            $this->addError("feature", "Please Enter Features");
            return;
        }
        if (empty($this->technology)) {
            $this->addError("tech", "Please Enter Technology");
            return;
        }

        $project = Project::create([
            "user_id" => Auth::id(),
            "name" => $this->name,
            "short_description" => $this->short_description,
            "description" => $this->description,
            "android" => $this->android,
            "ios" => $this->ios,
            "repo" => $this->repo,
            "status" => $this->status,
            "features" => $this->features,
            "technology" => $this->technology,
        ]);

        if ($project) {
            $project->addMedia($this->image)->toMediaCollection("app-image");
        }

        $this->reset();

        return back()->with("success", "Successfully Add New Projects.");
    }

    public function render()
    {
        return view('livewire.project.project-create');
    }
}
