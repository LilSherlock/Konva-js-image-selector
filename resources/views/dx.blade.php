<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="{{ asset('css/konvajs.css') }}" rel="stylesheet" type="text/css" >
<style>
    body, html {
        background-color: #1f2029;
    }
</style>
<x-app-layout>
    <div class="py-12 h-full" style="background-color: #1f2029; color: #c4c3ca; background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-2xl" style=" background-color: #1f2029;
        background-position: bottom center;
        background-repeat: no-repeat;
        background-size: 300%; border: 1px solid #ffeba7; box-shadow: 0 8px 24px 0 rgba(255,235,167,.2);">
            <br>
            <form action="{{ route('control') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="menu flex justify-center">
                    <div class="title text-7xl" style="color: #ffeba7;">
                        <br>
                        Panel image
                    </div>
                </div>
                <br>
                <br>
                <div class="menu flex justify-center">
                    <div class="submenu">
                        <div class="input">
                            <h3 style="color: #ffeba7;">nombre:</h3>
                            <input type="text" class="text-black focus:outline-none outline-none" name="name">
                        </div>
                        <div class="input">
                            <h3 style="color: #ffeba7;">imagen:</h3>
                            <input type="file" name="image">
                        </div>
                    </div>
                </div>
                <br>
                <div class="menu flex justify-center">
                    <button class="border p-3 rounded-md" id="menu-button" type="submit">button</button>
                </div>
            </form>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error )
                <li class="text-center">{{ $error }}</li>
                @endforeach
            </ul>
            <br>
            @endif
            <br>
            <br>
            <br>
            <a href="{{route('table')}}">aaaaaa</a>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </x-app-layout>
