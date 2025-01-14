<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use Storage;
use App\Models\Image;
  
class WebcamController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('webcam');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $img = $request->image;
        $folderPath = "uploads/";
        
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        
          // Save the image path in the database
        // $image = Image::create([
        //     'path' => $file
        // ]);
        $image = new Image;
        $image->path = $file;
        $image->save();

        return back()->with('success', 'done');
    }
}