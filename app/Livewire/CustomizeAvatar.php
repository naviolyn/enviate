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

    public function mount()
{
    $user = Auth::user();
    $this->avatars = Avatar::with('styles')->get();
    $this->userLeaflets = $user->leaflets;

    if ($this->avatars->isNotEmpty()) {
        $this->selectAvatar($this->avatars->first()->id);
    }

    $this->ownedAvatars = $user->avatars()->pluck('avatars.id')->toArray();
    $this->ownedStyles = DB::table('styles')
        ->join('user_styles', 'styles.id', '=', 'user_styles.style_id')
        ->where('user_styles.user_id', $user->id)
        ->pluck('styles.id')
        ->toArray();

    $this->dispatch('styleSelected', selectedStyle: $this->selectedStyle);
}

    public function selectAvatar($avatarId)
    {
        $this->selectedAvatar = Avatar::find($avatarId);

        if ($this->selectedAvatar) {
            $this->styles = Style::where('avatar_id', $avatarId)->get();
            $this->selectedStyle = $this->styles->first() ?? null;
        }
    }

    public function selectStyle($styleId)
{
    $this->selectedStyle = Style::find($styleId);
}


    public function buyAvatar($avatarId)
    {
        $user = Auth::user();

        if (in_array($avatarId, $this->ownedAvatars)) {
            session()->flash('error', 'You already own this avatar!');
            return;
        }

        $avatar = Avatar::find($avatarId);
        if (!$avatar) return;

        if ($user->leaflets < $avatar->leaflet_reward) {
            session()->flash('error', 'Not enough leaflets.');
            return;
        }

        $user->avatars()->attach($avatarId);
        $user->decrement('leaflets', $avatar->leaflet_reward);

        $this->ownedAvatars[] = $avatarId;
        $this->userLeaflets = $user->leaflets;

        session()->flash('success', 'Avatar purchased successfully!');
    }

    public function buyStyle($styleId)
    {
        $user = Auth::user();
        $style = Style::find($styleId);

        if (!$style || in_array($styleId, $this->ownedStyles)) {
            session()->flash('error', 'You already own this style or style not found.');
            return;
        }

        if ($user->leaflets < $style->leaflet_cost) {
            session()->flash('error', 'Insufficient leaflets.');
            return;
        }

        $user->styles()->attach($styleId);
        $user->decrement('leaflets', $style->leaflet_cost);

        $this->ownedStyles[] = $styleId;
        $this->userLeaflets = $user->leaflets;

        $this->dispatch('stylePurchased', ownedStyles: $this->ownedStyles);
        session()->flash('success', 'Style purchased successfully!');
    }

    public function showModal()
    {
        $this->dispatch('toggleModal');
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
