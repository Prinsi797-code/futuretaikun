<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $settings = Setting::all();
        return view('setting.index', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        $setting = Setting::findOrFail($id);
        $setting->update([
            'value' => $request->value,
            'description' => $request->description,
        ]);

        return redirect()->route('setting.index')->with('success', 'Setting updated successfully.');
    }
}