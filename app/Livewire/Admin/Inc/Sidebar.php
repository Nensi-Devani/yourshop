<?php

namespace App\Livewire\Admin\Inc;

use Livewire\Component;

class Sidebar extends Component
{
    public $activeTab;
    public function render()
    {
        return view('livewire.admin.inc.sidebar');
    }
    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }
}
