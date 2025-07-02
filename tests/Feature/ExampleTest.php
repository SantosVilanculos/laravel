<?php

declare(strict_types=1);

use Illuminate\Http\Response;

it('returns a successful response', function (string $path): void {
    $this->get($path)->assertStatus(Response::HTTP_OK);
})->with([
    '/',
    '/up',
    '/log-viewer',
]);
