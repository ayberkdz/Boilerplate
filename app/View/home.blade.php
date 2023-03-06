@extends('layout')

@section('title', 'Anasayfa')

@section('content')

    @if($msg = cookie('msg'))
        <div id="msg" class="w-full p-4 bg-emerald-400 text-black">
            {!! $msg !!}
        </div>
        <script>
            setTimeout(() => document.querySelector('#msg').classList.add('hidden'), 1500);
        </script>
    @endif

    @auth
        <span class="text-indigo-500 font-bold">Hoşgeldin, {{ auth()->getName() }}</span>
        <a href="<?= site_url() ?>logout">[Çıkış yap]</a>
    @endauth

    @guest
        <span class="text-cyan-500 font-bold">Hoşgeldin ziyaretçi</span>
        <a href="<?= site_url() ?>login">[Giriş yap]</a>
        <a href="<?= site_url() ?>register">[Kayıt ol]</a>
    @endguest

    <form hidden action="" method="post">
        <ul>
            <li>
                <input type="text" name="username" value="@getData('username')" class="border border-gray-500 @hasError('username')" placeholder="username">
            </li>
            <li>
                <input type="text" name="password" class="border border-gray-500 @hasError('password')" placeholder="password">
            </li>
            <li>
                <input type="text" name="repassword" class="border border-gray-500 @hasError('repassword')" placeholder="re-password">
            </li>
            <li>
                <button type="submit" class="bg-indigo-500 rounded-md text-white p-2.5">Gönder</button>
            </li>
        </ul>
    </form>


    @auth
        <form action="" method="post" class="bg-gray-300 p-4 rounded-md" enctype="multipart/form-data">
            <ul>
                <li>
                    <input type="file" name="image" class="@hasError('image')">
                    @getError('image')
                </li>
                <li>
                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                    @getError('content')
                </li>
                <li>
                    <button type="submit">Kaydet</button>
                </li>
            </ul>
            
            
        </form>
    @endauth

    <ul id="result">
        @foreach ($posts as $post)
            <li>
                @if ($post->image)
                    <div>
                        <img src="<?= site_url() ?>public/upload/{{ json_decode($post->image)->small }}" alt="">
                    </div>
                @endif
                {{ $post->id }} <br>
                {{ $post->content }} <br>
                Ekleyen: {{ $post->user->name }} <br>
                Tarih: @timeAgo($post->created_at)
            </li>
        @endforeach
    </ul>
@endsection