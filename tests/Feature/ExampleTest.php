<?php

declare(strict_types=1);

use Illuminate\Testing\TestResponse;

it('returns a successful response', function (): void {
    /** @var TestResponse */
    $response = $this->get('/');

    $response->assertRedirectToRoute('login');
});
