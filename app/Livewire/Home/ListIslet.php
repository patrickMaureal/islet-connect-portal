<?php

namespace App\Livewire\Home;

use Livewire\Component;

use App\Models\Islet\Islet;

class ListIslet extends Component
{
	public function render()
	{
		return view('livewire.home.list-islet', [
			'islets' => Islet::all(),
		]);
	}
}
