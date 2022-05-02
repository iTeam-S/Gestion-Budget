
<form id="form" class="m-3">
    <div class="row align-items-center justify-content-between">
        <div class="col-lg-6">
            <input type="text" name="u" id="user" placeholder="montant en ariary" required="required" />
        </div>
        <div class="col-lg-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">compte</label>
                </div>
                <select class="custom-select" id="account">
                    <option selected>Choisir...</option>
                    @foreach($accounts as $account)
                        <option value="{{$account->id }}">{{ $account->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-6">
        <textarea name="description" class="h-100" id="description" placeholder="description"></textarea>
    </div>

    <div class="col-6 d-flex justify-content-center">
        <div class="drop-zone">
            <span class="drop-zone__prompt">Déposez le fichier ici ou cliquez pour télécharger</span>
            <input type="file" name="myFile" class="drop-zone__input">
        </div>
    </div>
</div>


<div class="d-flex justify-content-center m-3">
    <button type="submit" class="btn btn-primary btn-block btn-large">valider</button>
</div>

</form>


