<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Edit Post</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand h1" href={{ route('listcategorie') }}>Mes Post</a>
    </nav>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3>Editer un Post</h3>
                <form action="{{ route('editCategorie', $categories->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title: </label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $categories->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image: </label> <br>
                        <input type="file" name="image" id ="image" required> 
                    </div>
                    <div class="form-group">
                        <label for="description">Description: </label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ $categories->description }}"  required>
                    </div>
                    <button type="submit" class="btn btn-primary">Editer un Post</button>
                </form>
                <br>
                <a href={{ route('listcategorie') }} class="btn btn-primary">Retour</a>

            </div>
        </div>
    </div>
</body>

</html>