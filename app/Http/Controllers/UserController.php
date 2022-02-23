<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    private $indexData = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::latest()->paginate(10);

        $user = auth()->user();
        if(count($user->allChildren) > 0){
            $this->childIndex($user->allChildren); 
        } 
        else
            array_push($this->indexData, $user);
        $users = collect($this->indexData);
        return view("user.index", compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->first();  
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->first();  
        return view('user.edit', compact('user'));
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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'furigana' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postalcode' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$id],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
            'introducer_email' => ['required', 'exists:users,email', 'max:255','different:email'],
        ]);        
        $introduer_user = User::where('email', $request->introducer_email)->first();
        $user = User::where('id',$id);
        $data = $request->except(['_token', 'introducer_email', '_method', 'password_confirmation']);
        $data['introducer_id'] = $introduer_user->id;   
        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where("id", $id)->first();
        if(count($user->allChildren) > 0){
            $this->child($user->allChildren); 
        } 
        $user->delete();
        return redirect()->route('user.index');
    }

    private function child($data) {
        for ($i=0; $i < count($data) ; $i++) {         
            if(count($data[$i]->allChildren) > 0){
                $this->child($data[$i]->allChildren); 
            }        
            $data[$i]->delete();
        }
    }

    public function map() {
        $user = auth()->user();
        return view('map.index', compact('user'));
    }

    private function childIndex($data){
        for ($i=0; $i < count($data) ; $i++) {         
            if(count($data[$i]->allChildren) > 0){
                $this->childIndex($data[$i]->allChildren); 
            }        
            array_push($this->indexData, $data[$i]);
        }
    }
}
