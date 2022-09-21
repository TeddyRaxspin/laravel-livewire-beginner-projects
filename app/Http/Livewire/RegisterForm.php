<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $email = '';
    public string $password = '';
    public string $first_name = '';
    public string $last_name = '';
    public string $role = 'customer';
    public string $company_name = '';
    public string $vat_number = '';

    protected $rules = [
        'first_name' => ['required', 'min:2'],
        'last_name' => ['required', 'min:2'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8'],
        'role' => ['required_if:role,vendor'],
        'vat_number' => ['required_if:role,vendor'],
    ];

    public function submit(){
        $validatedData = $this->validate();

        //Save customer info
        User::create($validatedData);

        session()->flash('message','Record created successfully!');

        //Reset values
        $this->email = '';
        $this->password = '';
        $this->first_name = '';
        $this->last_name = '';
        $this->role = 'customer';
        $this->company_name = '';
        $this->vat_number = '';
    }

    public function updated($property){
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
