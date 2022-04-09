<div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un écriture</div>
                    <div class="card-body">
                        <form action="#" wire:submit.prevent='submit'>
                            @csrf
                            <!-- Champ montant -->
                            <div class="border">
                                <label for="amount">Montant</label>
                                <input type="text" wire:model="amount" id="amount">
                            </div>

                            <!-- fin Champ montant -->

                            <!-- Champ motif -->
                            <div>
                                <label for="motif">Motif</label><br/>
                                <textarea class="w-100" wire:model="motif" id="motif" cols="30" rows="5"></textarea>
                            </div>

                            <!-- fin Champ motif -->


                            <!-- Champ selection compte -->
                            <div class="border">
                                <label for="account">Compte</label>
                                <input type="text" wire:model="account" id="account">
                            </div>

                            <!-- fin Champ selection compte -->

                            <!-- Champ journals -->
                            {{-- passé automatiquement donc à hider --}}
                            <input type="hidden" wire:model='journal' value="{{ 1 }}" />

                            <!-- fin Champ journals -->


                            <!-- submit button -->
                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" class="btn btn-success">
                                    Ajouter
                                </button>
                            </div>

                            <!-- submit button -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
