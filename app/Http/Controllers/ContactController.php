<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactReplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    // Menampilkan daftar pesan masuk di admin
    public function index(): View
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    // Submit Form Kontak dari Public Page
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validated);

        return back()->with('success', 'Pesan Anda berhasil dikirim! Tim kami akan membalas ke email Anda.');
    }

    // Detail & Balas Pesan dari Admin Dashboard
    public function show($id): View
    {
        $message = ContactMessage::findOrFail($id);
        $message->update(['is_read' => true]);

        return view('admin.messages.show', compact('message'));
    }

    // Kirim Balasan via Email
    public function reply(Request $request, $id): RedirectResponse
    {
        $request->validate(['reply_message' => 'required|string']);

        $message = ContactMessage::findOrFail($id);

        Mail::to($message->email)->send(new ContactReplyMail($message, $request->reply_message));

        $message->update([
            'reply_message' => $request->reply_message,
            'replied_at' => now(),
        ]);

        return back()->with('success', 'Balasan email berhasil terkirim ke ' . $message->email);
    }

    // Menghapus pesan masuk
    public function destroy($id): RedirectResponse
    {
        ContactMessage::findOrFail($id)->delete();
        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}