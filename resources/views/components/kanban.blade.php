
    @if(isset($ecriture))
        <div class="kanban__element">
            <details class="border-2 rounded-md mb-2">
                <summary>
                    <div>
                        <h3>
                            {{ $ecriture->motif ?? "vide" }}
                        </h3>
                        <span>voir details</span>
                    </div>
                </summary>
                <div>
                    <div class="mb-3 row justify-content-between">
                        <div class="col-6">
                            <img src="{{url(asset($ecriture->attachment)) }}" alt="pièce jointe" />
                        </div>
                        <div class="col-6 d-flex align-items-center">
                            <div id="descripttion">
                                <div class="row justify-content-between">
                                    <div class="col-6">{{ $ecriture->amount }} Ar</div>
                                    <div class="col-6 text-end">
                                        {{ $ecriture->updated_at }}</div>
                                </div>
                                <div class="my-1"> Motif<br/>{{ $ecriture->motif }}</div>
                                <div class="row justify-content-between">
                                    <div class="col-6">@php echo $ecriture->type ? "entrant": "sortant"; @endphp</div>
                                    <div class="col-6 text-end">{{ $ecriture->account->name }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </details>
        </div>



    @elseif(isset($notification) && $group=="administrateur")
    <div class="kanban__element">
        <details class="border-2 rounded-md mb-2">
            <summary>
                <div>
                    <h3>
                        {{ $notification["notifier"]["name"] ?? "lead"}} a indexé un ecriture
                    </h3>
                    <span>voir details</span>
                </div>
            </summary>
            <div>
                <div class="mb-3 row justify-content-between">
                    <div class="col-6">
                        <img src="{{ url(asset($notification["ecriture"]["attachment"])) }}" alt="pièce jointe" />
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <div id="descripttion">
                            <div class="row justify-content-between">
                                <div class="col-6">{{ $notification["ecriture"]["somme"] }} Ar</div>
                                <div class="col-6 text-end">
                                    {{ $notification["ecriture"]["updated_at"] ?? "sans date" }}</div>
                            </div>
                            <div class="my-1"> Motif<br/>{{ $notification["ecriture"]["motif"] }}</div>
                            <div class="row justify-content-between">
                                <div class="col-6">@php echo $notification["ecriture"]["type"] ? "entrant": "sortant"; @endphp</div>
                                {{--<div class="col-6 text-end">{{ $notification->account->name }}</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="flex justify-center">
                        <button class="btn" onclick="validerEcriture( {{ json_encode($notification) }} )">valider</button>
                    </div>

                    <div class="flex justify-center">
                        <button class="btn" onclick="annulerEcriture( {{ json_encode($notification) }} )">annuler</button>
                    </div>
                </div>
                <div class="loader hidden">
                    <img class="loader__image" src="{{ asset("storage/loader.gif") }}" />
                </div>
            </div>
        </details>
    </div>

    @elseif(isset($notification) && $group=="lead")
    <details class="border-2 rounded-md mb-2">
        <summary>
            <div>
                <h3>
                    {{ $notification["notifier"]["name"] ?? "admin"}} a validé voter ecriture
                </h3>
                <span>voir details</span>
            </div>
        </summary>
        <div>
            <div class="mb-3 row justify-content-between">
                <div class="col-6">
                    <img src="{{ url(asset($notification["ecriture"]["attachment"])) }}" alt="pièce jointe" />
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div id="descripttion">
                        <div class="row justify-content-between">
                            <div class="col-6">{{ $notification["ecriture"]["somme"] }} Ar</div>
                            <div class="col-6 text-end">
                                {{ $notification["ecriture"]["updated_at"] ?? "sans date" }}</div>
                        </div>
                        <div class="my-1"> Motif<br/>{{ $notification["ecriture"]["motif"] }}</div>
                        <div class="row justify-content-between">
                            <div class="col-6">@php echo $notification["ecriture"]["type"] ? "entrant": "sortant"; @endphp</div>
                            {{--<div class="col-6 text-end">{{ $notification->account->name }}</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </details>

    @endif
