<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Article;
use TCG\Voyager\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function getAllPosts(Request $request)
    {
        try {
            return response()->json(Post::with(["authorId"])->paginate(3));
        } catch (Exception $e) {
            $result = array('status' => false, 'message' => "API failed due to an error.", "error" => $e->getMessage());
            return response()->json($result, 500);
        }

    }

    //function to create article
    public function createArticle(Request $request)
    {
        //validation of post data
        try {
            $validator = Validator::make($request->all(), [
                "title" => "required",
                "theme" => "required|string",
                "content" => "required|max:2000|unique:articles,content",
                "author_name" => "required|string",
            ]);
            if ($validator->fails()) {
                $result = ['status' => 'false', 'message' => "validation error", "error_message" => $validator->errors()];
                return response()->json($result, 422);
            }

            //create new article
            $article = Article::create([
                "title" => $request->title,
                "theme" => $request->theme,
                "content" => $request->content,
                "author_name" => $request->author_name,
            ]);

            if ($article->id) {
                $result = ['status' => true, 'message' => 'Article published.', 'data' => $article];
                $responseCode = 200; //success
                return response()->json($result, $responseCode);
            } else {
                $result = array('status' => false, 'message' => 'Something went wrong.');
                $responseCode = 400; //bad request
                return response()->json($result, $responseCode);

            }
        } catch (Exception $e) {
            $result = array('status' => false, 'message' => "API failed due to an error.", "error" => $e->getMessage());
            return response()->json($result, 500);//internal server error
        }
    }

    //function to return all the articles
    public function showArticles()
    {
        try {
            $articles = Article::all();

            $result = array('status' => true, 'message' => count($articles) . " article(s) published", 'data' => $articles);
            $responseCode = 200; //success

            return response()->json($result, $responseCode);
        } catch (Exception $e) {
            $result = array('status' => false, 'message' => "API failed due to an error.", "error" => $e->getMessage());
            return response()->json($result, 500);
        }
    }

    //function to return details of an individual article
    public function showArticleDetail($id)
    {
        try {
            $article = Article::find($id);
            if (!$article) {
                return response()->json(['status' => false, 'message' => 'Article not found.'], 404);
            }

            $result = array('status' => true, 'message' => "Article found", 'data' => $article);
            $responseCode = 200; //success

            return response()->json($result, $responseCode);
        } catch (Exception $e) {
            $result = array('status' => false, 'message' => "API failed due to an error.", "error" => $e->getMessage());
            return response()->json($result, 500);
        }
    }

    //function to update/edit an article
    public function updateArticle(Request $request, $id)
    {
        try {
            $article = Article::find($id);
            if (!$article) {
                return response()->json(['status' => false, 'message' => 'Article not found', 404]);
            }

            //validation of post data
            $validator = Validator::make($request->all(), [
                "title" => "required",
                "theme" => "required|string",
                "content" => "required|max:2000",
                "author_name" => "required|string",
            ]);

            if ($validator->fails()) {
                $result = array(['status' => 'false', 'message' => "validation error", "error_message" => $validator->errors()]);
                return response()->json($result, 422);
            }

            //update the article
            $article->title = $request->title;
            $article->theme = $request->theme;
            $article->content = $request->content;
            $article->author_name = $request->author_name;
            $article->save();

            $result = array(['status' => 'true', 'message' => "Article has been updated successfully.", "data" => $article]);
            return response()->json($result, 200);
        } catch (Exception $e) {
            $result = array('status' => false, 'message' => "API failed due to an error.", "error" => $e->getMessage());
            return response()->json($result, 500);
        }
    }

    //delete article
    public function deleteArticle($id)
    {
        try {
            $article = Article::find($id);
            if (!$article) {
                return response()->json(['status' => false, 'message' => 'Article not found', 404]);
            }
            $article->delete();

            $result = array(['status' => 'true', 'message' => "Article has been deleted successfully."]);
            return response()->json($result, 200);
        } catch (Exception $e) {
            $result = array('status' => false, 'message' => "API failed due to an error.", "error" => $e->getMessage());
            return response()->json($result, 500);
        }
    }


}
