<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //追記

class UsersController extends Controller
{
    //追記
    public function show($id)
    {
       $user = User::findorFail($id); //追記
    //   $books = Book::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')

    //   dd($user); //追記
       
    //   return view('users.show');
       return view('users.show', compact('user')); //変更
    }
    
    // ここから追加
    public function edit($id)
    {
        $user = User::findorFail($id);

        return view('users.edit', compact('user')); 
    }

    public function update(Request $request, $id)
    {

        // $user = User::findorFail($id);
        $user = User::find($request->id);

        // if(!is_null($request['img_name'])){
        //     $imageFile = $request['img_name'];

        //     $list = FileUploadServices::fileUpload($imageFile);
        //     list($extension, $fileNameToStore, $fileData) = $list;
            
        //     $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
        //     $image = Image::make($data_url);        
        //     $image->resize(400,400)->save(storage_path() . '/app/public/images/' . $fileNameToStore );

        //     $user->img_name = $fileNameToStore;
        // }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->doctor_name = $request->doctor_name;
        $user->post_code = $request->post_code;
        $user->clinic_address = $request->clinic_address;
        $user->clinic_phone_number = $request->clinic_phone_number;
        $user->main_photo = $request->main_photo;
        $user->tagline = $request->tagline;
        $user->clinic_pr = $request->clinic_pr;
        $user->doctor_profile = $request->doctor_profile;
        $user->doctor_photo = $request->doctor_photo;
        $user->doctor_number = $request->doctor_number;
        $user->staff_number = $request->staff_number;
        $user->personnel_details = $request->personnel_details;
        $user->clinic_url = $request->clinic_url;
        $user->clinic_category = $request->clinic_category;
        $user->clinic_treatment = $request->clinic_treatment;
        $user->clinic_features = $request->clinic_features;
        $user->disease_name = $request->disease_name;
        $user->conference = $request->conference;
        $user->open_date = $request->open_date;
        $user->sub_photo = $request->sub_photo;
 
        $user->save();

        // return redirect('/'); 
        return redirect()->to('/users/show/'.$user->id); 
    }
}
