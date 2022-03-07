<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
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
            $lecture->group_link = $data['group_link'];
            $lecture->orginizer_name = $data['orginizer_name'];
            $lecture->profile_orginizer_path = $data['profile_orginizer_path'];

            //test upload photo
            // if(isset($lecture -> profile_photo_path)){
            //     Storage::disk('public') -> delete($lecture -> profile_photo_path);
            // }
            // $filePath = $request -> file('photo') -> store('images/user/', 'public');
            // $lecture -> profile_photo_path = $filePath;

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
