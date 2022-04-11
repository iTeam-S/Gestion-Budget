<div>
    <h1>LEAD</h1>
    <p>Nombre : {{ $unreads->count() }}</p>
    <section class="bg-dark rounded py-2 px-4">
        @forelse($unreads as $unread)
        <div class="text-white">{{ $unread }}</div>
        <div class="row border p-2 my-2 bg-light">
            <div class="col-sm-6">
                @foreach ($unread->data as $data )
                    <p>Hello</p>

                @endforeach

                <p>Message du lead</p>
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <button class="btn-success rounded px-2" style="max-height: 40px;">details</button>
            </div>
        </div>
        @empty
            <p>vide</p>

        @endforelse
    </section>
</div>
