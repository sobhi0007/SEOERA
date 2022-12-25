<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Admin\EditAdminRequest;
use App\Models\Admin;
use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $admins =  Admin::where('id','!=' , 1)->with('language')->paginate(10);
       return view('admin.admins')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.create')->with('languages',$languages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdminRequest $request)
    {
        $validated = $request->validated();
        $admin =  new Admin;
        $admin->name=  $validated['name'];
        $admin->email=  $validated['email'];
        $admin->password=  bcrypt($validated['password']);
        $admin->lang_id=  $validated['language'];
        $admin->save();
        return redirect('dashboard/admins')->with('msg', 'Admin added successfully');
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
        $admin = Admin::findOrFail($id);
        $languages = Language::all();
        return view('admin.edit', compact('admin'))->with('languages' ,$languages );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditAdminRequest $request, Admin $admin)
    { 
       $validated = $request->validated();
       $password =$request->password;
       if(!empty($password)){
        $request->validate([
            'password' => 'min:6|max:12'
        ]);
       }
       $password = empty($password) ? $admin->password : bcrypt($password);
     
       Admin::where('id', $admin->id)
       ->update([
       'name'=>  $validated['name'],
       'email'=>  $validated['email'],
       'password'=>   $password,
       'lang_id'=>  $validated['language'],
       ]);
   
       return redirect('dashboard/admins')->with('msg', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect('dashboard/admins')->with('msg', 'Admin deleted successfully');
    }
}
