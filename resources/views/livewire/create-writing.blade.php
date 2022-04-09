<div>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h3>Créer un écriture</h3> </div>
                    <div class="card-body">
                        <form action="POST">
                            <div class="row py-2">
                                <div class="col-6">
                                    <label for="amount"> <h5><strong>Montant</strong></h5></label>
                                    <input class="w-100" type="text" name="amount" id="amount">
                                </div>

                                <div class="col-6">
                                    <label for="account"><h5><strong>Compte</strong></h5></label>
                                    <input class="w-100" type="text" name="account" id="account">
                                </div>
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

                            <div>
                                <label for="motif"><h5><strong>Motif</strong></h5></label><br/>
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
