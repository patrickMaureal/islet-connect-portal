<?php

namespace App\Livewire\Islet\Activity;

use Livewire\Component;

use App\Models\Islet\Islet;
use App\Models\Islet\Activity;

class ListActivity extends Component
{

	public $isletActivityId;
	public Islet $islet;

  protected $listeners = [
    'refresh-parent' => '$refresh'
  ];

  public function mount($islet)
  {
    $islet->load('activities');
  }

	public function render()
	{
		return view('livewire.islet.activity.list-activity', );
	}

  public function add()
  {
    $this->dispatch('open-form-modal');
  }

	public function edit(Activity $isletActivity)
	{
		$this->dispatch('getSelectedIsletActivity', $isletActivity->id);
    $this->dispatch('open-form-modal');
	}

	public function delete(Activity $isletActivity)
	{
		$this->isletActivityId = $isletActivity->id;
    $this->dispatch('open-delete-modal');
	}

	public function destroy()
	{
		$isletActivity = Activity::findOrFail($this->isletActivityId);

		$isletActivity->clearMediaCollection('profiles'); // delete media
		$isletActivity->delete();

    $this->dispatch('refresh-parent');
    $this->dispatch('alert', type:'success', message: 'Data has been deleted successfully.');
    $this->dispatch('close-delete-modal');
	}

}
