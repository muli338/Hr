<?php
namespace App\Exports;
use App\Model\JobsModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Request;

class JobsExport implements FromCollection, ShouldAutoSize,WithMapping, WithHeadings
{
    public function collection(){
        $request = Request::all();
        return JobHistoryModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user):array{
        $startDate = date('d-m-Y', strtotime($user->start_date));
        $endDate = date('d-m-Y', strtotime($user->end_date));
        $createdAtFormat = date('d-m-Y H:i A', strtotime($user->created_at));
        if($user->department_id == 1){
            $department = 'Mark Gomez';
        }else
        {
            $department = 'God Bless';
        }
        return[
            $user->id,
            $user->name . ' ' . $user->last_name,
            $startDate,
            $endDate,
            $user->job_title,
            $department,
            $createdAtFormat
        ];
    }

    public function headings():array{
        return[
            'Table ID',
            'Employee Name',
            'Start_Date',
            'End Date',
            'Job Title',
            'Department ID',
            'Created At'
        ];
    }
}