<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
{
    $xmlContent = file_get_contents(public_path('sitemap.xml'));

    return response($xmlContent, 200)
           ->header('Content-Type', 'application/xml');
}
    // public function index()
    // {
    //     return response()->file(public_path('sitemap.xml'));
    // }
}
