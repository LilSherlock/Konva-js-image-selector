<link href="{{ asset('css/konvajs.css') }}" rel="stylesheet" type="text/css" >
<style>
    body, html {
        background-color: #1f2029;
    }

</style>
<x-app-layout>
    <div class="py-12 h-full" style="height: 100%; background-color: #1f2029; color: #c4c3ca; background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-2xl" style="
        height: 100%;
        background-color: #1f2029;
        background-position: bottom center;
        background-repeat: no-repeat;
        background-size: 300%; border: 1px solid #ffeba7; box-shadow: 0 8px 24px 0 rgba(255,235,167,.2);">
            <br>
            <h1 class="text-center text-4xl" style="color: #ffeba7;">IMAGE CRUD: Update Image in Laravel</h1>
            <br>
            <br><br><br>
            <form action="/updateimage/{{$images->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <h1 class="text-center text-2xl" style="color:#ffeba7;">Nombre</h1>
                <br>
                <div class="flex justify-center">
                    <input type="text" value="{{$images->name}}" name="name" class="w-10/12 text-black">
                </div>
                <br>
                <h1 class="text-center text-2xl" style="color:#ffeba7;">Actual image</h1>
                <div class="flex justify-center">
                    <img src="{{ asset('images/'. $images->image)}}" alt="" style="width: 100px; height: 100px;">
                </div>
                <br>
                <br>
                <h1 class="text-center text-2xl" style="color:#ffeba7;">Imagen</h1>
                <div class="flex justify-center">
                    <input type="file" name="image">
                </div>
                <br><br>
                <div class="flex justify-center">
                    <button class="border p-3 rounded-md w-10/12" id="menu-button" type="submit">button</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</x-app-layout>
