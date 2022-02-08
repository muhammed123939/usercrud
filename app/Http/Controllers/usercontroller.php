<?php

namespace App\Http\Controllers;

use App\Models\specialitymodel;
use App\Models\usermodel;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    //function to get specific user data and all specialities to choose one speciality from them in edit form
    public function edit1($id)
    {
        $user=usermodel::find($id);
        $specialities=specialitymodel::get();
        return view ('user.edit',compact('user','specialities'));
    }

    //function to get data from form and update database
    public function edit(Request $request)
    {
        $user=usermodel::find($request->user_id);
        
        if($request->hasFile('photo'))
        {
          $photo = $request->photo->getClientOriginalName(); 
          $user->update([   
          'image'  => $photo 
          ]);
          $request->photo->move(public_path('/uploaded/user/'),$photo);
        }

        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'title'=>$request->title,
            'phonenumber'=>$request->phone,
            'specs_id'=>$request->specs_id
        ]);

        $request->session()->put('successupdate','user updated successively');
        return redirect()->back();

    }
    
    //function to read users data in DB
    public function readvue()
    {
        return  $users=usermodel::get();  

    }
    
    //function to read users data in DB
    public function read()
    {
        $users=usermodel::get();    
        return view('user.index',compact('users'));

    }

    //function to read specialities from DB to use it in create form
    public function showcreate()
    {
        $specialitytype=specialitymodel::get();
        return view ('user.create',compact('specialitytype'));   
    }

    //function to delete specific user    
    public function delete(Request $request)
    {
        $user=usermodel::find($request->user_id);
        $user->delete();
        $request->session()->put('success2','the user deleted successively');
        return redirect()->back();
    }

    //function to creatting new user getting data from form and save it in DB
    public function create( Request $request){
      
        $photo=$request->photo->getClientOriginalName();
        $request->photo->move(public_path('/uploaded/user/'),$photo);
        usermodel::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'title'=>$request->title,
          'specs_id'=>$request->specs_id,
          'phonenumber'=>$request->phone ,
          'image'=>$photo
      ]);
      $request->session()->flash('success','new user inserted successively');
      return redirect()->back();  
    }
}
