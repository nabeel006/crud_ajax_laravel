<?php
namespace App\Http\Controllers\API;
namespace App\Http\Controllers;
use App\Models\User_Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = new User_Model;
        $user->Name = $request->input('name');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/user/', $filename);
            $user->image = $filename;
        }

        $user->save();
        return redirect()->back()->with('message','User Image Upload Successfully');
    }
}
