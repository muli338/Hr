<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepartmentModel;



class DepartmentController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = DepartmentModel::getRecord($request);
        return view('backend.department.list', $data);
    }
    public function add(Request $request){
        return view('backend.department.add');
    }
    public function add_post(Request $request){
        // dd($request->all());
        $user = request()->validate([
         'department_name' => 'required',

        ]);
 
        $user = new DepartmentModel;
        $user->department_name = trim($request->department_name);
        $user->save();
 
        return redirect('admin/departments')->with('success', 'Department Added Succefully');
     }
     public function edit($id){
        $data['getRecord'] = DepartmentModel::find($id);
        return view('backend.department.edit', $data);
    }
    public function edit_update($id, Request $request){
        $user = DepartmentModel::find($id);
        $user->department_name = trim($request->department_name);
        $user->save();

        return redirect('admin/departments')->with('success', 'Department Succefully Updated');
        
    }
    public function delete($id){
        $user = DepartmentModel::find($id);
        $user->delete();

        return redirect()->back()->with('error', 'Department Deleted Succefully');
    }
}