<x-app-layout>

    <div class="container">
        <div class="row mt-10">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        @if(Auth::check())
                        <button class="btn btn-primary mt-3"><i class="fa fa-pencil-square-o"></i> Edit</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>