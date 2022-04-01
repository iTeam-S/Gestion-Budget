
<div class="container">
    <div class="row">
        <div class="col-md-6 border">
            <img src="{{ url('storage/img/attachment.png') }}" alt="pièce jointe" class="w-100 h-100"/>
        </div>

        <div class="col-md-6 border">
            <div class="rounded border p-2 m-2">
                <h5>Montant</h5>
                <span class="text-lg">{{ number_format($writing->amount, 2, ",", " ") }}</span> Ariary
            </div>
            
            <div class="row justify-content-around">
                <div class="col-md-5 rounded border p-2 m-2">
                    <h4>Compte</h4>
                    <p>{{ $account->name }}<br/>
                    {{ $account->code }}
                </p>
                </div>
                <div class="col-md-5 rounded border p-2 m-2">
                    <h4>Motif</h4>
                    <p>{{ $writing->motif }}</p>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button type="button" class="btn btn-success" wire:click="test">
                    Modifier
                </button>
            </div>
        </div>
    </div>
</div>