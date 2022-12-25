<?php

namespace App\Http\Controllers\Dashboard;
use  App\Models\Language;
use  App\Http\Requests\Language\CreatelanguageRequest;
use  App\Http\Requests\Language\EditlanguageRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
class languageController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $languages =  Language::paginate(10);
       return view('language.languages')->with('languages', $languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $languages = Language::all();
        return view('language.create')->with('languages',$languages);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatelanguageRequest $request)
    {
       $data = $request->validated();

       $language = new language;

       $language->title =  $data['title'];
       $language->slogan =  $data['slogan'];

       if($request->hasFile('image')){
        $file = $request->file('image');
        $ext = $file ->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $path = 'uploads/language/';
        $file->move($path,$fileName);
        $language->image =  $path.$fileName;
       }

       $language->save();

       return  redirect('dashboard/languages')
       ->with('msg','New language created successfully ! ') ;
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
    public function edit(language $language)
    {
      $languages= Language::all();
       return view('language.edit' , compact('language'))->with('languages',$languages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditlanguageRequest $request, $id)
    {
       $data = $request->validated();
       
       $language =  Language::findOrFail($id);

       $language->title =  $data['title'];
       $language->slogan =  $data['slogan'];

       if($request->hasFile('image')){
        $path =  $language->image;
        if(File::exists($path))File::delete($path);
        $file = $request->file('image');
        $ext = $file ->getClientOriginalExtension();
        $fileName = time().'.'.$ext;
        $path = 'uploads/language/';
        $file->move($path,$fileName);
        $language->image =  $path.$fileName;
       }
       $language->update();
       return  redirect('dashboard/languages')
       ->with('msg','language updated successfully ! ');
    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(language $language)
    {
      $path =  $language->image;
      if(File::exists($path))File::delete($path);
      $language->delete();
      return  redirect('dashboard/languages')
      ->with('msg','language deleted successfully ! ');
   
    }
}
