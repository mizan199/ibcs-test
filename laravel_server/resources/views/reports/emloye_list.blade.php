<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee report</title>
</head>
<body>
    <table>
        <thead>
          <tr>
            <th>Moth </th>
            <th>Date </th>
            <th>Day </th>
            <th>EmpId </th>
            <th>EmployeeName </th>
            <th>Department </th>
            <th>FirstInTime </th>
            <th>LastOutTime </th>
            <th>HoursOfWork </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($employees as $item)
            <tr class="{{ $employee->FirstInTime > $times->in_time ? 'table-danger' : ($employee->LastOutTime < $times->out_time ? 'table-warning' : '') }}">
                <td>{{ item->Month }}</td>
                <td>{{ item->Date }}</td>
                <td>{{ item->Day }}</td>
                <td>{{ item->EmpID }}</td>
                <td>{{ item->EmployeeName }}</td>
                <td>{{ item->Department }}</td>
                <td>{{ item->FirstInTime }}</td>
                <td>{{ item->LastOutTime }}</td>
                <td>{{ item->HoursOfWork }}</td>
               
            </tr>
          @endforeach
        </tbody>
      </table>
      
</body>
</html>