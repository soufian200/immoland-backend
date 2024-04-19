<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string',
            'price' => 'required|numeric',
            'space' => 'required|numeric',
            'rooms' => 'required|integer',
            'image' => 'required|image|max:2048',
        ]);

        // Store the image and get the path
        $imagePath = $request->file('image')->store('images', 'public');

        // Create a new post
        $post = Post::create([
            'user_id' => $request->user()->id,  // Assuming user is authenticated
            'title' => $request->title,
            'description' => $request->description,
            'city' => $request->city,
            'price' => $request->price,
            'space' => $request->space,
            'rooms' => $request->rooms,
            'image_path' => $imagePath,
        ]);

        // Return the created post
        return response()->json($post, 201);
    }


     // Method to get all posts created by a specific user
     public function getUserPosts($userId)
     {
         // Retrieve all posts created by the specified user
         $posts = Post::where('user_id', $userId)->get();
 
         // Return the posts as JSON
         return response()->json($posts);
     }

      // Method to get details of a specific post
    public function getPostDetail($postId)
    {
        // Find the post by ID
        $post = Post::find($postId);

        // Check if the post exists
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        // Return the post as JSON
        return response()->json($post);
    }
}
