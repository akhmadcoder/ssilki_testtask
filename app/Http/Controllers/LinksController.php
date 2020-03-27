<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Links;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Links::get();
        return view('ssilki')->with(['links' => $links]);
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
        $request->validate([
                'url' => 'required|min:12|max:200',
            ], 
            [
                'url.required' => 'пожалуйста, введите ссылку',
                'url.min' => 'нужно минимум 12 символов',
                'url.max' => 'введите менее 200 символов',
            ]);


        if(Links::create([
                'link' => bin2hex(random_bytes(3)),
                'url' => $request['url'],
        ])){

            return back()->withSuccess('Ссылка была успешно добавлена!');

        } else {

            return back()->withFail('Что-то не так! Пожалуйста, попробуйте еще раз.');
        }

    }

    public function shortenUrl($link)
    {
        $find = Links::where('link', $link)->first();
        return redirect($find->url);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
