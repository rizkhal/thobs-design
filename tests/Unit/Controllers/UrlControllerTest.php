<?php

namespace Tests\Unit\Controllers;

use App\Models\Url;
use Tests\TestCase;

class UrlControllerTest extends TestCase
{
    protected function getRoute()
    {
        return route("admin.shortener.create");
    }

    protected function postRoute()
    {
        return route("admin.shortener.store");
    }

    /**
     * @test
     * @group u-controller
     */
    public function urlUsingCustomKey()
    {
        $this->loggedAyuIn();

        config()->set("shortener.hash_length", 6);

        $longUrl   = "https://laravel.com";
        $customKey = "ayu";

        $response = $this
            ->from($this->getRoute())
            ->post($this->postRoute(), [
                "long_url"   => $longUrl,
                "custom_key" => $customKey,
            ]);

        $url = Url::where('long_url', $longUrl)->first();

        // assertTrue doesnt not work
        // with return true with $url->is_custom
        // $this->assertTrue($url->is_custom);

        $this->assertSame("1", $url->is_custom);
        $this->assertSame($customKey, $url->keyword);
        $response->assertSessionHas('notice');
    }
}
