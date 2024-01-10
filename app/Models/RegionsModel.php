<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class RegionsModel extends Model
{
    use HasFactory;

    protected $table = 'regions';

    static function getRecord($request){
       // $return = self::select('regions.*')
                // ->orderBy('regions.id', 'desc');

                $return = self::select('regions.*');
                 //search box start
                 if(!empty(Request::get('id')))
                 {
                     $return = $return->where('regions.id', '=', Request::get('id'));
                 }
                 
                 if(!empty(Request::get('region_name')))
                    {
                        $return = $return->where('region_name', 'like', '%' .Request::get('region_name'). '%');
                    }
                 //search box end
                 $return = $return->orderBy('id', 'desc')
                 ->paginate(20);
                   return $return;
    }
}