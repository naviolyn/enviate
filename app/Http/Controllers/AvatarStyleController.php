<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avatar;
use App\Models\Style;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AvatarStyleController extends Controller
{
    public function index()
    {
        $avatars = Avatar::with('styles')->get();
        $user = Auth::user();
        return view('livewire.customize-avatar', compact('avatars', 'user'));
    }

    public function buyAvatar(Request $request, $avatarId)
    {
        $user = Auth::user();
        $avatar = Avatar::findOrFail($avatarId);

        if ($user->leaflet >= $avatar->leaflet_reward) {
            $user->leaflet -= $avatar->leaflet_reward;
            $user->save();
            return redirect()->back()->with('success', 'Avatar berhasil dibeli!');
        } else {
            return redirect()->back()->with('error', 'Leaflet tidak mencukupi!');
        }
    }

    public function buyStyle(Request $request, $styleId)
    {
        $user = Auth::user();
        $style = Style::findOrFail($styleId);

        if ($user->leaflet >= $style->leaflet_cost) {
            $user->leaflet -= $style->leaflet_cost;
            $user->save();
            return redirect()->back()->with('success', 'Style berhasil dibeli!');
        } else {
            return redirect()->back()->with('error', 'Leaflet tidak mencukupi!');
        }
    }
}
