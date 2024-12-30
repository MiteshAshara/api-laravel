<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>{{ $title }}</title>
</head>

<body>
    <!-- Toast Notification -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast" class="toast align-items-center text-bg-dark border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Add Movie Form -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="mb-4 text-secondary text-center">Add New Movie</h2>
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form action="{{ route('movie.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="movie_title" class="form-label">Movie Title</label>
                                <input type="text" name="movie_title" id="movie_title" class="form-control" placeholder="Enter movie title" required>
                            </div>
                            <div class="mb-3">
                                <label for="movie_name" class="form-label">Movie Name</label>
                                <input type="text" name="movie_name" id="movie_name" class="form-control" placeholder="Enter movie name" required>
                            </div>
                            <div class="mb-3">
                                <label for="movie_director" class="form-label">Director</label>
                                <input type="text" name="movie_director" id="movie_director" class="form-control" placeholder="Enter director's name" required>
                            </div>
                            <div class="mb-3">
                                <label for="release_year" class="form-label">Release Year</label>
                                <input type="number" name="release_year" id="release_year" class="form-control" placeholder="Enter release year" required>
                            </div>
                            <div class="mb-3">
                                <label for="watch_url" class="form-label">Watch URL</label>
                                <input type="url" name="watch_url" id="watch_url" class="form-control" placeholder="Enter movie watch URL">
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Add Movie</button>
                        </form>
                    </div>
                </div>

                <!-- Movies List -->
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Director</th>
                                    <th>Release Year</th>
                                    <th>Watch</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movie as $movies)
                                <tr>
                                    <td>{{ $movies->id }}</td>
                                    <td>{{ $movies->movie_title }}</td>
                                    <td>{{ $movies->movie_name }}</td>
                                    <td>{{ $movies->movie_director }}</td>
                                    <td>{{ $movies->release_year }}</td>
                                    <td>
                                        @if ($movies->watch_url)
                                        <a href="{{ $movies->watch_url }}" target="_blank" class="btn btn-sm btn-dark">Watch</a>
                                        @else
                                        <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('movie.edit', $movies->id) }}" class="btn btn-sm btn-dark">Edit</a>
                                        <form action="{{ route('movie.destroy', $movies->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const successMessage = '{{ session('
            success ') }}';
            if (successMessage) {
                const toast = new bootstrap.Toast(document.getElementById('toast'));
                toast.show();
            }
        });
    </script>
</body>

</html>