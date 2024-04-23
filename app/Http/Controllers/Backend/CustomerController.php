<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CustomerController extends Controller
{
    public function AllCustomer(){

        $customer = Customer::latest()->get();
        return view('backend.customer.all_customer',compact('customer'));

    }
    //end of function
    public function AddCustomer(){
        return view('backend.customer.add_customer');
    }
    //end of function

    //store Customers
    public function StoreCustomer(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:customers|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'shopname' => 'required|max:200',
            'account_holder' => 'required|max:200', 
            'account_number' => 'required|max:200', 
            'bank_name' => 'required|max:200', 
            'bank_branch'=> 'required|max:200', 
            'city' => 'required', 
            'image' => 'required',  
        ],

        [
            'name.required' => 'This Customer Name Field Is Required',
        ]);

        if ($request ->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request ->file('image')->getClientOriginalExtension();
            $img = $manager->read($request ->file('image'));
            $img = $img->resize(300,300);
            $img->toJpeg(80)->save(base_path('public/upload/customer/'.$name_gen));
            $save_url = 'upload/customer/'.$name_gen;

            Customer::insert([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'shopname' => $request->shopname,
                'account_holder' => $request->account_holder,
                'account_number' => $request->account_number,
                'bank_name' => $request->bank_name,
                'bank_branch' => $request->bank_branch,
                'city' => $request->city,
                'image' => $save_url,
                'created_at' => Carbon::now(), 
    
            ]);


        } //end if
    
         $notification = array(
            'message' => 'Customer Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.customer')->with($notification); 
    } // End Method 

    public function EditCustomer($id){

        $customer = Customer::findOrFail($id);
        return view('backend.customer.edit_customer',compact('customer'));

    } // End Method 

    //update Customer

    public function UpdateCustomer(Request $request){

        $customer_id = $request->id;
        
                if ($request ->file('image')) {

                    $manager = new ImageManager(new Driver());
                    $name_gen = hexdec(uniqid()).'.'.$request ->file('image')->getClientOriginalExtension();
                    $img = $manager->read($request ->file('image'));
                    $img = $img->resize(300,300);
                    $img->toJpeg(80)->save(base_path('public/upload/customer/'.$name_gen));
                    $save_url = 'upload/customer/'.$name_gen;

                    Customer::findOrFail($customer_id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'shopname' => $request->shopname,
                        'account_holder' => $request->account_holder,
                        'account_number' => $request->account_number,
                        'bank_name' => $request->bank_name,
                        'bank_branch' => $request->bank_branch,
                        'city' => $request->city,
                        'image' => $save_url,
                        'created_at' => Carbon::now(), 
            
                    ]);

                    $notification = array(
                        'message' => 'Customer Update Successfully',
                        'alert-type' => 'success'
                    );
            
                    return redirect()->route('all.customer')->with($notification); 
            

                } 
                else {

                Customer::findOrFail($customer_id)->update([

                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'shopname' => $request->shopname,
                    'account_holder' => $request->account_holder,
                    'account_number' => $request->account_number,
                    'bank_name' => $request->bank_name,
                    'bank_branch' => $request->bank_branch,
                    'city' => $request->city,
                    'created_at' => Carbon::now(), 

                ]);

            $notification = array(
                'message' => 'Customer Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.customer')->with($notification); 
        }//end else
    }

    //delete Customer

    public function DeleteCustomer($id){

        $customer_img = Customer::findOrFail($id);
        $img = $customer_img->image;
        unlink($img);

        Customer::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Customer Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 


}
