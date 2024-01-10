<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use App\Models\DepartmentModel;

class EmployeesController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = User::getRecord();
        return view('backend.employees.list', $data);
    }
    public function add(Request $request){
        $data['getJobs'] = JobsModel::get();
        $data['getDepartment'] = DepartmentModel::get();
        return view('backend.employees.add', $data);
    }
    public function add_post(Request $request){
       // dd($request->all());
       $user = request()->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'hire_date' => 'required',
        'job_id' => 'required',
        'salary' => 'required',
        'commission_pct' => 'required',
        'manager_id' => 'required',
        'department_id' => 'required',
       ]);

       $user   = new User;
       $user->name  =trim($request->name);
       $user->last_name = trim($request->last_name);
       $user->email = trim($request->email);
       $user->phone_number = trim($request->phone_number);
       $user->hire_date = trim($request->hire_date);
       $user->job_id = trim($request->job_id);
       $user->salary = trim($request->salary);
       $user->commission_pct = trim($request->commission_pct);
       $user->manager_id = trim($request->manager_id);
       $user->department_id = trim($request->department_id);
       $user->is_role = 0; //Employees
       $user->save();
       return redirect('admin/employees')->with('success', 'Employee successfully registered');
    }

    public function view($id){
        $data['getRecord'] = User::find($id);
        return view('backend.employees.view',$data);
    }
    public function edit($id){
        $data['getRecord'] = User::find($id);
        $data['getJobs'] = JobsModel::get();
        return view('backend.employees.edit', $data);
    }
    public function edit_update($id, Request $request){
        $user = request()->validate([
        'email' => 'required|unique:users,email,'.$id
        ]);

        $user = User::find($id);
        $user->name  =trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->hire_date = trim($request->hire_date);
        $user->job_id = trim($request->job_id);
        $user->salary = trim($request->salary);
        $user->commission_pct = trim($request->commission_pct);
        $user->manager_id = trim($request->manager_id);
        $user->department_id = trim($request->department_id);
        $user->is_role = 0; //Employees
        $user->save();
        return redirect('admin/employees')->with('success', 'Employee details updated successfully');
    }
    public function delete($id){
        $recordDelete = User::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Employee deleted succefully');
    }
}

?>