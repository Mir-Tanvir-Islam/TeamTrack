@include('layouts.cssimports')

    <div class="page-header row no-gutters py-0">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">ALL TEAMS MASTERVIEW</span>
        </div>
    </div>

    @if(count($teams)>0)
        @foreach($teams as $team)
        <div class="well card m-3 p-3">
            <h3><a href="/teams/{{$team->id}}">{{$team->name}}</a></h3>
                <h5> 
                    {{ App\User::find($team->leader_id)->name }}
                </h5>
                @foreach($team->users as $user)
                     {{$user->id}} : {{$user->name}} <br>
                @endforeach
        </div>
        @endforeach
    @else
    <p> No Teams Found</p>
    @endif

@include('layouts.jsimports')