
        <div>
            <div class="container pb-5">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-3 d-flex align-items-center">Entrées</div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-success"
                                        wire:click="addEntry">
                                            Ajouter
                                        </button>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                @if($entrees != null && $entrees->count() > 0)
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">
                                                    <span class="text-center">Ecriture</span>
                                                </th>
                                                <th scope="col">
                                                    <span class="text-center">Motif</span>
                                                </th>
                                                <th scope="col">
                                                    <span class="text-center">Comptes</span>
                                                </th>
                                                <th scope="col">
                                                    <span class="text-center">Numéro bancaire</span>
                                                </th>
                                                <th scope="col">
                                                    <span class="text-center">Facture</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($entrees as $entry)
                                            <tr>
                                                <td>{{ number_format($entry->amount, 2, ',', ' ')  }}</td>
                                                <td>{{ $entry->motif }}</td>
                                                <td>{{ $entry->account->name }}</td>
                                                <td>{{ $entry->account->code }}</td>

                                                <td>
                                                    <span>
                                                        @php echo $bool = isset($entry->attachment) ? 'oui': 'non' @endphp
                                                    </span>
                                                    <a href="" :wire:key="{{ $entry->id }}"
                                                    wire:click.prevent="showEntry({{ $entry->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 voir-plus" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <p>vide</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row justify-content-between">
                                    <div class="col-3 d-flex align-items-center">Sorties</div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <button type="button" class="btn btn-success">Ajouter</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                @if($outgoings != null && $outgoings->count() > 0)
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">
                                                    <span class="text-center">Ecriture</span>
                                                </th>
                                                <th scope="col">
                                                    <span class="text-center">Motif</span>
                                                </th>
                                                <th scope="col">
                                                    <span class="text-center">Comptes</span>
                                                </th>
                                                <th scope="col">
                                                    <span class="text-center">Numéro bancaire</span>
                                                </th>
                                                <th scope="col">
                                                    <span class="text-center">Facture</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($outgoings as $outgoing)
                                            <tr>
                                                <td>{{ number_format($outgoing->amount, 2, ',', ' ')  }}</td>
                                                <td>{{ $outgoing->motif }}</td>
                                                <td>{{ $outgoing->account->name }}</td>
                                                <td>{{ $outgoing->account->code }}</td>

                                                <td>
                                                    <span>
                                                        @php echo $bool = isset($outgoing->attachment) ? 'oui': 'non' @endphp
                                                    </span>
                                                    <a href="" :wire:key="{{ $entry->id }}"
                                                    wire:click.prevent="showEntry({{ $entry->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 voir-plus" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <p>vide</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
