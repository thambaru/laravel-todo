    <?php

    use Carbon\Carbon;
    ?>

    <x-app-layout>

        <div class="container">
            <div class="d-flex flex-wrap">
                @foreach($days as $day => $todos)
                <div class="p-1 mt-10" style="  flex: 1 20%;">
                    <h3 class="mb-2">{{Carbon::parse($day)->format('l (d)')}}</h3>
                    @if($todos->count() != 0)
                    @foreach($todos as $todo)
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><b>Task:</b>
                                <hr>{{$todo->body}}
                            </p>
                            <h6 class="card-text mt-2 text-muted">Assigned By:
                                <hr>
                            </h6>
                            <h6 class="card-subtitle my-2 text-muted">{{$todo->assigned_by}}</h6>
                            @if(Auth::check())
                            <button class="btn btn-primary mt-3"><i class="fa fa-pencil-square-o"></i> Edit</button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="card bg-light">
                        <div class="card-body">
                            <p class="card-text text-muted text-center"> Empty Slot </p>
                        </div>
                    </div>
                    @endif
                </div>
                @if(Carbon::parse($day)->dayOfWeek % 5 == 0)
                <div class="clearfix"></div>
                @endif
                @endforeach
            </div>
        </div>

    </x-app-layout>