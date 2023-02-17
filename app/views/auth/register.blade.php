@extends('layout')

@section('title', 'Register')

@section('content')
    @getError(error)
    <form action="" method="post">
        <input type="text" class="@hasError(name)" value="@getData(name)" name="name" placeholder="Kullanıcı adı"> <br>
        @getError(name)
        <input type="password" name="password" class="@hasError(password)" placeholder="Şifre"> <br>
        @getError(password)
        <button type="submit">Kayıt yap</button>
    </form>
@endsection