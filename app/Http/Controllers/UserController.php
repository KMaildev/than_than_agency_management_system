<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query();
        if (request('search')) {
            $users->where('name', 'Like', '%' . request('search') . '%');
        }
        $users = $users->orderBy('id', 'ASC')->get();
        return view('user.index', compact('users'));
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
    public function store(StoreUser $request)
    {
        if ($request->hasFile('passport_photo')) {
            $passport_photo = $request->file('passport_photo');
            $path = $passport_photo->store('public/images');
        }

        $employee = new User();
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->nrc_number = $request->nrc_number;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->password = Hash::make($request->password);
        $employee->join_date = $request->join_date;
        $employee->passport_photo = $path ?? '';
        $employee->save();
        return redirect()->back()->with('success', 'Employee is successfully created.');
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
        $employee = User::findOrFail($id);
        return view('user.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        if ($request->hasFile('passport_photo')) {
            $passport_photo = $request->file('passport_photo');
            $path = $passport_photo->store('public/images');
        }

        $employee = User::findOrFail($id);
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->nrc_number = $request->nrc_number;
        $employee->gender = $request->gender;
        $employee->address = $request->address;
        $employee->password = $request->password ? Hash::make($request->password) : $employee->password;
        $employee->join_date = $request->join_date;
        $employee->passport_photo = $path ?? $employee->passport_photo;
        $employee->update();
        return redirect()->back()->with('success', 'Employee is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
