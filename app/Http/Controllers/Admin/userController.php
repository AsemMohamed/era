<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\UserDatatable;
use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(userDatatable $user)
    {
        $users = User::latest()->paginate(5);
        return view('admin.users.index', compact('users'))->with('i', (request()->input('page',1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('users.create', compact('users'));
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
            'name'       => 'required',
            'email'      => 'required',
            'phone'      => 'required|numeric|min:8|max:11',
            'password'   =>  'required'
        ]);

        $form_data = array(

            'name'          => request('name'),
            'email'         => request('email'),
            'phone'         => request('phone'),
            'password'      => request('password'),

        );

        User::create($form_data);

        return redirect('users.create')->with('success', 'Data Added successfully.');
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
        $title = trans('admin.edit');
        return view('admin.users.edit',compact('user','title'));
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
        $data = $this->validate(request(),
            [
                'name'      =>'required',
                'level'      =>'required|in:user,company,vendor',
                'email'     =>'required|email|unique:admins,email,'.$id,
                'password'  =>'sometimes|nullable|min:6',
            ],[],
            [
                'name'        =>trans('admin.name'),
                'level'        =>trans('admin.level'),
                'email'       =>trans('admin.email'),
                'password'    =>trans('admin.password'),
            ]);
        if(request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }
        User::where('id', $id)->update($data);
        session()->flash('success',trans('admin.record_updated'));
        return redirect(aurl('admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('users'));
    }
    public function multi_delete()
    {
        if(is_array(request('item')))
        {
            User::destroy(request('item'));
        } else {
            User::findOrFail(request('item'))->delete();
        }
        session()->flash('success',trans('admin.record_deleted'));
        return redirect(aurl('users'));
    }
}