<?php

namespace App\Http\Controllers\Web\Islet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Islet\StoreIsletActivityAttachmentRequest;
use Illuminate\Http\Request;
use App\Services\Media\MediaAttachmentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

use App\Models\Islet\Activity;
use App\Models\Islet\Islet;
use App\Models\Media\Media;

class AttachmentController extends Controller
{
	public function index(Request $request, Islet $islet, Activity $isletActivity): View
	{
		return view('islet.attachments', compact('islet', 'isletActivity'));
	}

	public function store(StoreIsletActivityAttachmentRequest $request, Activity $isletActivity, MediaAttachmentService $isletActivityAttachmentService): RedirectResponse
	{
		// validated data
		$data = $request->validated();

		$isletActivityAttachmentService->uploadMultiple($isletActivity, $data['attachments'], 'profiles');

		toast('Attachment has been successfully added.', 'success');
		return back();

	}

	public function download(Media $attachment): Response
	{
		$fileNameWithExt = explode('.', $attachment->file_name);
		return response()->download($attachment->getPath(), $attachment->name . '.' . $fileNameWithExt[1]);
	}

	public function destroy(Request $request,Media $media)
	{
		if ($request->ajax()) {

			Media::where('uuid', $media->uuid)->delete();
			return response()->json([
				'success' => true,
				'message' => 'Data has been successfully deleted.'
			], Response::HTTP_OK);
		}
	}

}

