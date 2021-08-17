<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Session;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        if ($request->has('cari')) {
            $employee = Employee::where('nama', 'LIKE', '%' . $request->cari . '%')->get();
        } else {

            $employee = Employee::all();
        }
        return view('employees.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required',
        ]);

        Employee::create($request->all());

        return redirect('/employees')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('employees.index', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $request->validate([
            'nama' => 'required',
        ]);

        Employee::where('id', $employee->id)
            ->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'umur' => $request->umur,
                'email' => $request->email,
                'alamat' => $request->alamat
            ]);
        return redirect('/employees')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        Employee::destroy($employee->id);
        return redirect('/employees')->with('status', 'Data Berhasil Dihapus');
        return $employee;
    }

    function export()
    {
        return Excel::download(new EmployeeExport, 'pegawai.xlsx');
    }

    public function import(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa', $nama_file);

        // import data
        Excel::import(new EmployeeImport, public_path('/file_siswa/' . $nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Pegawai Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/employees');
    }

    public function about()
    {
        return view('about', ['nama' => 'Hanan Iqbal Alrahma']);
    }

    public function home()
    {
        return view('index');
    }
}
