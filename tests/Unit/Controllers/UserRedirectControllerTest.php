<?php

namespace Tests\Unit\Controllers;

use App\Models\Url;
use App\Models\Visit;
use Tests\TestCase;

class UserRedirectControllerTest extends TestCase
{
    /**
     * @test
     * @group u-controller
     */
    public function urlRedirection()
    {
        $url = factory(Url::class)->create();

        $response = $this->get(url("/") . "/" . $url->keyword);
        $response->assertRedirect($url->long_url);
        $response->assertStatus(urlConfig("redirect_status_code"));

            $this->assertCount(1, Visit::all());
        }
    }
