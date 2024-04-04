<?php

namespace App\Models\Islet;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Islet extends Model implements HasMedia
{
  use HasFactory, HasUuids, SoftDeletes, InteractsWithMedia;

	protected $fillable = [
		'name',
		'total_population',
		'description',
		'region',
		'province',
		'municipality',
		'barangay',
		'latitude',
		'longitude',
	];

	public function activities()
	{
		return $this->hasMany(Activity::class);
	}
}
