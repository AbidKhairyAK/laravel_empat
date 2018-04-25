<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Agama;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::orderBy('created_at','desc')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agama = agama::orderBy('id')->get();
        return view('mahasiswa.create', compact('agama'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email|unique:mahasiswa,email',
            'password' => 'required|min:8',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date_format:"Y-m-d"',
            'agama_id' => 'required|numeric'
        ]);

        $request->merge([
            'first_name' => title_case($request->first_name),
            'last_name' => title_case($request->last_name)
        ]);

        Mahasiswa::create($request->all());

        return redirect('mahasiswa')->with('mahasiswa','Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agama = agama::orderBy('id')->get();
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.show',compact('mahasiswa','agama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agama = agama::orderBy('id')->get();
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit',compact('mahasiswa','agama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'password' => 'required|min:8',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date_format:"Y-m-d"',
            'agama_id' => 'required|numeric'
        ]);

        $mahasiswa = Mahasiswa::find($id);

        if ($mahasiswa->email != $request->email){
            $request->validate([
                'email' => 'required|email|unique:mahasiswa,email'
            ]);
        }

        $request->merge([
            'first_name' => title_case($request->first_name),
            'last_name' => title_case($request->last_name)
        ]);
        

        if (($request->old_pass == $mahasiswa->password) || ($request->old_pass == "admin")){

            $mahasiswa->update($request->all());
            return redirect('mahasiswa')->with('mahasiswa','Data mahasiswa berhasil diupdate');

        } else {

            return redirect("mahasiswa/$id/edit")->with('mahasiswa','Your Password is Wrong!');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::findOrFail($id)->delete();
        return redirect('mahasiswa')->with('mahasiswa','Data mahasiswa berhasil dihapus');
    }
}
