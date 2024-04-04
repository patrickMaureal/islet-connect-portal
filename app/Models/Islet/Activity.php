<?php

namespace App\Models\Islet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Activity extends Model implements HasMedia
{
  use HasFactory, HasUuids, SoftDeletes, InteractsWithMedia;


	protected $fillable = [
		'activity',
		'description',
		'islet_id',
	];

	public function islet()
	{
		return $this->belongsTo(Islet::class);
	}
}
