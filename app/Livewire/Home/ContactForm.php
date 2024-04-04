<?php

namespace App\Livewire\Home;

use App\Notifications\Home\ContactNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ContactForm extends Component
{

	public $first_name;
	public $last_name;
	public $phone_number;
	public $email;
	public $subject;
	public $message;

	protected $listeners = [
    'refresh-parent' => '$refresh',
  ];


	public function render()
	{
		return view('livewire.home.contact-form');
	}

	protected function rules()
  {
		return [
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'phone_number' => 'required|string',
			'email' => 'required|email',
			'subject' => 'required|string',
			'message' => 'required|string',
		];
  }
		public function submit()
		{
			$validatedData = $this->validate();

			$this->first_name = $validatedData['first_name'];
			$this->last_name = $validatedData['last_name'];
			$this->phone_number = $validatedData['phone_number'];
			$this->email = $validatedData['email'];
			$this->subject = $validatedData['subject'];
			$this->message = $validatedData['message'];


			Notification::route('mail', 'noreply@isletconnect.com')
			->notify(new ContactNotification($validatedData));

			$this->dispatch('alert', type:'success', message: 'Message Sent', title: 'Message Sent!');

			$this->clearForm();

		}

	public function clearForm()
  {
    $this->resetErrorBag();
    $this->resetValidation();
		$this->reset(['first_name','last_name','phone_number','email','subject','message']);
	}
}
