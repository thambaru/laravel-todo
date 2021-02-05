<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body" class="align-middle">
                    <h5 class="card-title font-weight-bold"><span class="form-type">Add</span> Task</h5>
                    <form id="todo-form" method="POST" action="{{route('todo.store')}}" data-default-action="{{route('todo.store')}}">
                        <input type="hidden" name="_method" value="post" />
                        @csrf
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-12 col-lg-3 text-lg-right">
                                <label for="body" class="col-form-label">Description</label>
                            </div>
                            <div class="col">
                                <input id="body" class="form-control" name="body" autocomplete="off" required>
                            </div>
                            <div class="offset-lg-3 col-12 col-lg-9">
                                @error('body')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-12 col-lg-3 text-lg-right">
                                <label for="assigned-by" class="col-form-label">Assigned By</label>
                            </div>
                            <div class="col">
                                <input id="assigned-by" class="form-control" name="assigned_by">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-12 col-lg-3 text-lg-right">
                                <label for="start-date" class="col-form-label">Starting Date</label>
                            </div>
                            <div class="col">
                                <input id="start-date" class="form-control datepicker" name="start_date">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-12 col-lg-3 text-lg-right">
                                <label for="end-date" class="col-form-label">Ending Date</label>
                            </div>
                            <div class="col">
                                <input id="end-date" class="form-control datepicker" name="end_date">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col text-right">
                                <button id="clear-form" class="btn btn-light"><i class="fa fa-times"></i> Clear</button>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <span class="form-type">Add</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>