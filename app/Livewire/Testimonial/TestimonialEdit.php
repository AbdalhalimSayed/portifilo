<?php

namespace App\Livewire\Testimonial;

use App\Models\Testimonial;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TestimonialEdit extends Component
{
    public Testimonial $testimonial;

    // --- Properties ---
    #[Validate('required|string|min:3|max:50')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('required|string|min:10|max:500')]
    public $message;

    #[Validate('required|in:spam,pending,accept')]
    public $status;

    public function mount(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
        $this->name = $testimonial->name;
        $this->email = $testimonial->email;
        $this->message = $testimonial->message;
        $this->status = $testimonial->status;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:testimonials,email,' . $this->testimonial->id,
            'message' => 'required|string|min:10|max:500',
            "status" => "in:pending,accept,spam",
        ];
    }

    public function update()
    {
        $this->validate();
        $this->testimonial->update([
            "name" => $this->name,
            "email" => $this->email,
            "message" => $this->message,
            "status" => $this->status,
        ]);

        session()->flash('success', 'Testimonial updated successfully.');
        return redirect()->route('admin.testimonial.index');
    }

    public function render()
    {
        return view('livewire.testimonial.testimonial-edit');
    }
}
