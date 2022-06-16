
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    </style>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="margin container bg-primary m-5 w-25 border rounded"> 
    <h1 class="text-white text-center mb-3"> Create A Post </h1>

<form action="/posts" method="POST">
@csrf
    <label for="" class="text-white"> Post Title </label>
    <input type="text" name="title" id="" class="form-control text-primary">
    <br>
    @error('title')
    <div style="color: red"> {{$message }}</div>
    @enderror
    <br> <br>
    <label for="" class="text-white"> Post Body </label>
    <textarea name="body" id="" cols="10" rows="10" class="form-control text-primary"></textarea>
    <br>
    @error('body')
    <div style="color: red"> {{$message }}</div>
    @enderror
    <br> 
    <button type="submit" class="form-control mb-5 w-25 border rounded bg-outline-success"> Create </button>
</form>
</div>
</body>
</html>
