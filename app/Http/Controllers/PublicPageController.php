<?php

namespace App\Http\Controllers;

class PublicPageController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function about()
    {
        return view('public.about');
    }

    public function howItWorks()
    {
        return view('public.how-it-works');
    }

    public function pricing()
    {
        return view('public.pricing');
    }

    public function subscribe()
    {
        return view('public.subscribe');
    }

    public function contact()
   {
    return view('public.contact');
   }

   public function privacyPolicy()
  {
    return view('public.privacy-policy');
  }

  public function terms()
 {
    return view('public.terms');
 }

public function faq()
{
    return view('public.faq');
}

public function sitemap()
{
    $urls = [
        url('/'),
        url('/about'),
        url('/how-it-works'),
        url('/pricing'),
        url('/subscribe'),
        url('/contact'),
        url('/privacy-policy'),
        url('/terms'),
        url('/faq'),
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $url) {
        $xml .= '<url>';
        $xml .= '<loc>' . htmlspecialchars($url, ENT_XML1) . '</loc>';
        $xml .= '<lastmod>' . now()->toDateString() . '</lastmod>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200)
        ->header('Content-Type', 'application/xml');
}

}