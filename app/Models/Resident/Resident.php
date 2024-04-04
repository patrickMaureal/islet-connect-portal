<?php

namespace App\Models\Resident;

use App\Models\Pumpboat\Pumpboat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Resident extends Model implements HasMedia
{
  use HasFactory, HasUuids, SoftDeletes, InteractsWithMedia;

  protected $fillable = [

    'first_name',
    'middle_name',
    'last_name',
    'name_extension',
    'prefix',
    'gender',
    'email',
    'contact_number',
    'bloodtype',
    'physical_status',
    'birthplace',
    'birthdate',
    'marital_status',
    'employment_status',
    'evacuation_center',
		'region',
		'province',
		'municipality',
		'barangay',
		'street',
  ];

	// Resident image
	public function registerMediaCollections(): void
	{
		$this
			->addMediaCollection('profiles')
			->singleFile();
	}

	public function pumpboatsAsCaptain()
	{
		return $this->hasMany(Pumpboat::class, 'captain', 'id');
	}

	public function pumpboatsAsOwner()
	{
		return $this->hasMany(Pumpboat::class, 'owner', 'id');
	}

}
