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
        ->toImplement('Illuminate\Contracts\Queue\ShouldQueue')
        ->toHaveSuffix('Notification'),

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
        ->toImplement('Illuminate\Contracts\Queue\ShouldQueue')
        ->ignoring('App\Jobs\Middleware')
        ->toHaveSuffix('Job')
        ->ignoring('App\Jobs\Middleware')
        ->toHaveMethod('handle')
        ->ignoring('App\Jobs\Middleware'),
    // Any contracts must be an interface.
    expect('App\Contracts')->toBeInterfaces(),

    // Enums must be enums.
    expect('App\Enums')->toBeEnums(),

    // Observers must have a suffix.
    expect('App\Observers')
        ->toBeClasses()
        ->toHaveSuffix('Observer'),

    // Concerns must be traits.
    expect('App\Concerns')->toBeTraits(),

    // The exceptions must have a suffix.
    expect('App\Exceptions')
        ->toBeClasses()
        ->toExtend('Throwable')
        ->toHaveSuffix('Exception'),

    // The mailables must have a suffix.
    expect('App\Mail')
        ->toBeClasses()
        ->toExtend('Illuminate\Mail\Mailable')
        ->toImplement('Illuminate\Contracts\Queue\ShouldQueue')
        ->toHaveSuffix('Mail'),

    // Custom casts must have a suffix.
    expect('App\Casts')
        ->toBeClasses()
        ->toImplement('Illuminate\Contracts\Database\Eloquent\CastsAttributes')
        ->toHaveSuffix('Cast'),

    // The `config`-function should not be used. The facade should.
    expect('config')->not->toBeUsed(),

    // Any debug functions should not be used.
    expect([
        'dd',
        'ddd',
        'dump',
        'env',
        'exit',
        'ray',
    ])->not->toBeUsed(),

    /**
     * Spatie Event Sourcing
     */
    // The aggregates must have a suffix.
    expect('App\Aggregates')
        ->toBeClasses()
        ->toExtend('Spatie\EventSourcing\AggregateRoots\AggregateRoot')
        ->toHaveSuffix('Aggregate'),
    // The projectors must have a suffix.
    expect('App\Projectors')
        ->toBeClasses()
        ->toExtend('Spatie\EventSourcing\EventHandlers\Projectors\Projector')
        ->toHaveSuffix('Projector'),
    // The reactors must have a suffix.
    expect('App\Reactors')
        ->toBeClasses()
        ->toExtend('Spatie\EventSourcing\EventHandlers\Reactors\Reactor')
        ->toHaveSuffix('Reactor'),
]);
