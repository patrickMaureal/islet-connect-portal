<?php

namespace App\Livewire\Islet\Activity;


use App\Services\Media\MediaAttachmentService;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Islet\Activity;
use App\Models\Islet\Islet;
class ActivityForm extends Component
{
	use WithFileUploads;

	public $activity;
	public $description;
	public $photos = [];
	public $isletActivity;
	public Islet $islet;

  public $listeners = [
    'getSelectedIsletActivity'
  ];

  public function getSelectedIsletActivity(Activity $selectedActivity)
  {
		$this->isletActivity = $selectedActivity;
		$this->activity = $this->isletActivity->activity;
		$this->description = $this->isletActivity->description;
  }

	public function render()
	{
		return view('livewire.islet.activity.activity-form');
	}

  protected function rules()
  {
		return [
			'activity' 			=> 'required|string',
			'description' 	=> 'required|string',
		];
  }

  public function store(MediaAttachmentService $isletActivityAttachment)
  {
    // validate data
    $data = $this->validate();

		// store Model
		$activity = new Activity;
		$activity->activity = $data['activity'];
		$activity->description = $data['description'];
		$activity->islet_id = $this->islet->id;
		$activity->save();

    $this->clearForm();

    $this->dispatch('refresh-parent');
    $this->dispatch('alert', type:'success', message: 'Data has been saved successfully.', title: 'Islet Activity');
    $this->dispatch('close-form-modal');

  }

  public function update(MediaAttachmentService $isletActivityAttachment)
  {
    // validate data
    $data = $this->validate();

		// store Model
		$this->isletActivity->activity = $data['activity'];
		$this->isletActivity->description = $data['description'];
		$this->isletActivity->update();

    $this->clearForm();

    $this->dispatch('refresh-parent');
    $this->dispatch('alert', type:'success', message: 'Data has been saved successfully.');
    $this->dispatch('close-form-modal');

  }

  public function close()
  {
    $this->clearForm();
    $this->dispatch('close-form-modal');
  }

  public function clearForm()
  {
    $this->resetErrorBag();
    $this->resetValidation();
    $this->reset(['activity', 'description',]);
  }

}
