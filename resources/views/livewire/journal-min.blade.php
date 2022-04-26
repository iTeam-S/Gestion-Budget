
@extends("layouts.app")


@section("content")

<div class="m-5 search__container">
    <div class="search position-relative">
        <div class="container">
            <input type="text" placeholder="ecriture">
            <div class="search"></div>
        </div>
    </div>
</div>


<div class="row justify-content-around">
    <div class="journal col-lg-5 border  h-100 m-3">
        <div class="d-flex justify-content-between align-items-center m-2">
            <div class="journal__title">ENTRANT</div>
            <button type="button" class="journal__button btn btn-outline-success">ajouter</button>
        </div>
        <div class="journal__writings">
            <div class="d-flex justify-content-center">
                <div class="writings">
                    @forelse ($entrees as $entry)
                        <div class="d-flex justify-content-between journal__writing my-2">
                            <div id={{ $entry->id }} class="entry d-flex writing">
                                <div class="left-side p-2">
                                    <div class="img">
                                        <img src="{{ url(asset("storage/writing.png")) }}" alt="writing" />
                                    </div>
                                </div>

                                <div class="right-side">
                                    <div class='amount text-end'>
                                        <span style="border-bottom: 1px solid #dee2e6">{{ $entry->amount }} Ariary</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="motif" style="max-width: 60%;">{{ $entry->motif }}</div>
                                        <div class="text-end">{{ $entry->account->name }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="journal__edition d-flex align-items-center">
                                <button type="button" id="detail-{{$entry->id }}" onclick="detailsEcriture({{$entry->id}})" class="journal__button btn btn-outline-success mx-1">details</button>
                            </div>
                        </div>
                    @empty
                        <div>vide</div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="pt-2 d-flex justify-content-end">
            {!! $entrees->links()!!}
        </div>
    </div>
    <div class="journal col-lg-5 border  h-100 m-3">
        <div class="d-flex justify-content-between align-items-center m-2">
            <div class="journal__title">SORTANT</div>
            <button type="button" class="journal__button btn btn-outline-success">ajouter</button>
        </div>
        <div class="journal__writings">
            <div class="d-flex justify-content-center">
                <div class="writings writings--r">
                    @forelse ($outgoings as $entry)
                        <div class="d-flex justify-content-between journal__writing my-2">
                            <div id={{ $entry->id }} class="entry d-flex writing">
                                <div class="left-side p-2">
                                    <div class="img">
                                        <img src="{{ url(asset("storage/writing.png")) }}" alt="writing" />
                                    </div>
                                </div>

                                <div class="right-side">
                                    <div class='amount text-end'>
                                        <span style="border-bottom: 1px solid #dee2e6">{{ $entry->amount }} Ariary</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="motif" style="max-width: 60%;">{{ $entry->motif }}</div>
                                        <div class="text-end">{{ $entry->account->name }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="journal__edition d-flex align-items-center">
                                <button type="button" id="detail-{{$entry->id }}" onclick="detailsEcriture({{$entry->id}})" class="journal__button btn btn-outline-success mx-1">details</button>
                            </div>
                        </div>
                    @empty
                        <div>vide</div>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="pt-2 d-flex justify-content-end">
            {!! $outgoings->links()!!}
        </div>
    </div>
</div>

@endsection

@section("script")
<script>

    $(document).ready(function(){


        $(document).on("click", "#detail-8", function(){

            // avoir la page details
            $.get("http://localhost:8000/journal/detail/8", function(data){

                $(".writings.writings--r").html(data);
                window.history.pushState({}, '' , "/journal/detail/8")

            })
        })
    });

</script>

@endsection
