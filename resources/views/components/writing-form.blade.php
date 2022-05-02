 @extends("layouts.app")

 @section("head")
    @include("includes.head")
@endsection

@section("navbar")
    @include("includes.navbar")
@endsection


@section("content")
 <div class="container">
    <h1 style="font-weight: 700 !important; border-bottom: 1px solid #008080;">Créer une écriture</h1>
    <form id="form-entrant" method="post" action="{{ route("writing.create") }}" class="m-3" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-4">
                <input type="text" name="amount" id="user" placeholder="montant en ariary" required="required" />
            </div>
            <div class="col-4">
                <input type="date" id="date" name="date" />
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">compte</label>
                    </div>
                    <select class="custom-select" name="account" id="account">
                        <option selected>Choisir...</option>
                        @foreach($accounts as $account)
                            <option value="{{$account->id }}">{{ $account->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="my-2">
            <textarea name="motif" class="w-100" rows="10" id="motif" placeholder="motif"></textarea>
        </div>

        <div class="d-flex justify-content-center align-items-center">
            <div class="drop-zone w-100">
                <span class="drop-zone__prompt">Déposez le fichier ici ou cliquez pour télécharger</span>
                <input type="file" name="attachment" class="drop-zone__input">
            </div>
        </div>


        <div class="d-flex justify-content-center m-3">
                <button type="submit" class="btn btn-primary btn-block btn-large">valider</button>
        </div>
    </form>
</div>

@endsection

@section("script")

@endsection




