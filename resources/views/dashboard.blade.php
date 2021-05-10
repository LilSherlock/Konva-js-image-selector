<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/konva@7.2.5/konva.min.js"></script>
<script src="{{asset('js/hammer-konva.js')}}"></script>
<script src="{{asset('js/touch-emulator.js')}}"></script>

<link href="{{ asset('css/konvajs.css') }}" rel="stylesheet" type="text/css" >
<style>

</style>
<x-app-layout>
    <div class="py-12" style="background-color: #1f2029; color: #c4c3ca; background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-2xl" style=" background-color: #1f2029;
        background-position: bottom center;
        background-repeat: no-repeat;
        background-size: 300%; border: 1px solid #ffeba7; box-shadow: 0 8px 24px 0 rgba(255,235,167,.2);">
            <button id="create-yoda">Mi madre</button>
            <button id="create-darth">xDDDDD</button>
            <button id="redo" class=" k" >Redo</button>
            <button id="undo" class=" -">Undo</button>
            <div class="konvajs w-4/8 h-screen bg-white rounded-2xl border-none" style="height:71.0.2vh; #ffeba7; box-shadow: 0 8px 24px 0 rgba(255,235,167,.2); border: 1px solid #ffeba7;" id="dick">
                <div id="container"></div>
                <div id="menu">
                    <div>
                      <button id="pulse-button">block</button
                      ><button id="delete-button">Delete</button>
                    </div>
                </div>
            </div>
            <br>
            <div class="tabs">
                <div x-data="{ tab: 'do' }">
                    <div class="button flex space-x-2">
                        <button :class="{ 'active': tab === 'do' }" @click="tab = 'do'" class="border flex-1 rounded-lg h-12 focus:outline-none" id="menu-button">Escoger producto</button>
                        <button :class="{ 'active': tab === 're' }" @click="tab = 're'" class="border flex-1 rounded-lg h-12 focus:outline-none" id="menu-button">Añadir elemento</button>
                        <button :class="{ 'active': tab === 'mi' }" @click="tab = 'mi'" class="border flex-1 rounded-lg h-12 focus:outline-none" id="menu-button">Añadir texto</button>
                        <button :class="{ 'active': tab === 'fa' }" @click="tab = 'fa'" class="border flex-1 rounded-lg h-12 focus:outline-none" id="menu-button">Ordenar</button>

                    </div>
                    <br>
                    <div x-show="tab === 'do'" class="mt-1">
                        <div x-data="{ tab: 'ka' }" class="flex">
                            <div class="button flex flex-col space-y-4" style="width: 24.2%;">
                                <button :class="{ 'active': tab === 'ka' }" @click="tab = 'ka'" class="border flex-1 rounded-lg h-12 p-2" id="menu-button">Camisas</button>
                                <button :class="{ 'active': tab === 'ke' }" @click="tab = 'ke'" class="border flex-1 rounded-lg h-12 p-2" id="menu-button">Bolsos</button>
                                <button :class="{ 'active': tab === 'ki' }" @click="tab = 'ki'" class="border flex-1 rounded-lg h-12 p-2" id="menu-button">Hoodiees</button>
                                <button :class="{ 'active': tab === 'ko' }" @click="tab = 'ko'" class="border flex-1 rounded-lg h-12 p-2" id="menu-button">Medias</button>
                                <br>
                            </div>
                            <div x-show="tab === 'ka'" class="w-full border">
                                No puede ser
                            </div>
                            <div x-show="tab === 'ke'">Tab re</div>
                            <div x-show="tab === 'ki'">Tab mi</div>
                            <div x-show="tab === 'ko'">Tab fa</div>
                        </div>
                    </div>

                    <div x-show="tab === 're'">Tab re</div>
                    <div x-show="tab === 'mi'">Tab mi</div>
                    <div x-show="tab === 'fa'">Tab fa</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/konvajs.js') }}"></script>
</x-app-layout>
