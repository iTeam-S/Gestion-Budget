<script src="{{ asset('js/app.js') }}" defer></script>
<form id="form" class="m-3" enctype="multipart/form-data">
    <div class="row align-items-center justify-content-between">
        <!-- prix -->
        <div class="col-lg-6">
            <input type="text" name="u" id="amount" placeholder="montant en ariary" required="required" />
        </div>
        <!-- ---- -->

        <!-- select compte -->
        <div class="col-lg-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="account">compte</label>
                </div>
                <select class="custom-select" id="account">
                    <option selected>Choisir...</option>
                    @foreach($accounts as $account)
                        <option value="{{$account->id }}">{{ $account->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!------------------>
    </div>

<div class="row">

    <!-- motif -->
    <div class="col-lg-6">
        <textarea name="description" class="h-100" id="motif" placeholder="motif"></textarea>
    </div>
    <!----------->

    <!-- attachment -->
    <div class="col-6 d-flex justify-content-center">
        <div class="drop-zone">
            <span class="drop-zone__prompt">Déposez le fichier ici ou cliquez pour télécharger</span>
            <input type="file" name="myFile" id="attachment" class="drop-zone__input">
        </div>
    </div>
    <!---------------->
</div>


<div class="d-flex justify-content-center m-3">
    <button type="submit" class="btn btn-primary btn-block btn-large">valider</button>
</div>
</form>


