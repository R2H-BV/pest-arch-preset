<?php
declare(strict_types = 1);

pest()->presets()->custom('r2h', fn (): array => [
    // Controllers should not extend any base controller.
    expect('App\Http\Controllers')
        ->toBeClasses()
        ->toExtendNothing(),

    // Policies should not use the HandlesAuthorization trait.
    expect('App\Policies')
        ->toBeClasses()
        ->not->toUseTraits('Illuminate\Auth\Access\HandlesAuthorization'),

    // Notifications should be queueable at any time.
    expect('App\Notifications')
        ->toBeClasses()
        ->toImplement('Illuminate\Contracts\Queue\ShouldQueue'),

    // Listeners must have a suffix and a handle method.
    expect('App\Listeners')
        ->toBeClasses()
        ->toHaveSuffix('Listener')
        ->toHaveMethod('handle'),

    // Actions must have a suffix and a handle method.
    expect('App\Actions')
        ->toBeClasses()
        ->toHaveSuffix('Action')
        ->toHaveMethod('handle'),

    // Jobs must have a suffix.
    expect('App\Jobs')
        ->toBeClasses()
        ->toHaveSuffix('Job'),

    // Any contracts must be an interface.
    expect('App\Contracts')->toBeInterfaces(),

    // Data classes must have a suffix.
    expect('App\Data')
        ->toBeClasses()
        ->toHaveSuffix('Data'),

    // Enums must be enums.
    expect('App\Enums')->toBeEnums(),

    // Observers must have a suffix.
    expect('App\Observers')
        ->toBeClasses()
        ->toHaveSuffix('Observer'),
]);
