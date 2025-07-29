<?php

namespace Martin3r\Platform\Core\Livewire;

use Livewire\Component;
use Martin3r\Platform\Core\PlatformCore;

class Dashboard extends Component
{
    public $modules;

    public function mount()
    {
        $this->modules = PlatformCore::getModules();
        
    }

    public function render()
    {
        return view('platform::livewire.dashboard')->layout('platform::layouts.app');
    }
}