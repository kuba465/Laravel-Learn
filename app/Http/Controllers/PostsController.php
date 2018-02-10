<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 'not define')
    {
        return "It's working and number is $id";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Create Page";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = action('PostsController@destroy', ['post' => $id]);
        return "<html><head></head><body><a href=$url>About</a> </body></html>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "I need to call this method with parameter when I want to delete sth from db... $id";
    }

    public function contact()
    {
        $people = ['Kuba', 'Dominika', 'Paweł', 'Ala', 'Ania', 'Bartek'];

        return view('contact', compact('people'));
    }

    public function showPost($id, $name, $password)
    {
//        return view('post')->with('id', $id);
        $files = ['aaaaa', 'xxxxxx', 'ccccccc'];
        return view('post', compact('id', 'name', 'password', 'files'));
    }

    public function contactNew($number)
    {
        $number++;
        return view('contactNew', compact('number'));
    }

    public function showPostNew($number)
    {
        $number++;
        return view('showPostNew', compact('number'));
    }

    public function contactNew2($number)
    {
        return view('contactNew', ['number' => $number++]);
    }

    public function showPostNew2($number)
    {
        return view('showPostNew', ['number' => $number++]);
    }
}
