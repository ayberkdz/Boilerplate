@extends('layout')

@section('content')
    <form action="" method="post">
        <input type="text" name="name" value="@getData('name')" class="border @hasError('name')" placeholder="kullanıcı adı">
        @getError('name')
        <input type="text" name="password" class="border @hasError('password')" placeholder="Parola">
        @getError('password')
        <button type="submit">Giriş yap</button>
    </form>
@endsection