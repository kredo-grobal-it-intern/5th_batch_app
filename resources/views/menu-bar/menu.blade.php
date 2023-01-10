
{{-- request()->is('pet-news/*') only, it won't work in 'pet-news' --}}
@if (request()->is('pet-news') || request()->is('pet-news/*'))

    <button onclick="location.href='/pet-news/show/amusement'" class="btn col-3 rounded-0 p-0" style="background-color:rgba(250, 202, 123, 1);" id = "amusement-park" >
        <iconify-icon inline icon="maki:amusement-park" class="fs-1 mt-3"></iconify-icon>
        <br>                                                         
        <p class="mt-2">Amusement Park</p>
    </button>

    <button onclick="location.href='/pet-news/show/cafe'" class="btn col-3 rounded-0 p-0" style="background-color:rgba(255, 222, 104, 1);" type="button" id = "cafe">
        <iconify-icon inline icon="bx:coffee-togo" class="fs-1 mt-3"></iconify-icon>
        <br>
        <p class="mt-2">Cafe</p>
    </button>

    <button onclick="location.href='/pet-news/show/dogrun'" class="btn col-3 rounded-0 p-0" style="background-color:rgba(224, 241, 244, 1);" type="button" id = "dogrun">
        <iconify-icon inline icon="game-icons:jumping-dog" class="fs-1 mt-3"></iconify-icon>
        <br>
        <p class="mt-2">Dogrun</p>
    </button>

    <button onclick="location.href='/pet-news/show/hospital'" class="btn col-3 rounded-0 p-0" style="background-color:rgba(240, 150, 160, 1);" type="button" id = "hospital">
        <iconify-icon inline icon="ic:outline-local-hospital" class="fs-1 mt-3"></iconify-icon>
        <br>
        <p class="mt-2">Hospital</p>
    </button>

@elseif(request()->is('map'))
                                                                                        {{-- ⬇️ this id is connected to categories.js line 3 --}}
    <button class="btn col-3 rounded-0 p-0" style="background-color:rgba(250, 202, 123, 1);" id = "amusement-park" >
        <iconify-icon inline icon="maki:amusement-park" class="fs-1 mt-3" type="button"></iconify-icon>
        <br>                                                         
        <p class="mt-2">Amusement Park</p>
    </button>

    <button class="btn col-3 rounded-0 p-0" style="background-color:rgba(255, 222, 104, 1);" type="button" id = "cafe">
        <iconify-icon inline icon="bx:coffee-togo" class="fs-1 mt-3"></iconify-icon>
        <br>
        <p class="mt-2">Cafe</p>
    </button>

    <button class="btn col-3 rounded-0 p-0" style="background-color:rgba(224, 241, 244, 1);" type="button" id = "dogrun">
        <iconify-icon inline icon="game-icons:jumping-dog" class="fs-1 mt-3"></iconify-icon>
        <br>
        <p class="mt-2">Dogrun</p>
    </button>

    <button class="btn col-3 rounded-0 p-0" style="background-color:rgba(240, 150, 160, 1);" type="button" id = "hospital">
        <iconify-icon inline icon="ic:outline-local-hospital" class="fs-1 mt-3"></iconify-icon>
        <br>
        <p class="mt-2">Hospital</p>
    </button>
@endif