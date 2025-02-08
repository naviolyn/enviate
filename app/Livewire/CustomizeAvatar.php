<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Avatar;
use App\Models\Style;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomizeAvatar extends Component
{
    public $avatars;
    public $selectedAvatar;
    public $styles = [];
    public $userLeaflets;
    public $selectedStyle = null;
    public $ownedAvatars = [];
    public $ownedStyles = [];

    protected $listeners = [
        'selectAvatar' => 'selectAvatar',
        'selectStyle' => 'selectStyle',
        'buyStyle' => 'buyStyle'
    ];

    public function mount()
    {
        $user = Auth::user();
        $this->avatars = Avatar::with('styles')->get();
        $this->userLeaflets = $user->leaflets;
        $this->ownedStyles = $user->styles()->pluck('styles.id')->toArray();

        if ($this->avatars->isNotEmpty()) {
            $this->selectAvatar($this->avatars->first()->id);
        }

        $this->ownedAvatars = $user->avatars()->pluck('avatars.id')->toArray();

        $this->dispatch('styleSelected', ['selectedStyle' => $this->selectedStyle]);
    }

    public function selectAvatar($avatarId)
    {
        $this->selectedAvatar = Avatar::with('styles')->find($avatarId);

        if ($this->selectedAvatar) {
            $this->styles = $this->selectedAvatar->styles;
            $this->selectedStyle = $this->styles->first() ?? null;

            // Kirim styles ke frontend
            $this->dispatch('updateStyles', ['styles' => $this->styles]);
        }
    }

    public function selectStyle($styleId)
    {
        $this->selectedStyle = Style::find($styleId);
        $this->dispatch('styleSelected', ['selectedStyle' => $this->selectedStyle]);
    }

    public function render()
    {
        return view('livewire.customize-avatar', [
            'avatars' => $this->avatars,
            'styles' => $this->styles,
            'selectedAvatar' => $this->selectedAvatar,
            'selectedStyle' => $this->selectedStyle,
            'userLeaflets' => $this->userLeaflets,
        ]);
    }
}
