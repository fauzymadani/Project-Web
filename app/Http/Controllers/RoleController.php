<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        //
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'roles' => 'required',
        ]);
        Role::create([
            'roles' => $request->roles,
        ]);
        return redirect('roles')->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $roles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Role::where('id', $id)->first();
        return view('roles.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'roles' => 'required',
        ]);
        $data = ([
            'roles' => $request->roles,
        ]);
        Role::where('id', $id)->update($data);
        return redirect('roles')->with('success', 'Buku berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Role::where('id', $id)->delete();
        return redirect('roles')->with('success', 'Buku berhasil dihapus!');
    }
}
