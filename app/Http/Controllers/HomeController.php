<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the landing page with services list.
     */
    public function index()
    {
        $jsonPath = storage_path('app/data/services.json');
        
        $servicesData = [];
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $servicesData = json_decode($jsonContent, true);
        }

        return view('home.index', [
            'categories' => $servicesData['categories'] ?? []
        ]);
    }
}
