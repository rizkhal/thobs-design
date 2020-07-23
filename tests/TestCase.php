<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Support\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication,
        RefreshDatabase;
}
