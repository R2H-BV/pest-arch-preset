<?php
declare(strict_types = 1);

pest()->preset('r2h', fn (): array => [
    // Controllers should not extend any base controller.
    expect('App\Http\Controllers')->toExtendNothing(),

    // Policies should not use the HandlesAuthorization trait.
    expect('App\Policies')->not->toUseTraits('Illuminate\Auth\Access\HandlesAuthorization'),

    // Notifications should be queueable at any time.
    expect('App\Notifications')->toImplement('Illuminate\Contracts\Queue\ShouldQueue'),

    // Listeners must have a suffix and a handle method.
    expect('App\Listeners')->toHaveSuffix('Listener')->toHaveMethod('handle'),

    // Actions must have a suffix and a handle method.
    expect('App\Actions')->toHaveSuffix('Action')->toHaveMethod('handle'),

    // Jobs must have a suffix.
    expect('App\Jobs')->toHaveSuffix('Job'),

    // Any contracts must be an interface.
    expect('App\Contracts')->toBeInterfaces(),

    // Services must have a suffix.
    expect('App\Services')->toHaveSuffix('Service'),

    // Data classes must have a suffix.
    expect('App\Data')->toHaveSuffix('Data'),
]);
