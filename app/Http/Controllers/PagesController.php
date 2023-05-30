<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Storage;

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

    function uploadTest() {
      // return 'upload test page';
      return view('pages.uploadTest');
    }


    function receiveImage(Request $request) {
    
      if ($request->hasFile('cover_image')) {
        
        $fileHandle = $request->file('cover_image');
        $fileContents = $request->get('cover_image');

        $filenameWithExt = $fileHandle->getClientOriginalName();
        $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $fileHandle->getClientOriginalExtension(); 

        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        
        $fileHandle->move(public_path('/images'), $fileNameToStore);

      }
      else {
        return 'no';
      }

    }

}
