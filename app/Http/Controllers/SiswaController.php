<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Siswa;
use Auth;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari'))
        {
            $siswa = Siswa::where('nama_siswa','LIKE','%'.$request->cari.'%')->get();
            return view('siswa/index', compact('siswa','cari'));
        }
        else
        {
            $siswa = Siswa::all();
            return view('siswa/index', compact('siswa'));
        }
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($request->only('email','password')))
        {
            return redirect('/siswa');
        }
        return redirect('/');
    }

    public function create()
    {
        return view('siswa/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa'    => 'required',
            'jenis_kelamin' => 'required',
            // 'foto'          => 'mimes:jpg,png',
        ]);


        /* PHP Artisan Tinker */
        /* Save Data to Table User */

        // $user                   = new \App\User;
        // $user->id               = $request->id;
        // $user->name             = $request->nama_siswa;
        // $user->role             = ("siswa");
        // $user->email            = str_random(5).("@gmail.com");
        // $user->password         = bcrypt("user");
        // $user->remember_token   = str_random(50);
        // $user->save();
        
        /* Save Data to Table Siswa */
        $siswa = Siswa::create($request->all());

        /* Save Image to Table Siswa */
        if($request->hasFile('foto'))
        {
            $request->file('foto')->move('foto/',$request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('siswa')->with('sukses', 'Data siswa ' . $request->nama_siswa . ' berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        //
    }

    public function edit(Siswa $siswa)
    {
        // $siswa = Siswa::find($id);
        return view('siswa/edit', compact('siswa'));
    }

    public function nilai($id)
    {
        // Curl
        $url = 'https://api.kawalcorona.com/indonesia';

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: f587623248129bd4654ffecf28357279"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $tes = json_decode($response, TRUE);
            echo $tes;
        }


        // $siswa = Siswa::find($id);
        // return view('siswa/nilai', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());
        if($request->hasFile('foto'))
        {
            $request->file('foto')->move('foto/',$request->file('foto')->getClientOriginalName());
            $siswa->foto = $request->file('foto')->getClientOriginalName();
            $siswa->save();
        }

        return redirect('siswa')->with('sukses', 'Data siswa ' . $request->nama_siswa . ' berhasil diubah.');
    }

    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);
        return redirect('siswa')->with('sukses', 'Data siswa ' . $siswa->nama_siswa . ' berhasil dihapus.');
    }
}
