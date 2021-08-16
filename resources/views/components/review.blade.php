<div style="margin-bottom: 2rem; margin-top: 2rem">
    <div class="card">
        <div class="row d-flex">
            <div class=""> <img class="profile-pic" src="https://i.imgur.com/V3ICjlm.jpg"> </div>
            <div class="d-flex flex-column">
                <h3 class="mt-2 mb-0">{{$username}}</h3>
                <div>
                    <p class="text-left"><span class="text-muted">4.0</span>
                        @for($i = 1; $i <= 5 ;$i++)
                            @if($i <= $rating)
                                <span class="fa fa-star star-active"></span>
                            @else
                                <span class="fa fa-star star-inactive"></span>
                            @endif
                        @endfor
                </div>
            </div>
            <div class="ml-auto">
                <p class="text-muted pt-5 pt-sm-3">{{$date}}</p>
            </div>
        </div>
        <div class="row text-left">
            <h4 class="mt-3">{{$content}}</h4>
        </div>
    </div>
</div>
