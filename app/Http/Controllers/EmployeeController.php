<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Employee;
use App\Exports\DataExport;
use App\Imports\DataImport;
use App\Models\studentdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{


    public function uploadData(Request $request)
    {
        $request->validate([
            'file' => 'required| mimes:xls,xlsx'
        ]);
        $file = new File;
        $file->name = $request->file->getClientOriginalName();
        $file->save();
        Excel::import(new  DataImport($file->id), $request->file,);
        return redirect(route('show.index'))->with('success', 'Excel Data Imported successfully.');
    }

    public function showFiles()
    {
        $file = File::all();
        return view('import_excel', compact('file'));
    }



    public function showFileData($id, $perPage = 10)
    {
        $data = studentdata::where('file_id', $id)->orderBy('id')->paginate($perPage);
        $data->withPath('/file/' . $id . '/perpage=' . $perPage);
        $file = File::where('id', $id)->value('name');
        return view('filedata', ['data' => $data, 'file' => $file]);;
    }

    public function deleteData($id){
        File::find($id)->delete();
        return redirect(route('show.index'))->with('destroy', 'Excel Data Deleted successfully.');

    }

}
