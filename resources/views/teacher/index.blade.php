<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        table tr td:last-child{
            width: 150px;
            text-align: center;
            align-items: center;
        }
    </style>
</head>
<body>
    
    <div class="container py-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4>Teacher List</h4>
                    <a href="{{ route('teachers.create') }}" class="btn btn-primary btn-sm">Add New Teacher</a>
                </div>
                
                @if(session('successMessage'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ session('successMessage') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Bio</th>
                        <th>Actions</th>
                    </tr>

                    @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td><a href="{{ route('teachers.show', $teacher->id) }}" class="nav-link">{{ $teacher->name }}</a></td>
                        <td>{{ $teacher->phone }}</td>
                        <td>{{ $teacher->bio }}</td>
                        <td>
                            <form action="{{ route('teachers.destroy', $teacher->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('teachers.edit', $teacher->id) }}" class="d-inline-block">
                                    <button type="button" class="btn btn-primary btn-sm me-2">Edit</button>
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $teachers->links() }}
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>