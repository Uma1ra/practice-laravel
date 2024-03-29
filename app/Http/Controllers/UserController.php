<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Hobby;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prefectures = Config::get('prefectures');
        $hobby_list = Hobby::$hobby_list;
        return view('users.create', compact('prefectures','hobby_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'lastname' => 'required|string|max:255',
        //     'firstname' => 'required|string|max:255',
        //     'age' => 'required|integer|min:0|max:150',
        //     'prefecture' => 'required|string|max:255',
        //     'city' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'phone_number'=> 'required|string|regex:/^\d{10,11}$/',
        // ]);
        $user = User::create($request->all());

        $user_hobbies = $request->input('hobbies', []);
        foreach ($user_hobbies as $hobby) {
            $hobby_record = [];
            $hobby_record['user_id'] = $user->id;
            $hobby_record['hobby_name'] = $hobby;
            Hobby::create($hobby_record);
        }

        $file = $request->file('file');
        Storage::putFile('upload', $file, 'public');

        return redirect()->route('user.show', $user->id);
    }
    /**
     * Display the specified resource.
     */

    public function show( $id): View
    {
        $user = User::findOrFail($id);
        $hobbies = $user->hobbies;
        $files = Storage::files('upload');
        
        $info_array = [];
        foreach ($files as $file) {
            $file_path = storage_path('app/'. $file);
            $handle = fopen($file_path, "r");
            while (($line = fgetcsv($handle)) !== false) {

                $info = [];
        
                $info['name'] = $line[0];
                $info['book'] = $line[1];
                $info['status'] = $line[2];

                $info_array[] = $info;
        
            }
            fclose($handle);
            dd($info_array);
        }

        return view("users.show", compact('user','hobbies'));
        // return view("users.show", ["user" => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
