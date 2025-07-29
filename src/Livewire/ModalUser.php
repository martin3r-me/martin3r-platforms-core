<?php

namespace Martin3r\Platform\Core\Livewire;

use Livewire\Component;
use Martin3r\Platform\Core\PlatformCore;
use Livewire\Attributes\On; 

class ModalUser extends Component
{
    public $modalShow;

    #[On('open-modal-user')] 
    public function openModalUser()
    {
        $this->modalShow = true;
    }

    

    public function mount()
    {
        $this->modalShow = false;
    }

    public function closeModal()
    {
        $this->modalShow = false;
    }

    public function render()
    {
        return view('platform::livewire.modal-user');
    }
}