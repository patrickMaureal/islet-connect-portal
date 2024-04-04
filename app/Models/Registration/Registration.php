<?php

namespace App\Models\Registration;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Registration extends Model implements HasMedia
{
	use HasFactory, HasUuids, SoftDeletes,InteractsWithMedia,Notifiable;

	protected $fillable = [
		'name',
		'email',
		'birthdate',
		'role',
		'status',
		'region',
		'province',
		'municipality',
	];

	protected $casts = [
		'verified_at' => 'datetime',
	];
}
