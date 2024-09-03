<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class EmployeeController extends Controller
{

    public function AllEmployee(){

        $employee = Employee::latest()->get();
        return view('backend.employee.all_employee',compact('employee'));

    }

    public function AddEmployee(){
        return view('backend.employee.add_employee');
    } 

    public function StoreEmployee(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:employees|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'salary' => 'required|max:200',
            'vacation' => 'required|max:200', 
            'experience' => 'required', 
            'image' => 'required',  
        ],

        [
            'name.required' => 'This Employee Name Field Is Required',
        ]);

        if ($request ->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request ->file('image')->getClientOriginalExtension();
            $img = $manager->read($request ->file('image'));
            $img = $img->resize(300,300);
            $img->toJpeg(80)->save(base_path('public/upload/employee/'.$name_gen));
            $save_url = 'upload/employee/'.$name_gen;

            Employee::insert([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'experience' => $request->experience,
                'salary' => $request->salary,
                'vacation' => $request->vacation,
                'city' => $request->city,
                'image' => $save_url,
                'created_at' => Carbon::now(), 
    
            ]);


        } //end if
    
         $notification = array(
            'message' => 'Employee Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.employee')->with($notification); 
    } // End Method 

    public function EditEmployee($id){

        $employee = Employee::findOrFail($id);
        return view('backend.employee.edit_employee',compact('employee'));

    } // End Method 

    public function UpdateEmployee(Request $request){

        $employee_id = $request->id;
        
                if ($request ->file('image')) {

                    $manager = new ImageManager(new Driver());
                    $name_gen = hexdec(uniqid()).'.'.$request ->file('image')->getClientOriginalExtension();
                    $img = $manager->read($request ->file('image'));
                    $img = $img->resize(300,300);
                    $img->toJpeg(80)->save(base_path('public/upload/employee/'.$name_gen));
                    $save_url = 'upload/employee/'.$name_gen;

                    Employee::findOrFail($employee_id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'experience' => $request->experience,
                        'salary' => $request->salary,
                        'vacation' => $request->vacation,
                        'city' => $request->city,
                        'created_at' => Carbon::now(), 
            
                    ]);

                    $notification = array(
                        'message' => 'Employee Update Successfully',
                        'alert-type' => 'success'
                    );
            
                    return redirect()->route('all.employee')->with($notification); 
            

                } 
                else {

                Employee::findOrFail($employee_id)->update([

                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'experience' => $request->experience,
                    'salary' => $request->salary,
                    'vacation' => $request->vacation,
                    'city' => $request->city,
                    'created_at' => Carbon::now(), 

                ]);

            $notification = array(
                'message' => 'Employee Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.employee')->with($notification); 
        }//end else
    }

    //delete Employee
     public function DeleteEmployee($id){

        $employee_img = Employee::findOrFail($id);
        $img = $employee_img->image;
        unlink($img);

        Employee::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 



}