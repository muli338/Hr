<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class LocationModel extends Model
{
    use HasFactory;

    protected $table = 'locations';

    static function getRecord($request){
       // $return = self::select('regions.*')
                // ->orderBy('regions.id', 'desc');

                $return = self::select('locations.*', 'countries.country_name')
                            ->join('countries', 'countries.id', '=', 'locations.countries_id')
                            ->orderBy('id', 'desc');
                 //search box start
                 if(!empty(Request::get('id')))
                 {
                     $return = $return->where('locations.id', '=', Request::get('id'));
                 }
                 if(!empty(Request::get('street_address')))
                    {
                        $return = $return->where('street_address', 'like', '%' .Request::get('street_address'). '%');
                    }
                 
                 if(!empty(Request::get('postal_code')))
                    {
                        $return = $return->where('postal_code', 'like', '%' .Request::get('postal_code'). '%');
                    }
                    if(!empty(Request::get('city')))
                    {
                        $return = $return->where('city', 'like', '%' .Request::get('city'). '%');
                    }
                    if(!empty(Request::get('state_province')))
                    {
                        $return = $return->where('state_province', 'like', '%' .Request::get('state_province'). '%');
                    }
                    if(!empty(Request::get('country_name')))
                    {
                        $return = $return->where('countries.country_name', 'like', '%' .Request::get('country_name'). '%');
                    }
                 //search box end
                 $return = $return->paginate(20);
                 return $return;
    }
    public function get_country_name(){
        return $this->belongsTo(CountriesModel::class, 'countries_id');
     }
}