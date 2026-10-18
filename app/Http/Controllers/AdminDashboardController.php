<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\ContactMessage;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        // Hitung total data dinamis
        $totalServices = Service::count();
        $totalArticles = Article::count();
        $totalGalleries = Gallery::count();
        $totalMessages = ContactMessage::count();
        $unreadMessagesCount = ContactMessage::where('is_read', false)->count();

        // Ambil data terbaru
        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentArticles = Article::latest()->take(3)->get();
        $recentGalleries = Gallery::latest()->take(3)->get();
        $recentServices = Service::latest()->take(3)->get();

        // Data Grafik Dinamis 7 Hari Terakhir (Jumlah Konten Baru)
        $chartData = [];
        $days = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $days[] = now()->subDays($i)->translatedFormat('D');

            $articlesCount = Article::whereDate('created_at', $date)->count();
            $galleriesCount = Gallery::whereDate('created_at', $date)->count();
            $servicesCount = Service::whereDate('created_at', $date)->count();

            $chartData[] = $articlesCount + $galleriesCount + $servicesCount;
        }

        return view('admin.dashboard', compact(
            'totalServices',
            'totalArticles',
            'totalGalleries',
            'totalMessages',
            'unreadMessagesCount',
            'recentMessages',
            'recentArticles',
            'recentGalleries',
            'recentServices',
            'chartData',
            'days'
        ));
    }
}