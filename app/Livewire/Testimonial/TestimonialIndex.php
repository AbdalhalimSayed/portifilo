<?php

namespace App\Livewire\Testimonial;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;

class TestimonialIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = "";

    protected $queryString = ["search" => ["except" => ""]];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete(Testimonial $testimonial)
    {
        $testimonial->delete();
        session()->flash('success', 'Testimonial successfully deleted.');
        return;
    }

    public function render()
    {
        $testimonials = Testimonial::when($this->search, function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('message', 'like', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.testimonial.testimonial-index', ['testimonials' => $testimonials]);
    }
}
