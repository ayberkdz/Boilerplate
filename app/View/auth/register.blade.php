@extends('layout')

@section('content')
    <form action="" method="post">
        <input type="text" name="name" value="@getData('name')" class="border @hasError('name')" placeholder="kullanıcı adı">
        <input type="text" name="password" class="border @hasError('password')" placeholder="Parola">
        <button type="submit">Kayıt pl</button>
    </form>
@endsection