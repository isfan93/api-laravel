<?php

namespace App\Http\Controllers\API;

use App\Models\Mahasiswa;
use App\Helper\ApiFormater;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;
use Exception;



class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();

        if ($data) {
            return ApiFormater::createApi(200, 'Success', $data);
        } else {
            return ApiFormater::createApi(400, 'Failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required'
            ]);

            $mahasiswa = Mahasiswa::create([
                'nama' => $request->nama,
                'alamat' => $request->alamat
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if ($data) {
                return ApiFormater::createApi(200, 'Success', $data);
            } else {
                return ApiFormater::createApi(400, 'Failed1');
            }
        } catch (Exception $error) {
            return ApiFormater::createApi(400, 'Failed2');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormater::createApi(200, 'Success', $data);
        } else {
            return ApiFormater::createApi(400, 'Failed1');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required'
            ]);

            $mahasiswa = Mahasiswa::findOrfail($id);

            $mahasiswa->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat
            ]);

            $data = Mahasiswa::where('id', '=', $mahasiswa->id)->get();

            if ($data) {
                return ApiFormater::createApi(200, 'Success', $data);
            } else {
                return ApiFormater::createApi(400, 'Failed1');
            }
        } catch (Exception $error) {
            return ApiFormater::createApi(400, 'Failed2');
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
        $mahasiswa = Mahasiswa::findOrfail($id);
        $data = $mahasiswa->delete();

        if ($data) {
            return ApiFormater::createApi(200, 'Success Destroy Data');
        } else {
            return ApiFormater::createApi(400, 'Failed');
        }
    }
}
