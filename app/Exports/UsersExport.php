<?php

namespace App\Exports;

use App\Models\Allocation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithColumnWidths;

class UsersExport implements FromCollection  ,WithHeadings,WithColumnWidths
{
    public function collection()
    {
         $data = Allocation::select('id','flat_id','customers_id')->with('customers')->with('flate')->get();
        $datas = $data->mapWithKeys(function($d ,$index){
          return 
           [
            $index + 1 => [
                $index + 1 ,
            $d->flate->flats_no  ?:'--',
            $d->customers->applicant_name ?:'--',
            $d->customers->co_applicant_name ?:'--',
            $d->customers->mobile_number?:'--',
            $d->customers->category ?:'--',
            $d->customers->application_date ?:'--',
           ] 
            ];
        });
         return $datas;
    }



    public function headings(): array
    {
        return [
            'S.NO',
            'Flat',
            'Applicant Name',
            'Co Applicant',
            'Mobile',
            'Category',
            'Application Date',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 40,
            'D' => 40,
            'E' => 12,
            'F' => 30,
            'G' => 30,          
        ];
    }
}
