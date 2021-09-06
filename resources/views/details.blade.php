<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Bloc de Notas</title>
</head>
<body>



<div class="d-flex justify-content-center">
    <div class="card col-sm-6 p-3">
        <div class=" row mb-3 ">
            <a class="navbar-brand" href="{{ route('index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#184FF2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" />
                </svg>
            </a>
            <h1>Editar Nota</h1>
        </div>
    <form action="{{route('edit',$detail->id)}}" method="POST">
        @csrf
        @method('PUT')
        @if(session('message'))

            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{session('message')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @error('note_name')
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <small class="text-danger">*{{ $errors -> first('note_name', ':message')}}</small>
        </div>
        @enderror
        @error('description')
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
            <small class="text-danger">*{{ $errors -> first('description', ':message')}}</small>
        </div>
        @enderror
        <div class="form-group">
            <label for="form-label">Titulo</label>
            <input type="text" name="note_name" class="form-control" placeholder="Ingresa Titulo" value="{{$detail->note_name}}">
        </div>
        <div class="form-group">
            <label for="form-label">Descripcion</label>
            <textarea class="form-control" name="description" rows="3">{{$detail->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
    </div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
