<!DOCTYPE HTML>
<html lang="ja" style="height:100%;">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>timeline</title>
    </head>
    <body style="height:100%; background-color: #E6ECF0;">
        <div>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" style="float: right; border: none; width: 10em; height: 5em; background: transparent; cursor: pointer;">ログアウト</button>
            </form>
        </div>
        <div class="wrapper" style="margin: 0 auto; width: 50%; height: 100%; background-color: white;">
            @if(session('feedback.success'))
                <p style="color: green;">{{ session('feedback.success') }}</p>
            @endif
            <form action="{{ route('timeline.create') }}" method="post">
            @csrf
                <div style="background-color: #E8F4FA; text-align: center;">
                    <input type="text" name="content" style="margin: 1rem; padding: 0 1rem; width: 70%; border-radius: 6px; border: 1px solid #ccc; height: 2.3rem;" placeholder="今どうしてる？">
                    @error ('content')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                    <button type="submit" style="background-color: #2695E0; color: white; border-radius: 10px; padding: 0.5rem; cursor: pointer">投稿</button>
                </div>
            </form>
            <div class="post-wrapper">
            @foreach($posts as $post) 
                <div style="padding:2rem; border-top: solid 1px #E6ECF0; border-bottom: solid 1px #E6ECF0; display: flex;">
                    <div>
                        <img src="/storage/{{ $post->user->image }}" style="object-fit: cover; border-radius: 50%; height: 50px; width: 50px;">
                        {{ $post->user->name }}
                    </div>
                    <div>{{ $post->content }}</div>
                    @if(\Illuminate\Support\Facades\Auth::id() === $post->user_id)
                    <div style="display: flex; margin: 0 0 0 auto; align-items: center;">
                        <a href="{{ route('timeline.update.index', ['postId' => $post->id]) }}" style="background-color: #A9A9A9; color: white; border-radius: 10px; padding: 0.5rem; text-decoration: none; ">編集</a>
                        <form action="{{ route('timeline.delete', ['postId' => $post->id]) }}" method="post">
                            @method('DELETE')
                            @csrf 
                            <button type="submit" style="border: none; background-color: #ff6347; color: white; padding: 0.6rem; border-radius: 10px; cursor: pointer">削除</button>
                        </form>
                    </div>
                    @endif
                </div>
            @endforeach        
            </div>
        </div>

    </body>
</html>