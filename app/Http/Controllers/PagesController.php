<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use App\Models\User;
use App\Models\Article;

class PagesController extends Controller
{

    public function dashboard()
    {
        $user_count = User::count();
        $user_datatype = DataType::where("model_name", "TCG\Voyager\Models\User")->first();
        $user_response = ["count" => $user_count, "dt" => $user_datatype];
        $post_count = Post::count();
        $post_datatype = DataType::where("model_name", "TCG\Voyager\Models\Post")->first();
        $post_response = ["count" => $post_count, "dt" => $post_datatype];

        $article_count = Article::count();
        $article_datatype = DataType::where("model_name", "App\Models\Article")->first();
        $article_response = ["count" => $article_count, "dt" => $article_datatype];

        //     dd($_SERVER);
        return view("vendor.voyager.index")->with("user", $user_response)->with("post", $post_response)->with("article", $article_response);

    }
    //function to display homepage with gallery
    public function gallery()
    {
        $menulist = Menu::with('items')->where('name', 'navbar')->firstOrFail()->toArray();

        // Fetch all posts
        $posts = Post::paginate(3);
        // Pass the data to the view

        return view('gallery')->with('navbar', $menulist)->with('posts', $posts);

    }

    //function to view gallery details
    public function galleryDetails($slug)
    {
        $menulist = Menu::with('items')->where('name', 'navbar')->firstOrFail()->toArray();
        $posts = Post::where('slug', $slug)->firstOrFail();
        return view('details')->with('posts', $posts)->with('navbar', $menulist);

    }

    //function to put on query/message 
    public function contact(Request $request)
    {
        $menulist = Menu::with('items')->where('name', 'navbar')->firstOrFail()->toArray();

        return view('contact')->with('navbar', $menulist);

    }

    //handle form submission
    public function handleContact(Request $request)
    {
        // Validate form data
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'string|nullable',
            'message' => 'required|string|max:2000',
        ]);

        $contact = Contact::create($validated);

        // Redirect back with a success message
        return to_route('gallery')->with('success', 'Your message has been sent successfully!');
    }
}
