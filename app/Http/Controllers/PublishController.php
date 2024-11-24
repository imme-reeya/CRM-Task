<?php

namespace App\Http\Controllers;
use TCG\Voyager\Models\Menu;
use App\Models\Article;

use Illuminate\Http\Request;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menulist = Menu::with('items')->where('name', 'navbar')->firstOrFail()->toArray();
        $articles = Article::paginate(3);

        return view("publish.index")->with('navbar', $menulist)->with('articles', $articles);
    }

    public function publishDetails($title)
    {
        $menulist = Menu::with('items')->where('name', 'navbar')->firstOrFail()->toArray();
        $articles = Article::where('title', $title)->firstOrFail();
        return view('publish.article-details')->with('articles', $articles)->with('navbar', $menulist);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
