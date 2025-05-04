# Laravel Minimum Bug Reproduction

## Implicit Route Binding

### The Problem:
When registering routes in a service provider's `boot()` method using `$this->loadRoutesFrom(...)`
We don't get access to the route bindings. Leading to things like enums trying to be instantiated,
or models not being looked for and loaded, or Verbs states being newed up instead of loaded by ID.

### The Reproduction:
- Create `app/Concerns/Demonstration` directory
- Create `DemonstrationEnum` string backed enum
- Create a route in `app/Concerns/Demonstration/routes/web.php` that's implicitly bound to this enum
- Create `DemonstrationServiceProvider` that simply loads this web routes file in the `boot()` method.
- Register provider in `bootstrap/providers.php`
- Write test in `test/Feature/ImplicitEnumBindingTest.php`

### The Demonstration:
Simply run `php artisan test` to see the test fail. For sanity, I've also added commented out a line in `routes/web.php` to load the exact same file. If you comment that line back in, and comment out the line loading the routes in the `DemonstrationServiceProvider`, the test passes.


```php
// app/Concerns/Demonstration/routes/web.php
Route::get('/demonstration/{demonstration_enum}', function (DemonstrationEnum $demonstration_enum) {
    return $demonstration_enum->value;
})->name('demonstration');
```

```php
// tests/Feature/ImplicitEnumBindingTest.php
#[Test]
public function demonstration(): void
{
    $this->get(route('demonstration', [
        'demonstration_enum' => DemonstrationEnum::FIRST,
    ]))
        ->assertOk()
        ->assertSee(DemonstrationEnum::FIRST->value);
}
```
