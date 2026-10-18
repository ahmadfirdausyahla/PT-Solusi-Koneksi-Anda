<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\CompanyProfile;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $services = Service::where('status', true)->latest()->take(3)->get();
        $articles = Article::where('status', 'published')->latest()->take(2)->get();
        $galleries = Gallery::where('status', 'active')->latest()->take(3)->get();
        $profile = CompanyProfile::first();

        return view('public.home', compact('services', 'articles', 'galleries', 'profile'));
    }

    public function profile(): View
    {
        $profile = CompanyProfile::first();
        return view('public.profile', compact('profile'));
    }

    public function services(): View
    {
        $services = Service::where('status', true)->latest()->paginate(9);
        return view('public.services', compact('services'));
    }

    public function articles(): View
    {
        $articles = Article::where('status', 'published')->latest()->paginate(6);
        return view('public.articles', compact('articles'));
    }

    public function galleries(): View
    {
        $galleries = Gallery::where('status', 'active')->latest()->paginate(9);
        return view('public.galleries', compact('galleries'));
    }

    public function contact(): View
    {
        return view('public.contact');
    }

    public function showService($id): View
    {
        $service = Service::findOrFail($id);
        return view('public.service-show', compact('service'));
    }

    public function showArticle($id): View
    {
        $article = Article::findOrFail($id);
        return view('public.article-show', compact('article'));
    }

    public function showGallery($id): View
    {
        $gallery = Gallery::findOrFail($id);
        return view('public.gallery-show', compact('gallery'));
    }
}