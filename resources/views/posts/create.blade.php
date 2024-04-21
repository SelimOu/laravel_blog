<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Create Post</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('posts.index') }}>Mes Posts</a>
            <div class="justify-end ">
                
            </div>
        </div>
    </nav>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Ajouter un Post</h3>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title: </label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content: </label>
                        <input type="text" class="form-control" id="content" name="content" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image: </label> <br>
                        {{-- <input type="text" class="form-control" id="image" name="image" > --}}
                        
                            
                            <input type="file" name="image" id ="image" required>
                            
                    </div>
                    <div class="form-group">
                        <label for="description">Description: </label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="form-group">
                        <label for="categorie">Categorie(s): </label>
                        {{-- @if($errors->any())
                        {{implode('', $errors->all('Veuillez cocher une categorie'))}}
                        @endif --}}
                        
                        @foreach ($categories as $categorie)
                        
                        <input type="checkbox" id="categorie" name="categorie[]" 
                        value ="{{$categorie->id}}"  > {{$categorie->title}}
                        
                        @endforeach 
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter un Post</button>
                </form>
                <br> <br>
                <a href={{ route('posts.index') }} class="btn btn-primary">Retour</a>
            </div>
        </div>
    </div>
</body>

</html>