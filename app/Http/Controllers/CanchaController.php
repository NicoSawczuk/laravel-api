<?php

namespace App\Http\Controllers;

use App\Cancha;
use Illuminate\Http\Request;

class CanchaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $canchas = Cancha::all();
        return response()->json($canchas, 200);
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
        $cancha = new Cancha();
        $cancha->name = $request->name;
        $cancha->detail = $request->detail;
        $cancha->maxPlayers = $request->maxPlayers;
        $cancha->price = $request->price;
        $cancha->save();
        return response()->json($cancha, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cancha  $cancha
     * @return \Illuminate\Http\Response
     */
    public function show(Cancha $cancha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cancha  $cancha
     * @return \Illuminate\Http\Response
     */
    public function edit(Cancha $cancha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cancha  $cancha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cancha $cancha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cancha  $cancha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cancha $cancha)
    {
        //
    }
}
