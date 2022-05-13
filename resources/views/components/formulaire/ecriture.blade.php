
    <div id="lightbox" class="hidden">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <button id="create" class="btn btn-primary btn-block btn-large" style="border-radius:20px; text-align:center;">Créer une écriture</button>
        </div>
    </div>
    
    <div class="hidden" id="lightbox-create" style="padding:10px; background-color:#008080; border-radius:20px; flex-items:center;">
    <h1 style="font-size:35px; text-align:center; color:white; text-weight:bolder; ">Nouvelle écriture</h1>
        <form id="ecriture-post" method="post" action="{{ route("ecritures.store") }}" class="m-3" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="utilisateur" value="{{ Auth::user() }}">
            <div class="grid grid-cols-2">
                <div>
                    <label for="" style="font-weight:bold;"> Montant </label> <br>
                    <input type="text" class="border-2 rounded-md h-14" name="somme" id="somme" placeholder="montant en ariary" required="required" />
                </div>
                <div>
                    <label for="Date" style="font-weight:bold;">Date d'écriture</label> <br>
                    <input type="date" class="border-2 rounded-md h-14" id="date" name="date" />
                </div>
                <div>
                    <label style="font-weight:bold;">Compte</label> <br>
                    <select class="custom-select" name="account" id="account_id">
                        <option selected>Choisir ...</option>
                        @forelse($accounts as $account)
                            <option value="{{$account->id }}">{{ $account->name }}</option>
                        @empty
                            <option value="value">Compte</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label style="font-weight:bold;">Type de journal</label> <br>
                    <select class="custom-select" name="journal" id="journal_id">
                        <option selected>Choisir ...</option>
                        @forelse($journals as $journal)
                            <option value="{{$journal->id }}">{{ $journal->name }}</option>
                        @empty
                            <option value="value">Journal</option>
                        @endforelse
                    </select>
                </div>
                <div>
                    <label style="font-weight:bold;">Type de l'écriture</label> <br>
                    <select class="custom-select" name="type" id="type">
                        <option selected>Choisir ...</option>
                        <option value="1">Entrant</option>
                        <option value="0">Sortant</option>
                    </select>
                </div>
            </div>

            <div class="my-2">
                <label style="font-weight:bold;">Motifs</label> <br>
                <textarea name="motif" id="motif" class="border-2 rounded-md w-100" rows="10" id="motif" placeholder="motif"></textarea>
            </div>
            <label style="font-weight:bold;">Justificatifs</label> <br>
            <div class="d-flex justify-content-center align-items-center">
                <div class="drop-zone w-100">
                    <span class="drop-zone__prompt">Déposez le fichier ici ou cliquez pour télécharger</span>
                    <input type="file" name="attachment" id="attachment" class="drop-zone__input">
                </div>
            </div>


            <div class="m-3 d-flex justify-content-center">
                <button type="submit" class="btn">Valider</button>
            </div>
        </form>
    </div>
