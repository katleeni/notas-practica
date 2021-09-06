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
        <div class=" row mb-3 ml-3">
            <h1>Editar Nota</h1>
        </div>

        <form action="{{route('add')}}" method="POST">
            @csrf
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
                <label for="exampleInputEmail1">Titulo</label>
                <input type="text" name="note_name" class="form-control" placeholder="Ingresa Titulo" value="{{old('note_name')}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Descripcion</label>
                <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crear Nota</button>
        </form>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="col-sm-6 p-3">
        <div class="container bootstrap snippets bootdeys">
                <div class="row ">
                    @foreach($data as $item)
                    <div class="col-md-6 col-sm-6 content-card">
                        <div class="card-big-shadow">
                            <div class="card card-just-text" data-background="color" data-color="yellow" data-radius="none">
                                <div class="content">
                                    <h4 class="title">{{$item->note_name}}</h4>
                                    <p class="description">{{$item->description}}</p>
                                    <a href="{{ route('edit',$item)}}" class="btn btn-primary">Editar</a>
                                    <form class="d-inline" action="{{ route('destroy',$item)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </div> <!-- end card -->
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
