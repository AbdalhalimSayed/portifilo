<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class ProjectEdit extends Component
{
    use WithFileUploads;

    public Project $project;
    public $name;
    public $short_description;
    public $description;
    public $android;
    public $ios;
    public $repo;
    public $technology;
    public $features;
    public $image;
    public $status;

    public function mount()
    {
        $this->name = $this->project->name;
        $this->short_description = $this->project->short_description;
        $this->description = $this->project->description;
        $this->android = $this->project->android;
        $this->ios = $this->project->ios;
        $this->repo = $this->project->repo;
        $this->technology = $this->project->technology ?? [];
        $this->features = $this->project->features ?? [];
        $this->status = $this->project->status;
        $this->image = $this->project->getFirstMediaUrl('app-image');
    }

    // Add Features For Projects
    #[Validate("nullable|string|min:5")]
    public $feature = "";

    public function addFeature()
    {
        $this->validateOnly('feature');
        if (empty($this->feature)) {
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

    public function addTech()
    {
        $this->validateOnly('tech');
        if (empty($this->tech)) {
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

    // Add New Image
    #[Validate("nullable|image|max:2048|mimes:jpeg,jpg,png,webp")]
    public $newImage = null;

    public function removeImage()
    {
        $this->newImage = null;
    }

    // Update Projects

    public function rules()
    {
        return [
            "name" => ["required", "string", "min:5", Rule::unique("projects", "name")->ignore($this->project->id)],
            "short_description" => ["required", "string", "min:30", "max:50"],
            "description" => ["required", "string", "min:50"],
            "android" => ["nullable", "min:10", "url:http,https"],
            "ios" => ["nullable", "min:10", "url:http,https"],
            "repo" => ["nullable", "min:10", "url:http,https"],
            "technology" => ["required", "array"],
            "features" => ["required", "array"],
            "status" => ["required", "in:published,draft"],
            "newImage" => $this->newImage instanceof TemporaryUploadedFile
                ? 'image|mimes:jpeg,png,jpg,webp|max:2048'
                : 'nullable',
        ];
    }

    public function update()
    {
        $this->validate();

        $this->project->update([
            "name" => $this->name,
            "short_description" => $this->short_description,
            "description" => $this->description,
            "android" => $this->android,
            "ios" => $this->ios,
            "repo" => $this->repo,
            "technology" => $this->technology,
            "features" => $this->features,
            "status" => $this->status,
        ]);

        if ($this->newImage instanceof TemporaryUploadedFile) {
            // Remove old image
            $this->project->clearMediaCollection('app-image');
            // Add new image
            $this->project->addMedia($this->newImage)
                ->toMediaCollection('app-image');
        }

        return to_route("admin.project.index")->with("success", "Update Project " . $this->project->name . " Successfully.");

    }

    public function render()
    {

        return view('livewire.project.project-edit');
    }
}
