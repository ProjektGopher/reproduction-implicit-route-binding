<?php

namespace Tests\Feature;

use App\Concerns\Demonstration\Enums\DemonstrationEnum;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ImplicitEnumBindingTest extends TestCase
{
    #[Test]
    public function demonstration(): void
    {
        $this->get(route('demonstration', [
            'demonstration_enum' => DemonstrationEnum::FIRST,
        ]))
            ->assertOk()
            ->assertSee(DemonstrationEnum::FIRST->value);
    }
}
