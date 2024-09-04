<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();

        if (!empty($authors)) {
            return response()->json(['data' => $authors], 200);
        } else {
            return response()->json(['message' => 'No Record Found'], 404);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_contact_no'] = $request->author_contact_no;
        $data['author_country'] = $request->author_country;
        $data['created_at'] = Carbon::now();
        // $data['updated_at'] = Carbon::now();

        $author = Author::create($data);

        if ($author) {
            return response()->json(['message' => 'New Author has been created successfully'], 200);
        } else {
            return response()->json(['message' => 'something went wrong'], 404);
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        $authors = Author::find($author->id);

        if (!empty($authors)) {
            return response()->json(['data' => $authors], 200);
        } else {
            return response()->json(['message' => 'No Record Found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        // $data = array();
        // $data['author_name'] = $request->author_name;
        // $data['author_contact_no'] = $request->author_contact_no;
        // $data['author_country'] = $request->author_country;
        // $data['updated_at'] = Carbon::now();
        // // $data['updated_at'] = Carbon::now();
        // $author = Author::where('id', $author->id)->update($data);

        $author = Author::find($author->id);
        $author->update($request->all());


        if ($author) {
            return response()->json(['message' => 'New Author has been updated successfully'], 200);
        } else {
            return response()->json(['message' => 'something went wrong'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author = Author::where('id', $author->id)->delete();

        if ($author) {
            return response()->json(['message' => 'The Author has been deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'something went wrong'], 404);
        }
    }

    public function search($term)
    {
        $authors = Author::where('author_name', $term);

        if (!empty($authors)) {
            return response()->json(['data' => $authors], 200);
        } else {
            return response()->json(['message' => 'No Record Found'], 404);
        }


    }
}
