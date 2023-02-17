
@extends('layout')

@section('title', 'Anasayfa')

@section('content')

@auth
<h1>Hoşgeldin, {{ auth()->getName() }}
</h1>

<a href="http://localhost/Core/logout">[Çıkış yap]</a>
@endauth

@guest
<h1>Hoşgeldin, ziyaretçi

    <a href="http://localhost/Core/login">[Giriş yap]</a>
    <a href="http://localhost/Core/register">[kayıt yap]</a>
</h1>
@endguest

    <form action="" method="post" style="display: none;">
        <ul>
            <li>
                <input type="text" value="@getData(username)" name="username" class="@hasError(username)" placeholder="kullanıcı adı" id="">
                @getError(username)
            </li>
            <li>
                <input type="password" value="@getData(password)" name="password" class="@hasError(password)" placeholder="Parola" id="">
                @getError(password)
            </li>
            <li>
                <input type="password" value="@getData(apassword)" name="apassword" class="@hasError(apassword)" placeholder="Parola (Tekrar)" id="">
                @getError(apassword)
            </li>
            <li>
                <button type="submit">Gönder</button>
            </li>
        </ul>
    </form>

    <form action="" method="post">
        <textarea name="content" class="@hasError(content)" id="" cols="30" rows="10">

        </textarea>
        @getError(content)
        <br>
        <button type="submit">Kaydet</button>
    </form>

    <ul>
        @foreach ($posts as $post)
            <li>
                #{{  $post->id  }} <br>
                {{ $post->content }} <br>
                tarih : @timeAgo($post->created_at)
            </li>
        @endforeach
    </ul>
@endsection