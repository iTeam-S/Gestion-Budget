
<div class="dd d-flex justify-content-around">
    @foreach ($journals as $journal)

    <ol class="kanban To-do todo--container">
        <div class="kanban__title">
            <h2>{{ $journal->name }}</h2>
        </div>
        <li class="dd-item" data-id="1">
            <h3 class="title dd-handle" style="border-bottom: 1px solid black;
            margin-bottom: 20px;" >
                Description
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" style="color: tan;
                width: 20px;"fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
              </svg>
            </h3>

            <i class="material-icons" id="label blue">Total journals</i>
            <div class="actions">
                <i class="material-icons" id="color">derniere ecriture</i>
            </div>
        </li>
    </ol>

    @endforeach

  </div>
