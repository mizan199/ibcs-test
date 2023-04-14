<?php

namespace App\Http\API;

use App\Http\Controllers\Controller;
use App\Imports\EmployeeImport;
use App\Models\Employee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query=Employee::query();
        if(!empty($request->emp_id)) {
            $emp_id= $request->emp_id;
            $query->where('EmpID', 'like', '%'.$emp_id.'%');
        }
        $emp_list= $query->get();
        return response()->json(['data'=>$emp_list,'status'=>'success'], 200);
    }
    public function import(Request $request)
    {

        Excel::import(new EmployeeImport(), $request->file('file'));

        return response()->json([
            'message' => 'XL file data has been imported.'
        ], 201);
    }
    public function pdfReport(Request $request)
    {

        if(!empty($request->in_time) && !empty($request->out_time)) {
            $query=Employee::query();
            $times=[];
            $times['in_time']=$request->in_time;
            $times['out_time']=$request->out_time;
            if(!empty($request->emp_id)) {
                $emp_id= $request->emp_id;
                $query->where('EmpID', 'like', '%'.$emp_id.'%');
            }
            $emp_list= $query->get();

            $pdf = PDF::loadView('reports.emloye_list', ['emp_list' => $emp_list,'times'=>$times]);
            return $pdf->download('emloye_list.pdf');
        }
    }
}
