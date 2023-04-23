<?php

namespace App\Http\Controllers;

use App\Models\TextEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TextEntryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required',
        ]);

        Log::info('Before creating text entry', $validated);
        
        $textEntry = TextEntry::create($validated);

        Log::info('After creating text entry', ['textEntry' => $textEntry]);

        return response()->json($textEntry);
    }

    public function latest()
    {
        $latestTextEntry = TextEntry::latest()->first();
        return response()->json($latestTextEntry);
    }

    public function index()
    {
        $textEntries = TextEntry::all();
        return response()->json($textEntries);
    }
}
