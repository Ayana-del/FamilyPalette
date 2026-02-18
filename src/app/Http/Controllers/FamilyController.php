<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if (!$user->family_id) {
            return response()->json(['message' => '家族に所属していません'], 404);
        }

        $family = Family::with('users')->find($user->family_id);

        return response()->json($family);
    }

    public function join(Request $request)
    {
        $request->validate([
            'invite_code' => 'required|string',
        ]);

        $family = Family::where('invite_code', $request->invite_code)->first();

        if (!$family) {
            return response()->json(['message' => '無効な招待コードです'], 404);
        }

        $user = Auth::user();
        $user->family_id = $family->id;
        $user->save();

        return response()->json([
            'message' => $family->name . ' に参加しました',
            'family' => $family
        ]);
    }
}