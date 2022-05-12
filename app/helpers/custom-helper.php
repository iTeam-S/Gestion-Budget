<?php

use Illuminate\Support\Facades\DB;

/**
 *
 * renvoie le nom de tous les colonnes du table correspondante
 * @return array
 */
function get_table_columns(string $connection, string $table): array{

    $columns= DB::connection($connection)
        ->select("SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = :table", [
            "table"=> $table
        ]);

    return $columns;
}
