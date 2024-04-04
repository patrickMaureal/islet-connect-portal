<?php

namespace App\Services\Media;

use Illuminate\Database\Eloquent\Model;

class MediaAttachmentService
{

	public function uploadSingle(Model $model, $file, $collection)
	{
		// model can only have one attachment
		if ($model->hasMedia($collection)) {
			$model->clearMediaCollection($collection);
		}

		$extension = $file->getClientOriginalExtension(); //Extension
		$newFilename = uniqid() . '.' . $extension; // unique filename

		$model->addMedia($file)->usingFileName($newFilename)->toMediaCollection($collection); // add media to collection

		return $model;
	}

	public function uploadMultiple(Model $model, $file, $collection)
	{
		// model can only have one attachment
		// if ($model->hasMedia('profiles')) {
		// 	$model->clearMediaCollection('profiles');
		// }

		foreach($file as $key => $item){
			$extension = $item->getClientOriginalExtension(); //Extension
			$newFilename = uniqid() . '.' . $extension; // unique filename

			$model->addMedia($item)->usingFileName($newFilename)->toMediaCollection($collection); // add media to collection
		}

		return $model;
	}
}
