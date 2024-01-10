<?php
namespace App\Exports;
use App\Model\LocationModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class LocationExport implements FromCollection, ShouldAutoSize, WithMapping,
        WithHeadings{
            public function collection(){
                $request = Request::all();
                return LocationModel::getRecord($request);
            }
            protected $index = 0;

            public function map($user):array{
                $CreateAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
                $UpdateAtFormat = date('d-m-Y H:i A', strtotime($user->updated_at));
                return[
                    ++$this->index,
                    $user->id,
                    $user->street_address,
                    $user->postal_code,
                    $user->city,
                    $user->state_province,
                    $user->country_name,
                    $CreateAtFormat,
                    $UpdateAtFormat
                ];
            }

            public function headings():array{
                return[
                'S.No',
                'Table ID',
                'Street Address',
                'Postal Code',
                'City',
                'State Province',
                'Country Name',
                'Created At',
                'Updated At'
                
                
                ];
            }
        }