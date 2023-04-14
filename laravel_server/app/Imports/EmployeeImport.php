<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'Month' => $row['Month'],
            'Date' => $row['Date'],
            'Day' => $row['Day'],
            'ID' => $row['ID'],
            'EmployeeName' => $row['EmployeeName'],
            'Department' => $row['Department'],
            'FirstInTime' => $row['FirstInTime'],
            'LastOutTime' => $row['LastOutTime'],
            'HoursOfWork' => $row['HoursOfWork']
        ]);
    }
}
