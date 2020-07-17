<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>create a project</h1>

    <form action="/projects" method="post">
        @csrf
        <label class="label" for=""> tiêu đề</label>
        <div class="control">
            <input type="text"  class="input" name="title" placeholder="">
        </div>
        <label class="label" for=""> mô tả</label>
        <div class="control">
            <input type="text"  class="input" name="description" placeholder="">
        </div>


        <button type="submit">Tạo</button>
        <div class="field">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
    </form>

</body>
</html>
