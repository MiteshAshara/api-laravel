<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center text-dark">{{ $title }}</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('movie.update', $movie->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="movie_title" class="form-label">Movie Title</label>
                        <input type="text" name="movie_title" id="movie_title" class="form-control" value="{{ $movie->movie_title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="movie_name" class="form-label">Movie Name</label>
                        <input type="text" name="movie_name" id="movie_name" class="form-control" value="{{ $movie->movie_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="movie_director" class="form-label">Director</label>
                        <input type="text" name="movie_director" id="movie_director" class="form-control" value="{{ $movie->movie_director }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="release_year" class="form-label">Release Year</label>
                        <input type="number" name="release_year" id="release_year" class="form-control" value="{{ $movie->release_year }}" required>
                    </div>
                    <div class="mb-3">
                                <label for="watch_url" class="form-label">Watch URL</label>
                                <input type="url" name="watch_url" id="watch_url" class="form-control" placeholder="N/A" value="{{ $movie->watch_url }}" required>
                            </div>
                    <button type="submit" class="btn btn-dark w-100">Update Movie</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
