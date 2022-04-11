<div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h3>Créer un écriture</h3> </div>
                    <div class="card-body">
                        <form action="#" wire:submit.prevent='submit'>
                            @csrf
                            <!-- Champ montant -->
                            <div class="border">
                                <label for="amount">Montant</label>
                                <input type="text" wire:model="amount" id="amount">
                            </div>
                            <div class="row py-2">
                                <div class="col-6">
                                    <label for="amount"><h5><strong>Date</strong></h5></label>
                                    <input class="w-100" type="date" name="date" id="date">
                                </div>

                                <div class="col-6">
                                    <label for="account"><h5><strong>Justificatif</strong></h5></label>
                                    <input class="w-100" type="file" name="justification" id="fustification" multiple>
                                </div>
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
