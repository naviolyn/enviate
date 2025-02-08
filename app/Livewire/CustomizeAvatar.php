<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Avatar;
use App\Models\Style;
use App\Models\UserAvatar;
use Illuminate\Support\Facades\Auth;

class CustomizeAvatar extends Component
{
    public $avatars;
    public $selectedAvatar;
    public $styles = [];
    public $userLeaflets;
    public $selectedStyle = null;

    public function mount()
    {
        $this->avatars = Avatar::with('styles')->get();
        $this->userLeaflets = Auth::user()->leaflets;

        if ($this->avatars->isNotEmpty()) {
            $this->selectAvatar($this->avatars->first()->id);
        }
    }

    public function getAvatarData()
    {
        return $this->avatars->map(function ($avatar) {
            // Ambil styles berdasarkan avatar_id
            $avatarStyles = Style::where('avatar_id', $avatar->id)->get();

            return [
                'id' => $avatar->id,
                'name' => $avatar->name,
                'path' => asset('storage/' . $avatar->path),
                'leaflet_reward' => $avatar->leaflet_reward,
                'styles' => $avatarStyles->map(function ($style) {
                    return [
                        'id' => $style->id,
                        'name' => $style->name,
                        'path' => asset('storage/' . $style->path),
                    ];
                }),
            ];
        });
    }

    public function selectAvatar($avatarId)
    {
        $this->selectedAvatar = Avatar::find($avatarId);
        if ($this->selectedAvatar) {
            // Ambil styles berdasarkan avatar_id
            $this->styles = Style::where('avatar_id', $avatarId)->get();

            // Pilih style pertama jika tersedia
            if ($this->styles->isNotEmpty()) {
                $this->selectStyle($this->styles->first()->id);
            } else {
                $this->selectedStyle = null;
            }
        }
    }

    public function selectStyle($styleId)
    {
        $this->selectedStyle = Style::find($styleId);
    }

    public function buyAvatar()
    {
        if (!$this->selectedAvatar) {
            session()->flash('error', 'Pilih avatar terlebih dahulu.');
            return;
        }

        $cost = $this->selectedAvatar->leaflet_reward;
        $user = Auth::user();

        if ($user->leaflets >= $cost) {
            $user->leaflets -= $cost;
            $user->save();

            $customPath = $this->selectedStyle ? $this->selectedStyle->path : $this->selectedAvatar->path;

            UserAvatar::create([
                'user_id' => $user->id,
                'avatar_id' => $this->selectedAvatar->id,
                'custom_path' => $customPath,
            ]);

            session()->flash('success', 'Avatar berhasil dibeli!');
        } else {
            session()->flash('error', 'Leaflets tidak mencukupi.');
        }
    }

    public function render()
    {
        // Pastikan styles selalu sesuai dengan avatar yang dipilih
        if ($this->selectedAvatar) {
            $this->styles = Style::where('avatar_id', $this->selectedAvatar->id)->get();
        }

        return view('livewire.customize-avatar', [
            'avatars' => $this->avatars,
            'styles' => $this->styles,
            'selectedAvatar' => $this->selectedAvatar,
            'selectedStyle' => $this->selectedStyle,
            'userLeaflets' => $this->userLeaflets,
        ]);
    }
}
