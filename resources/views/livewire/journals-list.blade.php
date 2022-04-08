<div class="border border-dark rounded m-2 p-2">
    <p>JOURNALS</p>
    <div>
        @forelse($journals as $journal)
            <a class="p-1" href="#" :wire:key="{{ $journal->id }}"
            wire:click.prevent="goToJournal({{ $journal->id }})">
            {{-- $emit signale qu'un évènement redirectToJournal est lancé " --}}
                {{ $journal->name }}
            </a>
        @empty

            <p>Aucun Journal</p>
        @endforelse
    </div>
</div>




