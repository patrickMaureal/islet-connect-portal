<?php

namespace App\Notifications\Home;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification implements ShouldQueue
{
	use Queueable, Notifiable;

	public $validatedData;

	public function __construct($validatedData)
	{
			$this->validatedData = $validatedData;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @return array<int, string>
	 */
	public function via(object $notifiable): array
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail(object $notifiable): MailMessage
	{
		return (new MailMessage)
		->from("{$this->validatedData['email']}", "{$this->validatedData['first_name']} {$this->validatedData['last_name']}")
		->subject( $this->validatedData['subject'])
		->greeting('Hello!')
		->line("Name: {$this->validatedData['first_name']} {$this->validatedData['last_name']}")
		->line("Phone Number: {$this->validatedData['phone_number']}")
		->line("Message: {$this->validatedData['message']}");
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(object $notifiable): array
	{
		return [
			//
		];
	}
}
