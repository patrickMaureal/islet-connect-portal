<?php

namespace App\Models\Pumpboat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Pumpboat\IsletPumpboat;
use App\Models\Islet\Islet;
use App\Models\Resident\Resident;

class Pumpboat extends Model implements HasMedia
{
	use HasFactory, HasUuids, SoftDeletes, InteractsWithMedia;

	protected $fillable = [
		'name',
		'reg_number',
		'total_passenger_capacity',
		'description',
		'dimension_width',
		'dimension_length',
		'dimension_depth',
		'fuel_type',
		'hull_material',
		'safety_equipment',
		'owner',
		'captain',
		'amenities',
	];

	public function pumpboatOwner(): BelongsTo
	{
		return $this->belongsTo(Resident::class, 'owner', 'id');
	}

	public function pumpboatCaptain(): BelongsTo
	{
		return $this->belongsTo(Resident::class, 'captain', 'id');
	}

	public function routes(): BelongsToMany
	{
		return $this->belongsToMany(Islet::class)->using(IsletPumpboat::class);
	}

}

