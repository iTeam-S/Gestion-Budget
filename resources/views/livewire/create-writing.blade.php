<div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Créer un écriture</div>
                    <div class="card-body">
                        <form action="POST">
                            <div class="row py-2">
                                <div class="col-6">
                                    <label for="amount">Montant</label>
                                    <input class="w-100" type="text" name="amount" id="amount">
                                </div>

                                <div class="col-6">
                                    <label for="account">Compte</label>
                                    <input class="w-100" type="text" name="account" id="account">
                                </div>
                            </div>

                            <div>
                                <label for="motif">Motif</label><br/>
                                <textarea class="w-100" name="motif" id="motif" cols="30" rows="5"></textarea>
                            </div>

                            <div class="d-flex justify-content-center pt-3">
                                <button type="submit" class="btn btn-success"
                                wire:click.prevent
                                >Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
