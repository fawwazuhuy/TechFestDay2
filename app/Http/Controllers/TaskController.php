<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard', [
            'tasks' => task::get(),
            'kategoris' => Kategori::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create', [
            'taskses' => Kategori::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "judul" => ["required"],
            "kegiatan" => ["required"],
            "kategori_id" => ["required"]
        ]);

        task::create([
            "judul" =>  $request->judul,
            "kegiatan" => $request->kegiatan,
            "kategori_id" => $request->kategori_id
        ]);

        return to_route("dashboard");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('task.index', [
            'task' => task::get($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('edit', [
            'taskas' => task::find($id),
            'taskses' => kategori::get(),
            // 'kategoris'=> Kategori::get()
            // 'tasks' => Kategori::get()
            // 'kategori' => Kategori::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = task::find($id);

        $this->validate($request, [
            // 'user_id'=>auth()->id(),
            'judul'    => ['required'],
            'kegiatan' => ['required'],
            'kategori' => ['required'],
        ]);

        $task->update([
            'judul' => $request->judul,
            'kegiatan' => $request->kegiatan,
            'kategori_id' => $request->kategori,
        ]);

        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        task::find($id)->delete();
        return redirect()->route('task.index');
    }
}
