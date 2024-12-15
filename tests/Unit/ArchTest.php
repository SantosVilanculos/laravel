<?php

describe('arch', function () {
    arch()->preset()->php();
    arch()->preset()->security();

    arch()->expect('App')->toUseStrictTypes();
    arch()->expect('Database\Factories')->toUseStrictTypes();
    arch()->expect('Database\Seeders')->toUseStrictTypes();

    arch()->expect('App')->classes()->not->toBeFinal();
    arch()->expect('Database\Factories')->classes()->not->toBeFinal();
    arch()->expect('Database\Seeders')->classes()->not->toBeFinal();

    arch()->expect('App\Http\Controllers')->toExtendNothing();
});
