<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|string',
            'password' => 'nullable|string',
            
            
            // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
        ]);
    
        // Simpan tunjangan jika validasi berhasil
        $user = User::create($validatedData);
    
        // Redirect ke halaman yang sesuai setelah berhasil menyimpan
        return redirect()->route('user.index')->with('success', 'User berhasil disimpan.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.update', compact('user'));
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
        $validatedData = $request->validate([

            'name' => 'nullable|string',
            'email' => 'nullable|string', 
            'password' => 'nullable|string', 
                // Tambahkan validasi untuk kolom lainnya sesuai kebutuhan
            ]);
    
            $user = User::findOrFail($id);
    
            // $tunjangan = Tunjangan::update($validatedData);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
    
            ]);
                
            return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui.');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus.');

   
    }
}
