<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class EmployeeController extends Controller
{
    public function index(Request $request)
    {

        if($request->has('search'))
        {
            $data=Employee::where('nama', 'LIKE', '%' .$request->search. '%')->paginate(5);
        }else
        {
            $data=Employee::paginate(5);
        }
        return view('dataPegawai', compact('data'));
    }

    public function tambahPegawai()
    {
        return view('tambah_data_pegawai');
    }

    public function tambahAksi(Request $request)
    {


        $data = Employee::create($request->all());
        if($request->hasFile('img'))
        {
            $request->file('img')->move('img_pegawai/', $request->file('img')->getClientOriginalName());
            $data->img=$request->file('img')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Ditambahkan');
    }

    public function edit($id)
    {
        $data=Employee::find($id);
        return view('edit_data_pegawai', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data=Employee::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Diubah');
    }

    public function delete($id){

        $data=Employee::find($id);
        if($data->img=$data->id)
        {
            Storage::delete($data->img);
        }
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Dihapus');
    }

    public function exportPDF()
    {
        $data=Employee::all();

        view()->share('data', $data);
        $pdf=PDF::loadview('dataPegawai-pdf');
        return $pdf->download('data.pdf');

    }

    public function exportExcel()
    {
        return Excel::download(new EmployeeExport, 'dataPegawai.xlsx');
    }

    public function importExcel(Request $request)
    {
        $data= $request->file('file');

        $namaFile=$data->getClientOriginalName();
        $data->move('EmployeeData', $namaFile);

        Excel::import(new EmployeeImport, \public_path('/EmployeeData/'. $namaFile));
        return redirect()->route('pegawai')->with('success', 'Diimport');
    }
}
