<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h4>Edit Teacher</h4>
                <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="name" class="form-control mt-3 @error('name') is-invalid @enderror" placeholder="Teacher Name" value="{{ $teacher->name ?? old('name') }}">
                    @error('name') {{ $message }} @enderror
                    
                    <input type="text" name="phone" class="form-control mt-3 @error('phone') is-invalid @enderror" placeholder="Phone Number" value="{{ $teacher->phone ?? old('phone') }}">
                    @error('phone') {{ $message }} @enderror

                    <textarea name="bio" rows="5" class="form-control mt-3 @error('bio') is-invalid @enderror" placeholder="About Teacher">{{ $teacher->bio ?? old('bio') }}</textarea>
                    @error('bio') {{ $message }} @enderror
                    
                    <button class="btn btn-primary mt-3 d-block">Update Teacher</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>