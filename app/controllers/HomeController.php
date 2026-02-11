<?php
// app/Controllers/HomeController.php
namespace App\Controllers;

use App\View;

class HomeController
{
    public function index()
    {
        return View::make('home/index')
            ->layout('layouts/main')
            ->with([
                'pageTitle' => 'Selamat Datang',
                'title' => 'Selamat Datang di PHP Router Kami!',
                'message' => 'Ini adalah sistem routing yang bersih dan modern yang dibangun dari nol.',
                'features' => [
                    'Routing URL yang bersih',
                    'Arsitektur MVC',
                    'Template view yang dapat digunakan kembali',
                    'Mudah dipelihara',
                    'Tidak perlu framework'
                ]
            ])
            ->render();
    }

    public function about()
    {
        return View::make('home/about')
            ->layout('layouts/main')
            ->render();
    }
    public function contact()
    {
        return View::make('home/contact')
            ->layout('layouts/main')
            ->render();
    }
}