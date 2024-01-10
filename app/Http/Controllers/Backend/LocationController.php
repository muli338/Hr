<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationModel;
use App\Models\CountriesModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LocationExport;


class LocationController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = LocationModel::getRecord($request);
        return view('backend.location.list', $data);
    }
    public function location_export(Request $request){
        return Excel::download(new LocationExport, 'location.xlsx');
    }
    public function add(Request $request){
        $data['getCountries'] = CountriesModel::get();
        return view('backend.location.add', $data);
    }
    public function add_post(Request $request){
        // dd($request->all());
        $user = request()->validate([
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'state_province' => 'required',
            'countries_id' => 'required',

        ]);
 
        $user = new LocationModel;
        $user->street_address = $request->street_address;
        $user->postal_code = $request->postal_code;
        $user->city = $request->city;
        $user->state_province = $request->state_province;
        $user->countries_id = $request->countries_id;
        $user->save();
 
        return redirect('admin/location')->with('success', 'Location Added Succefully');
 
     }
     public function edit($id){
        $data['getRecord'] = LocationModel::find($id);
        $data['getCountries'] = CountriesModel::get();
        return view('backend.location.edit', $data);
    }
    public function edit_update($id, Request $request){
        $user = LocationModel::find($id);
        $user->street_address = trim($request->street_address );
        $user->postal_code = trim($request->postal_code );
        $user->city = trim($request->city );
        $user->state_province = trim($request->state_province );
        $user->countries_id = trim($request->countries_id);
        $user->save();

        return redirect('admin/location')->with('success', 'Location Succefully Updated');   
    }
    public function delete($id){
        $user = LocationModel::find($id);
        $user->delete();

        return redirect()->back()->with('error', 'Location Deleted Succefully');
    }
}