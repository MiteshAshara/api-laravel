<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $title = "Movie managers";
        $movie = Movie::all();
        return view("movies.index", compact("movie", "title"));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'movie_title' => 'required|string|max:255',
            'movie_name' => 'required|string|max:255',
            'movie_director' => 'required|string|max:255',
            'release_year' => 'required|integer',
            'watch_url' => 'nullable|url'
        ]);

        Movie::create($validated);

        return redirect()->route('index')->with('success', 'Movie added successfully!');
    }

    public function show(Movie $movie)
    {
        return response()->json($movie);
    }
    public function fetchAll()
    {
        $movies = Movie::all();
        return MovieResource::collection($movies);
    }
    public function edit(Movie $movie)
    {
        $title = 'Edit Movie';
        return view('movies.edit', compact('movie', 'title'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'movie_title' => 'required|string|max:255',
            'movie_name' => 'required|string|max:255',
            'movie_director' => 'required|string|max:255',
            'release_year' => 'required|integer',
        ]);

        $movie->update($validated);

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully!');
    }
}
