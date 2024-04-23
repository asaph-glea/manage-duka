<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SupplierController extends Controller
{
    //show Supplier
    public function AllSupplier(){
        $supplier = Supplier::latest()->get();
        return view('backend.supplier.all_supplier',compact('supplier'));
    }//end function

    //add supplier
    public function AddSupplier(){
        return view('backend.supplier.add_supplier');
    }//end function

    //store Suppliers
    public function StoreSupplier(Request $request){

        $validateData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|unique:suppliers|max:200',
            'phone' => 'required|max:200',
            'address' => 'required|max:400',
            'shopname' => 'required|max:200',
            'type' => 'required|max:200',
            'account_holder' => 'required|max:200', 
            'account_number' => 'required|max:200', 
            'bank_name' => 'required|max:200', 
            'bank_branch'=> 'required|max:200', 
            'city' => 'required', 
            'image' => 'required',  
        ],

        [
            'name.required' => 'This Supplier Name Field Is Required',
        ]);

        if ($request ->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request ->file('image')->getClientOriginalExtension();
            $img = $manager->read($request ->file('image'));
            $img = $img->resize(300,300);
            $img->toJpeg(80)->save(base_path('public/upload/supplier/'.$name_gen));
            $save_url = 'upload/supplier/'.$name_gen;

           Supplier::insert([

                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'shopname' => $request->shopname,
                'type' => $request->type,
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
            'message' => 'Supplier Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.supplier')->with($notification); 
    } // End Method 

    //edit 
    public function EditSupplier($id){

        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.edit_supplier',compact('supplier'));

    } // End Method 

    //update Supplier

    public function UpdateSupplier(Request $request){

        $supplier_id = $request->id;
        
                if ($request ->file('image')) {

                    $manager = new ImageManager(new Driver());
                    $name_gen = hexdec(uniqid()).'.'.$request ->file('image')->getClientOriginalExtension();
                    $img = $manager->read($request ->file('image'));
                    $img = $img->resize(300,300);
                    $img->toJpeg(80)->save(base_path('public/upload/supplier/'.$name_gen));
                    $save_url = 'upload/supplier/'.$name_gen;

                    Supplier::findOrFail($supplier_id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'shopname' => $request->shopname,
                        'type' => $request->type,
                        'account_holder' => $request->account_holder,
                        'account_number' => $request->account_number,
                        'bank_name' => $request->bank_name,
                        'bank_branch' => $request->bank_branch,
                        'city' => $request->city,
                        'image' => $save_url,
                        'created_at' => Carbon::now(), 
            
                    ]);

                    $notification = array(
                        'message' => 'Supplier Update Successfully',
                        'alert-type' => 'success'
                    );
            
                    return redirect()->route('all.supplier')->with($notification); 
            

                } 
                else {

                    Supplier::findOrFail($supplier_id)->update([

                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'shopname' => $request->shopname,
                    'type' => $request->type,
                    'account_holder' => $request->account_holder,
                    'account_number' => $request->account_number,
                    'bank_name' => $request->bank_name,
                    'bank_branch' => $request->bank_branch,
                    'city' => $request->city,
                    'created_at' => Carbon::now(), 

                ]);

            $notification = array(
                'message' => 'Supplier Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.supplier')->with($notification); 
        }//end else
    }

    //delete supplier

    public function DeleteSupplier($id){

        $supplier_img = Supplier::findOrFail($id);
        $img = $supplier_img->image;
        unlink($img);

        Supplier::findOrFail($id)->delete();

        $notification = array(
            'message' => 'supplier Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 

     //edit 
     public function DetailsSupplier($id){

        $supplier = Supplier::findOrFail($id);
        return view('backend.supplier.details_supplier',compact('supplier'));

    } // End Method 
}
