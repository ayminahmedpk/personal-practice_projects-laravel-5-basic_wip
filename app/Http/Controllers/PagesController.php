<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller

{
    function index() {
        $titleSuffix = '';
        return view('pages.index')->with('titleSuffix', $titleSuffix);
    }
    
    function about() {
        $titleSuffix = ' - xAbout';
        return view('pages.about')->with('titleSuffix', $titleSuffix);
    }

    function services() {
        // multiple values
        $data = array(
            'titleSuffix' => ' - _Services',
            'services' => [
                'Web Design',
                'Programming',
                'SEO'
            ]
        );
        return view('pages.services')->with($data);
    }
}
