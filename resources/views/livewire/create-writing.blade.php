<div>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <p>NOUVELLE ECRITURE</p>
                    </div>
                    <div class="card-body">
                        <form action="#" wire:submit.prevent='submit' enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="w-100">
                                    <p><label for="amount">MONTANT</label></p>
                                    <input type="text" class="w-100" id="amount" required
                                    wire:model="amount">
                                </div>
                                <div>
                                    <p><label for="motif">MOTIF</label></p>
                                    <textarea class="w-100" id="motif" cols="30" rows="5" required
                                    wire:model="motif"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="drop-zone">
                                    <span class="p-1 drop-zone__prompt">Drop file here or click to upload</span>
                                     <input type="file" name="myFile" class="drop-zone__input" required
                                     wire:model="attachment">
                                </div>
                            </div>
                        </div>

                             <div class="row">
                                 <div class="col-lg-4">
                                    <p>COMPTE</p>
                                    <!-- account -->
                                    <select wire:model="account" required>
                                        <option value="">Choisir un compte</option>
                                        @foreach ($accounts as $account)
                                            <option value="{{ $account->name }}" required>{{ $account->name }}</option>

                                        @endforeach
                                    </select>


                                 </div>

                                 <div class="col-lg-4">
                                    <p>JOURNAL</p>
                                    <select wire:model='journal' required>
                                        <option value="">Choisir un journal</option>
                                        @foreach ($journals as $journal)
                                                <option value={{ $journal->id }} required>{{ $journal->name }}</option>

                                        @endforeach
                                    </select>

                                 </div>

                                 <div class="col-lg-4">
                                    <p>TYPE D' ECRITURE</p>
                                    <select wire:model="type" required>
                                        <option value="">Choisir un type</option>
                                            <option value="1" >entrant</option>
                                            <option value="0">sortant</option>

                                    </select>

                                 </div>
                             </div>

                            <!-- submit button -->
                            <div class="d-flex justify-content-center m-5">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                            <!-- submit button -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
