<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($id)
    {
        $service = Service::findOrFail($id);
        
        // Format Pesan WhatsApp Otomatis
        $waNumber = "6281234567890"; // Ganti dengan nomor WA perusahaan Anda
        $waText = urlencode("Halo, saya tertarik untuk memesan layanan *{$service->name}* (Estimasi: Rp " . number_format($service->price, 0, ',', '.') . "). Mohon informasi lebih lanjut.");
        $waLink = "https://wa.me/{$waNumber}?text={$waText}";

        return view('public.order', compact('service', 'waLink'));
    }

    public function store(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $validated['service_id'] = $service->id;
        $validated['status'] = 'pending';

        Order::create($validated);

        return redirect()->route('services.show', $service->id)
            ->with('success', 'Pesanan layanan berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }
}