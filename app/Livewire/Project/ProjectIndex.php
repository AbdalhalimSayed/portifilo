<?php

namespace App\Livewire\Project;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectIndex extends Component
{

    public function delete(Project $project){
        $project->delete();

        session()->flash("success", "Successfully Delete Project.");
    }
    public function render()
    {
        $projects = Auth::user()->projects;
        return view('livewire.project.project-index', ["projects"=>$projects]);
    }
}
