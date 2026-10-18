<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactMessage;
    public $replyBody;

    public function __construct(ContactMessage $contactMessage, string $replyBody)
    {
        $this->contactMessage = $contactMessage;
        $this->replyBody = $replyBody;
    }

    public function build()
    {
        return $this->subject('Tanggapan dari PT Solusi Koneksi Anda')
                    ->html("
                        <div style='font-family: sans-serif; padding: 20px; line-height: 1.6; color: #333;'>
                            <h2>Halo, {$this->contactMessage->name}</h2>
                            <p>Terima kasih telah menghubungi PT Solusi Koneksi Anda. Berikut adalah tanggapan pesan Anda:</p>
                            <blockquote style='background: #f3f4f6; padding: 12px 16px; border-left: 4px solid #2563eb; margin: 15px 0;'>
                                " . nl2br(e($this->replyBody)) . "
                            </blockquote>
                            <hr style='border: none; border-top: 1px solid #eee; margin: 20px 0;'>
                            <p style='font-size: 12px; color: #777;'>
                                <strong>Pesan Asal Anda:</strong><br>
                                \"{$this->contactMessage->message}\"
                            </p>
                            <p style='font-size: 12px; color: #999;'>&copy; PT Solusi Koneksi Anda - IoT & Robotics Solution</p>
                        </div>
                    ");
    }
}