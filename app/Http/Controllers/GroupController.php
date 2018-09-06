<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Group;
use App\Program;

class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $path;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->path = 'images/group/';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.group.create');
    }

    public function store(Request $request){
        $group = new Group;
        $group->name = $request->name;
        $group->detail = $request->detail;
        $group->save();
        return redirect('group');
    }

    public function edit($id)
    {
        //
        $group = Group::find($id);
        if (empty($group))
            return redirect()->back();
        $data['group'] = $group;
        return view('admin.group.create', compact('data'));
    }

    public function update(Request $request, $id)
    {
        //
        $group = Group::find($id);
        if (empty($group))
            return redirect()->back();

        $group->name = $request->name;
        $group->detail = $request->detail;
        $group->save();
        return redirect('group');
    }

    public function destroy($id){
        Group::where('id', $id)->delete();
        session()->put('toast', ['success', 'item deleted']);
        return redirect()->back();
    }
}
