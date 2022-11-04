<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>timeline</title>
    </head>
    <body style="height:100%; background-color: #E6ECF0;">
        <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
            <a href="{{ route('timeline.index') }}" style="background-color: #ccc; color: white; border-radius: 10px; padding: 0.5rem; text-decoration: none;">戻る</a>
            <form action="{{ route('timeline.update.put', ['postId' => $post->id]) }}" method="post">
            @method('PUT')
            @csrf
                <div style="background-color: #E8F4FA; text-align: center;">
                    <input type="text" name="content" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" value="{{$post->content}}">
                    @error ('content')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem;">編集</button>
                </div>
            </form>
        </div>
    </body>
</html>