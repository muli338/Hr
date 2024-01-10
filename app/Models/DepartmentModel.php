<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;


class DepartmentModel extends Model
{
    use HasFactory;

    protected $table = 'department';

    static function getRecord($request){
       // $return = self::select('department.*')
                // ->orderBy('department.id', 'desc');

                $return = self::select('department.*');
                 //search box start
                 if(!empty(Request::get('id')))
                 {
                     $return = $return->where('department.id', '=', Request::get('id'));
                 }
                 
                 if(!empty(Request::get('department_name')))
                    {
                        $return = $return->where('department_name', 'like', '%' .Request::get('department_name'). '%');
                    }
                 //search box end
                 $return = $return->orderBy('id', 'desc')
                 ->paginate(20);
                   return $return;
    }
}