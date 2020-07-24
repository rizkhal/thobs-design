<?php

namespace Tests\Unit\Helpers;

use Tests\TestCase;

class HelperTest extends TestCase
{
    /**
     * @test
     * @group u-helper
     */
    public function configUrl()
    {
        $expected = config('shortener.hash_length');
        $actual   = urlConfig('hash_length');

        $this->assertSame($expected, $actual);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @group u-helper
     */
    public function convertDate()
    {
        $expected = date('d F Y');
        $actual   = convert_date($expected);

        $this->assertSame($expected, $actual);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @group u-helper
     * @dataProvider removeSchemes
     */
    public function urlRemoveScheme($expected, $actual)
    {
        $this->assertSame($expected, urlRemoveScheme($actual));
        $this->assertEquals($expected, urlRemoveScheme($actual));
    }

    public function removeSchemes()
    {
        return [
            ['laravel.com', 'laravel.com'],
            ['laravel.com', 'http://laravel.com'],
            ['laravel.com', 'https://laravel.com'],
            ['laravel.com', 'http://www.laravel.com'],
            ['laravel.com', 'https://www.laravel.com'],
            ['github.com/rizkhal', 'https://github.com/rizkhal'],
        ];
    }

    /**
     * @test
     * @group u-helper
     * @dataProvider readableInt
     */
    public function numberFormatShort($expected, $actual)
    {
        $this->assertSame($expected, numberFormatShort($actual));

        $intOrString = numberFormatShort($actual);

        if (is_int($intOrString)) {
            $this->assertIsInt($intOrString);
        } else {
            $this->assertIsString($intOrString);
        }
    }

    public function readableInt()
    {
        return [
            ['12', 12],
            ['12', 12.3],

            ['1K', pow(10, 3)],
            ['10K', pow(10, 4)],
            ['100K', pow(10, 5)],
            ['12.34K+', 12345],

            ['1M', pow(10, 6)],
            ['10M', pow(10, 7)],
            ['100M', pow(10, 8)],
            ['99.99M+', 99997092],

            ['1B', pow(10, 9)],
            ['10B', pow(10, 10)],
            ['100B', pow(10, 11)],
            ['1.23B+', 1234567890],

            ['1T', pow(10, 12)],
            ['10T', pow(10, 13)],
            ['100T', pow(10, 14)],
            ['1.23T+', 1234567890000],
        ];
    }
}
