@extends('layouts.user_type.auth')

@section('content')

    <div class="mt-4">
        <div class="mb-4">
            <div>
                <div class="py-3 mb-3 bg-gradient-dark border-radius-lg pe-1">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-4">
                <div class="p-1">
                    <div class="carte carte--statistique">
                        <h3>Capital</h3>
                        <div id="capital"></div>
                    </div>
                </div>

                <div class="p-1">
                    <div class="carte carte--statistique">
                        <h3>Nombre ecritures</h3>
                        <div id="nombre_ecriture"></div>
                    </div>
                </div>
                <div class="p-1">
                    <div class="carte carte--statistique">
                        <h3>Nombre journals</h3>
                        <div id="nombre_journal"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('dashboard')
    <script src="{{ url(asset("assets/js/functions/dashboard.js")) }}"></script>
@endpush

