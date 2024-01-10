<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountriesModel;
use App\Models\RegionsModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CountriesExport;


class CountriesController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = CountriesModel::getRecord($request);
        return view('backend.countries.list', $data);
    }
    public function countries_export(Request $request){
        return Excel::download(new CountriesExport, 'countries.xlsx');
    }
    public function add(Request $request){
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.add', $data);
    }
    public function add_post(Request $request){
        // dd($request->all());
        $user = request()->validate([
            'country_name' => 'required',
            'region_id' => 'required',

        ]);
 
        $user = new CountriesModel;
        $user->country_name = $request->country_name;
        $user->region_id = $request->region_id;
        $user->save();
 
        return redirect('admin/countries')->with('success', 'Countries Added Succefully');
 
     }
     public function edit($id){
        $data['getRecord'] = CountriesModel::find($id);
        $data['getRegions'] = RegionsModel::get();
        return view('backend.countries.edit', $data);
    }
    public function edit_update($id, Request $request){
        $user = CountriesModel::find($id);
        $user->country_name = trim($request->country_name);
        $user->region_id = trim($request->region_id);
        $user->save();

        return redirect('admin/countries')->with('success', 'Country Succefully Updated');
        
    }
    public function delete($id){
        $user = CountriesModel::find($id);
        $user->delete();

        return redirect()->back()->with('error', 'Country Deleted Succefully');
    }
}