<?php

namespace App\Http\Livewire\Website;

use App\Http\Requests\Website\NewNewslettersRequest;
use App\Models\Newsletter as ModelsNewsletter;
use GrahamCampbell\ResultType\Success;
use Livewire\Component;

class Newsletter extends Component
{

    public $email;

    public $success=false;

    protected $rules = [
        'email' => ['required','email','unique:newsletters,email'],
    ];

    public function subscribe()
    {
        $this->success = false;
        
        $this->validate();
        
        ModelsNewsletter::query()->create([
            'email' => $this->email
        ]);

        $this->success = true;

        $this->email = '';
    }

    public function render()
    {
        return view('livewire.website.newsletter',[
            'success' => $this->success
        ]);
    }
}
