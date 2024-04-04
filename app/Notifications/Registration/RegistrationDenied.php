<?php

namespace App\Notifications\Registration;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistrationDenied extends Notification implements ShouldQueue
{
	use Queueable;

	/**
	 * Create a new notification instance.
	 */
	public function __construct()
	{
		//
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
		$url = url(route('register'));

		return (new MailMessage)
			->subject('ISLET CONNECT REGISTRATION DENIED')
			->greeting("Hello! $notifiable->name ")
			->line('Your registration has been denied, possibly due to invalid or unverified documents.')
			->line('Thank you for using ISLET CONNECT! and you may register again by clicking the button below.')
			->action('Register Again', $url);
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
