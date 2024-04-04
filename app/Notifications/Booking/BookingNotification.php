<?php

namespace App\Notifications\Booking;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class BookingNotification extends Notification implements ShouldQueue
{
	use Queueable, Notifiable;

	public $booking;

	public function __construct($data)
	{
		$this->booking = $data;
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
		$data = storage_path() . "/app/public/bookings/{$this->booking['code']}.pdf";

		return (new MailMessage)
			->greeting("Hello {$this->booking['name']}")
			->line("Your transaction was successful. See you on board!")
			->line("Please print and present the attached e-ticket at the designated LGU for payment processing.")
			->line('Thank you for using our application!')
			->attach($data);
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
