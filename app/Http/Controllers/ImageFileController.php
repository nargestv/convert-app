<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Imports\PricesImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ImageFileController extends Controller
{
    public function index()
    {
        return view('image');
    }
 
    public function import(Request $request) 
    {
       $files = Excel::toArray(new PricesImport, $request->file('file'));
       foreach($files as $import_file) {
            $description[] = $import_file[0];
            $header[] = $import_file[1];
            if(count($import_file) > 3)
                $file_details[] = array_slice($import_file, 3);  
       } 
       $pathToImage = public_path('/uploads').'/example.pdf';
       $save_to_file = storage_path('pdfs/file.pdf');
       ob_clean();
flush();
       Browsershot::html('<h1>Hello world!!</h1>')->save('example.pdf');

    //    $browsershot = new \Spatie\Browsershot\Browsershot();
    //    $browsershot
    //        ->setURL('http://127.0.0.1:8000/file-import')
    //        ->save($save_to_file);

            return view('image-cells', compact('files','file_details', 'header', 'description'));
    }

    public function htmlToImage(Request $request)
    {
        $html = "<div class='ping'>Pong ✅</div>";
$css = ".ping { padding: 20px; font-family: 'sans-serif'; }";

$client = new \GuzzleHttp\Client();
// Retrieve your user_id and api_key from https://htmlcsstoimage.com/dashboard
$res = $client->request('POST', 'https://hcti.io/v1/image', [
  'auth' => ['0fc451c9-7fd4-4c24-a56b-cc5d53e722de', '349a38fb-98de-4188-b9d1-6a012dbc5254'],
  'form_params' => ['html' => $html, 'css' => $css]
]);

echo $res->getBody();
    }
    public function imageFileUpload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:4096',
        ]);
        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        $imgFile = Image::make($image->getRealPath());
        $imgFile->text('© 2016-2020 positronX.io - All Rights Reserved', 120, 100, function($font) { 
            $font->size(35);  
            $font->color('#ffffff');  
            $font->align('center');  
            $font->valign('bottom');  
            $font->angle(90);  
        })->save(public_path('/uploads').'/'.$input['file']);          
        return back()
        	->with('success','File successfully uploaded.')
        	->with('fileName',$input['file']);         
    }

    public function convertHtmlToImage(Request $request){

        $this->validate($request, [
            'file' => 'required|mimes:xlsx, csv, xls|max:4096',
        ]);
        $files = [];
        $files_import = Excel::toArray(new PricesImport, $request->file('file'));
        foreach($files_import as $key=> $import_file) {
            $description[$key] = to_persian_numbers($import_file[0][0]);
            $header[] = $import_file[1];
            if(count($import_file) > 3 ){
                $file_details[] = array_slice($import_file, 3);  
            }
            unset($import_file[0]);
            $files[] = $import_file;
        }
        return view('images', compact('files','file_details', 'header', 'description'));
    }
}
