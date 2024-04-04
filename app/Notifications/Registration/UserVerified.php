<?php

namespace App\Notifications\Registration;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserVerified extends Notification implements ShouldQueue
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
		$url = url(route('login'));

		return (new MailMessage)
			->subject('ISLET CONNECT ACCOUNT')
			->greeting("Hello! {$notifiable->name}")
			->line('Please click the button below to login your account with your registered email and with the default password that you can change later.')
			->line('Password: 12345678')
			->action('Login Now', $url);
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
