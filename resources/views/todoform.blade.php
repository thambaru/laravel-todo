<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body" class="align-middle">
                    <h5 class="card-title font-weight-bold">Add Task</h5>
                    <form>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-12 col-lg-3 text-lg-right">
                                <label for="body" class="col-form-label">Description</label>
                            </div>
                            <div class="col">
                                <input id="body" class="form-control">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-12 col-lg-3 text-lg-right">
                                <label for="assigned-by" class="col-form-label">Assigned By</label>
                            </div>
                            <div class="col">
                                <input id="assigned-by" class="form-control">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-12 col-lg-3 text-lg-right">
                                <label for="from-date" class="col-form-label">Starting Date</label>
                            </div>
                            <div class="col">
                                <input id="from-date" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-12 col-lg-3 text-lg-right">
                                <label for="to-date" class="col-form-label">Ending Date</label>
                            </div>
                            <div class="col">
                                <input id="to-date" class="form-control datepicker">
                            </div>
                        </div>
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(".datepicker").datepicker({
            altField: "#to-date"
        });
    });
</script>