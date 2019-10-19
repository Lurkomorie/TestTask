<?php

namespace App\Http\Controllers;

use App\RandomNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RandomNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function storeNumber()
    {
        $randomNumber = new RandomNumber;
        $number = rand(0,1000);
        $randomNumber -> number = $number;
        $result = $number % 2 == 0 ? 'WIN' : 'LOSE';
        $randomNumber -> result = $result;
        $win = 0;
        if($result == 'WIN'){
            if($number > 900) $win = $number * 0.7;
            else if($number > 600) $win = $number * 0.5;
            else if($number > 300) $win = $number * 0.3;
            else $win = $number * 0.1;
        }

        $randomNumber -> win = $win;

        $id = Auth::id();
        $randomNumber -> user_id = $id;

        $randomNumber -> save();

        //return redirect('', compact("randomNumber"));
        return redirect()->back()->with(['randomNumber' => $randomNumber]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RandomNumber  $randomNumber
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $randomNumbers = DB::table('random_numbers')->latest()->take(3)->get();
        return redirect()->back()->with(['randomNumbers' => $randomNumbers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RandomNumber  $randomNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(RandomNumber $randomNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RandomNumber  $randomNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RandomNumber $randomNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RandomNumber  $randomNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(RandomNumber $randomNumber)
    {
        //
    }
}
