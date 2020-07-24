<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlControllerTest extends TestCase
{
    /**
     * @test
     * @group f-controller
     */
    public function shortenUrl()
    {
        $this->assertTrue(true);
    }
}
