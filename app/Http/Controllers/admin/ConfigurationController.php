<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Configuration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=configuration::all();
        return view('pages.admin.confi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.confi.addconfi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
        $request->validate(['conf_key'=>'required','conf_value'=>'required','status'=>'required']);
        $res=new configuration;
        $res->conf_key=$request->input('conf_key');
        $res->conf_value=$request->input('conf_value');
        $res->status=$request->input('status');
        $res->created_by=$userId;
        $res->modified_by=$userId;
        $res->save();
        $request->session()->flash('success','Configuration Added');
        return redirect('configuration');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function show(configuration $configuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=configuration::find($id);
        return view('pages.admin.confi.editconfi',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
       
        $request->validate(['conf_key'=>'required','conf_value'=>'required','status'=>'required']);
        $data=configuration::find($id);
        $userId = Auth::id();
        $data->conf_key=$request->input('conf_key');
        $data->conf_value=$request->input('conf_value');
        $data->status=$request->input('status');
        $data->modified_by=$userId;
        $data->save();
        $request->session()->flash('success','Configuration Updated');
        return redirect('configuration');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\configuration  $configuration
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        configuration::destroy(array('id',$id));
        return redirect('configuration')->with(session()->flash('error','Configuration Deleted'));
    }
}
