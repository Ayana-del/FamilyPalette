<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $familyId = Auth::user()->family_id;
        $schedules = Schedule::where('family_id', $familyId)
            ->with(['user', 'category'])
            ->get();
        return response()->json($schedules);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after_or_equal:start_at',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $schedule = Schedule::create(array_merge($validated, [
            'family_id' => Auth::user()->family_id,
            'user_id' => Auth::id(),
        ]));

        return response()->json($schedule, 201);
    }
}
