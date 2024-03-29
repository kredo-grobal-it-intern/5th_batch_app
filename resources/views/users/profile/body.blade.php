<div class="container">
    <div class="row justify-content-center">
        <!-- Tabs navs -->
        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
            <a
            class="nav-link active"
            id="ex3-tab-1"
            data-mdb-toggle="tab"
            href="#ex3-tabs-1"
            role="tab"
            aria-controls="ex3-tabs-1"
            aria-selected="true"
            >Post</a
            >
        </li>
        <li class="nav-item" role="presentation">
            <a
            class="nav-link"
            id="ex3-tab-2"
            data-mdb-toggle="tab"
            href="#ex3-tabs-2"
            role="tab"
            aria-controls="ex3-tabs-2"
            aria-selected="false"
            >Event</a
            >
        </li>
        <li class="nav-item" role="presentation">
            <a
            class="nav-link"
            id="ex3-tab-3"
            data-mdb-toggle="tab"
            href="#ex3-tabs-3"
            role="tab"
            aria-controls="ex3-tabs-3"
            aria-selected="false"
            >Like</a
            >
        </li>
        </ul>
        <!-- Tabs navs -->

        <!-- Tabs content -->
        <div class="tab-content" id="ex2-content">
            <div
                class="tab-pane fade show active"
                id="ex3-tabs-1"
                role="tabpanel"
                aria-labelledby="ex3-tab-1"
            >
                <div style="margin-top: 100px">
                    @if ($user->posts->isNotEmpty())
                        <div class="row">
                            @foreach ($user->posts as $post)
                                <a href="">
                                    <img src="{{ asset('/storage/images/'.$post->image) }}" style="height: 250px" alt="">
                                </a>
                            @endforeach
                        </div>
                    @else
                        <h3 class="text-muted text-center">No posts yet</h3>
                    @endif
                </div>
            </div>
            <div
                class="tab-pane fade"
                id="ex3-tabs-2"
                role="tabpanel"
                aria-labelledby="ex3-tab-2"
            >
                <div style="margin-top: 100px">
                    @if ($all_events->isNotEmpty())
                        <div class="accordion" id="accordionExample">
                            @foreach ($all_events as $event)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button
                                        class="accordion-button"
                                        type="button"
                                        data-mdb-toggle="collapse"
                                        data-mdb-target={{"#collapse" . $event->id }}
                                        aria-expanded="true"
                                        aria-controls={{"collapse" . $event->id }}
                                    >
                                        {{ $event->title }}
                                    </button>

                                    <div id={{"collapse" . $event->id }} class="accordion-collapse collapse" aria-labelledby="headingOne" data-mdb-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {{ $event->body }}
                                        </div>
                                    </div>
                                    </h2>
                                </div>
                            @endforeach
                            </div>
                    @else
                        <h3 class="text-muted text-center">No events yet</h3>
                    @endif
                </div>
            </div>
            <div
                class="tab-pane fade"
                id="ex3-tabs-3"
                role="tabpanel"
                aria-labelledby="ex3-tab-3"
            >
                <div style="margin-top: 100px">
                    {{-- @if ($user->likes->isNotEmpty())
                        <ul class="list-group">
                            @foreach ($user->likes->posts as $like)
                                <li class="list-group-item">
                                    {{ $like->body }}
                                </li>
                            @endforeach
                        </ul>
                    @else --}}
                        <h3 class="text-muted text-center">This feature has not yet been implemented</h3>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
        <!-- Tabs content -->
    </div>
</div>
