<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon; //for date conversion


class EmployeeController extends Controller
{
    public function handleAction($action)
    {
        // Here, you can write logic to handle any action, such as rendering specific views like create.blade.php, edit.blade.php, show.blade.php
        return view("employees.$action");
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$employees = Employee::latest()->paginate(4);
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    
        //var_dump($employees);die;

       // echo "<pre>";
        //print_r($employees);die;
        // echo "EMployes";
        //return view('employees.index');
       
        return view('employees.index', compact('employees'))->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        ///$designation = ['Boss', 'Senior', 'Junior', 'Internee'];
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           
        ]);

       
        $data = new Employee;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $imageName = '';
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }
        //$joiningDate = $request->input('joining_date');

        // Convert the date to the 'Y-m-d' format
       // $formattedJoiningDate = Carbon::parse($joiningDate)->format('Y-m-d');

        //$data->joining_date = $formattedJoiningDate;
        $data->image = $imageName;
        $data->save();
        return redirect()->route('employees.index')->with('success', 'Employees has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }
    public function profile($id)
    {
        $employee=Employee::find($id);
        return view('employees.profile', compact('employee'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee=Employee::find($id);
        return view('employees.edit', compact('employee'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        

        $employee = Employee::find($id);
        $employee->Name = $request->input('name');
        $employee->Email = $request->input('email');
        $employee->Phone = $request->input('phone');
        
        $imageName = '';
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $employee->Image = $imageName;
        }

      
        $employee->update();
        //dd("{{$employee}}");
    
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    
    
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->back()->with('status','Student Deleted Successfully');
    }

    public function downloadImage($id)
    {

        $getImage = Employee::findOrFail($id);
        $file=public_path('uploads/'.$getImage->Image);
       return response()->download($file);

      
    }
}
