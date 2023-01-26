<div class="col-9 mt-5">
    <!-- Upper side -->
                <div class="row">
            <!-- Amusement -->
                    <div class="col"  style="background-color:rgba(250, 202, 123, 1); height: 320px;">
                        <div class="row gx-2">
                            @foreach($amusement_news as $amusement)
                                <div class="col-5 mx-auto mt-4 card p-0" style="max-height: 120px">
                                    <a href="{{ route('pet-news.show', $amusement->id) }}" class="card-body p-0"> 
                                        @if($amusement->image)
                                            <img src="{{ $amusement->image }}" class="w-100 rounded-top" alt="" style="max-height:90px;">
                                        @else
                                            <p class="m-0 d-flex align-items-center justify-content-center" style="max-height:120px">No Image</p>
                                        @endif
                                    </a>
                                    <a href="{{ route('pet-news.show', $amusement->id) }}" class="card-footer overflow-scroll p-1">
                                        {{ $amusement->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
        <!-- cafe -->
                    <div class="col ms-4" style="background-color:rgba(255, 222, 104, 1);">
                        <div class="row gx-2">
                            @foreach($cafe_news as $cafe)
                                <div class="col-5 mx-auto mt-4 card p-0" style="max-height: 120px">
                                    <a href="{{ route('pet-news.show', $cafe->id) }}" class="card-body p-0"> 
                                        @if($cafe->image)
                                            <img src="{{ $cafe->image }}" class="w-100 rounded-top" alt="" style="max-height:90px;">
                                        @else
                                            <p class="m-0 d-flex align-items-center justify-content-center" style="max-height: 120px">No Image</p>
                                        @endif
                                    </a>
                                    <a href="{{ route('pet-news.show', $cafe->id) }}" class="card-footer overflow-scroll p-1">
                                        {{ $cafe->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
    <!-- lower side -->
                <div class="row mt-4">
                    <div class="col" style="background-color:rgba(224, 241, 244, 1); height: 320px;">
        <!-- dogrun -->
                        <div class="row gx-2">
                            @foreach($dogrun_news as $dogrun)
                                <div class="col-5 mx-auto mt-4 card p-0" style="max-height: 120px">
                                    <a href="{{ route('pet-news.show', $dogrun->id) }}" class="card-body  p-0"> 
                                        @if($dogrun->image)
                                            <img src="{{ $dogrun->image }}" class="w-100 rounded-top" alt="" style="max-height:90px;">
                                        @else
                                            <p class="m-0 d-flex align-items-center justify-content-center" style="max-height: 120px">No Image</p>
                                        @endif
                                    </a>
                                    <a href="{{ route('pet-news.show', $dogrun->id) }}" class="card-footer overflow-scroll p-1">
                                        {{ $dogrun->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
        <!-- Hospital -->
                    <div class="col ms-4" style="background-color:rgba(240, 150, 160, 1);">
                        <div class="row gx-2">
                            @foreach($hospital_news as $hospital)
                                <div class="col-5 mx-auto mt-4 card p-0" style="max-height: 120px">
                                    <a href="{{ route('pet-news.show', $hospital->id) }}" class="card-body  p-0"> 
                                        @if($hospital->image)
                                            <img src="{{ $hospital->image }}" class="w-100 rounded-top" alt="" style="max-height:90px;">
                                        @else
                                            <p class="m-0 d-flex align-items-center justify-content-center" style="max-height: 120px">No Image</p>
                                        @endif
                                    </a>
                                    <a href="{{ route('pet-news.show', $hospital->id) }}" class="card-footer overflow-scroll p-1">
                                        {{ $hospital->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>