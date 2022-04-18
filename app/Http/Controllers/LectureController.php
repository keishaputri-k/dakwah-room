<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LectureController extends Controller
{
    public function readLectureAll(){
        return Lecture::all();
    }
    public function readLecture($id){
        return Lecture::findOrFail($id);
    }
    public function createLecture(Request $request){
        $data = $request->all();

        try{
            $lecture = new Lecture();
            $lecture->name = $data['name'];
            $lecture->description = $data['description'];
            $lecture->type = $data['type'];
            $lecture->category = $data['category'];
            $lecture->lecturer = $data['lecturer'];
            $lecture->date = $data['date'];
            $lecture->time = $data['time'];
            $lecture->cp = $data['cp'];
            $lecture->location = $data['location'];
            $lecture->city = $data['city']; 
            $lecture->quota = $data['quota'];
            $lecture->poster_photo_path = $data['poster_photo_path'];
            $lecture->form_link = $data['form_link'];
            $lecture->group_link = $data['group_link'];
            $lecture->orginizer_name = $data['orginizer_name'];
    

            //jika ada file sebelumnya maka hapus dulu
            if($image = $request ->file('image')){
                foreach($request->fileName as $mediaFiles) {
                    $path = $mediaFiles->store('public/images');
                    $poster_photo_path = date('YmdHi') . "." . $image -> getClientOriginalExtension();
                    $request->file('poster_photo_path')->move(public_path($path), $poster_photo_path);
                    $data['image'] = "$poster_photo_path";
                    $lecture->path = $path;
                }
            }


            $lecture->save();
            $status = "success";
            return response()->json(compact('status', 'lecture'),200);
        }catch(\Throwable $th){
            $status = 'failed';
            return response()->json(compact('status', 'th'),401);

        }
    }
    public function deleteLecture($id){
        $lecture = Lecture::findOrFail($id);
        $lecture -> delete();

        $status = "delete status";
        return response()->json(compact('status'),200);
    }
}
