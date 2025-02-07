<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Badge;

class CheckUserLevel
{
    public function handle(Request $request, Closure $next, $badgeId)
    {
        $user = auth()->user();
        $badge = Badge::findOrFail($badgeId);

        if ($user->level < $badge->required_level) {
            return response()->json(['message' => 'You do not meet the requirement level for this badge'], 403);
        }

        return $next($request);
    }
}

