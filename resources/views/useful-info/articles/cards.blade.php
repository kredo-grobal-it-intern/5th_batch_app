<div class="col-9 mt-5">
    <!-- Upper side -->
                <div class="row">
            <!-- Amusement -->
                    <div class="col"  style="background-color:rgba(250, 202, 123, 1);">
                        <div class="row gx-2">
                            @foreach($all_articles as $article)
                                <div class="col-5 mx-auto mt-4 card p-0">
                                    <a href="{{ route('article.show', $article) }}" class="card-body">
                                        {{$article->image}}
                                    </a>
                                    <a href="" class="card-footer">
                                        {{$article->title}}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
        <!-- cafe -->
                    <div class="col ms-4" style="background-color:rgba(255, 222, 104, 1);">
                        <div class="row p-3">
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                        </div>
                        <div class="row p-3">
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- lower side -->
                <div class="row mt-4">
                    <div class="col" style="background-color:rgba(224, 241, 244, 1);">
            <!-- dogrun -->
                        <div class="row p-3">
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                        </div>
                        <div class="row p-3">
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                        </div>
                    </div>
                    
        <!-- Hospital -->
                    <div class="col ms-4" style="background-color:rgba(240, 150, 160, 1);">
                        <div class="row p-3">
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                        </div>
                        <div class="row p-3">
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                            <div class="col-1"></div>
                            <div class="col card p-0">
                                <div class="card-body">
                                    img
                                </div>
                                <div class="card-footer">
                                    Animal Cafe
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>