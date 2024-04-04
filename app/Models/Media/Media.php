<?php

namespace App\Models\Media;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;

class Media extends BaseMedia
{

	/**
	 * Get the route key for the model.
	 */
	public function getRouteKeyName(): string
	{
		return 'uuid';
	}

}

