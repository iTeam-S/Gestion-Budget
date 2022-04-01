<div>
<div  class="border-bottom border-secondary">
    <h1>Capital</h1>
    <p>{{ number_format($capital, 2, ",", " ") }} Ariary</p>
</div>

<div  class="pt-3 border-bottom border-secondary">
    <h1>Journals</h1>
    
    <div class="row">
        @forelse ($journals as $journal) 
            <a href="#"
            :wire:key="{{ $journal->id }}"
            wire:click.prevent="journalIndex({{ $journal->id }})">
            {{-- $emit signale qu'un évènement redirectToJournal est lancé " --}}

                {{ $journal->name }}
            </a>
        @empty
            <p>Aucun Journal</p>
        @endforelse
    </div>
</div>

<div class="row py-5">
    @foreach ($journals as $journal)
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-center">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Budget entrant</p>
                                <h5 class="font-weight-bolder mb-0">
                                    $53,000
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>


