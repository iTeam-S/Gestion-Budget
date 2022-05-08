
    <div id="lightbox" class="hidden">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <button id="create" class="btn btn-primary btn-block btn-large">creer une écriture</button>
        </div>
    </div>
    <div class="hidden" id="lightbox-create">
        <form id="ecriture-post" method="post" action="{{ route("ecritures.store") }}" class="m-3" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="utilisateur" value="{{ Auth::user() }}">
            <div class="grid grid-cols-2">
                <div>
                    <input type="text" class="border-2 rounded-md h-14" name="somme" id="somme" placeholder="montant en ariary" required="required" />
                </div>
                <div>
                    <input type="date" class="border-2 rounded-md h-14" id="date" name="date" />
                </div>
                <div>
                    <div class="border-2">
                        <label>compte</label>
                    </div>
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
                    <div class="border-2">
                        <label>compte</label>
                    </div>
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
                    <div class="border-2">
                        <label>type</label>
                    </div>
                    <select class="custom-select" name="type" id="type">
                        <option selected>Choisir ...</option>
                        <option value="1">entrant</option>
                        <option value="0">sortant</option>
                    </select>
                </div>
            </div>

            <div class="my-2">
                <textarea name="motif" id="motif" class="border-2 rounded-md w-100" rows="10" id="motif" placeholder="motif"></textarea>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <div class="drop-zone w-100">
                    <span class="drop-zone__prompt">Déposez le fichier ici ou cliquez pour télécharger</span>
                    <input type="file" name="attachment" id="attachment" class="drop-zone__input">
                </div>
            </div>


            <div class="m-3 d-flex justify-content-center">
                <button type="submit" class="btn">valider</button>
            </div>
        </form>
    </div>
