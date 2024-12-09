<?php

arch()
    ->expect('App')
    ->toUseStrictTypes()
    ->not->toUse(['die', 'dd', 'dump', 'var_dump']);

arch()
    ->expect('App\Controllers')
    ->toHaveSuffix('Controller');

// arch()
//     ->expect('App\Enums')
//     ->toBeEnums();
