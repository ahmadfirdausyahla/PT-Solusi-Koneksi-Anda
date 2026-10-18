<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CompanyProfileController extends Controller
{
    // Menampilkan Form Edit Profil Admin
    public function edit(): View
    {
        // Selalu ambil record pertama, jika belum ada otomatis dibuatkan record kosong
        $profile = CompanyProfile::firstOrCreate(['id' => 1]);
        return view('admin.profile.edit', compact('profile'));
    }

    // Memperbarui Data Profil
    public function update(Request $request): RedirectResponse
    {
        $profile = CompanyProfile::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'history' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($profile->image && Storage::disk('public')->exists($profile->image)) {
                Storage::disk('public')->delete($profile->image);
            }
            $validated['image'] = $request->file('image')->store('profile', 'public');
        }

        $profile->update($validated);

        return back()->with('success', 'Profil Perusahaan berhasil diperbarui!');
    }
}