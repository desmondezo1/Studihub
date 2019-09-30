<?php
/**
 * Created by PhpStorm.
 * User: pogbewi
 * Date: 9/7/2019
 * Time: 14:20
 */

namespace Studihub\Http\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadTutorPhotoTrait
{

    public function uploadAvatar(Request $request){
        $file = $request->file('file');
        $name = uniqid();
        $fileName = $name.'.'.$file->getClientOriginalExtension();
        if (in_array($file->guessClientExtension(), ['jpeg', 'jpg', 'png', 'gif'])) {
            $thumbpath = 'uploads/tutors/photos/thumbnails/';
            $thumbnail = Image::make($file)
                ->resize(150, 150)
                ->encode($file->getClientOriginalExtension(), 75);

            Storage::disk('public')->put($thumbpath.$fileName, $thumbnail, 'public');

            $path = 'uploads/tutors/photos/';
            $largeImage = Image::make($file)
                ->resize(480, 360)
                ->encode($file->getClientOriginalExtension(), 75);
            Storage::disk('public')->put($path.$fileName, $largeImage, 'public');
            $file = Storage::url($thumbpath . $fileName);
            return response()->json(['success'=>"Upload successfull", 'filename'=>$fileName, 'file'=>$file]);
        }
        return response()->json(['error' => 'error occured, please try again']);
    }

    public function deletePhoto($photo){
        if($photo != ""){
            if(file_exists(storage_path("app/public/uploads/tutors/photos/".$photo))){
                Storage::disk('public')->delete("uploads/tutors/photos/".$photo);
            }
            if(file_exists(storage_path("app/public/uploads/tutors/photos/thumbnails/".$photo))){
                Storage::disk('public')->delete("uploads/tutors/photos/thumbnails/".$photo);
            }
        }
    }
}