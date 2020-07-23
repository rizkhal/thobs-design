<?php

namespace Tests\Unit\Helpers;

use Tests\TestCase;

class HelperTest extends TestCase
{
    /**
     * @group u-helper
     */
    public function testConfigUrl()
    {
        $expected = config('shortener.hash_length');
        $actual = urlConfig('hash_length');

        $this->assertSame($expected, $actual);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @group u-heler
     */
    public function testConvertDate()
    {
        $expected = date('d F Y');
        $actual = convert_date($expected);

        $this->assertSame($expected, $actual);
        $this->assertEquals($expected, $actual);
    }
}
