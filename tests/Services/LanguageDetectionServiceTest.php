<?php

namespace Tests\Services;

use Tests\TestCase;

class LanguageDetectionServiceTest extends TestCase
{
    public function testGetInstance()
    {
        /** @var  \App\Services\LanguageDetectionServiceInterface $service */
        $service = \App::make(\App\Services\LanguageDetectionServiceInterface::class);
        $this->assertNotNull($service);
    }

    public function testNormalize()
    {
        /** @var  \App\Services\LanguageDetectionServiceInterface $service */
        $service = \App::make(\App\Services\LanguageDetectionServiceInterface::class);
        $this->assertNotNull($service);

        $locale = $service->normalize('gb');
        $this->assertEquals('gb', $locale);

        $locale = $service->normalize('VN');
        $this->assertEquals('vn', $locale);

        $locale = $service->normalize('hage');
        $this->assertEquals('gb', $locale);
    }

    public function testDetect()
    {
        /** @var  \App\Services\LanguageDetectionServiceInterface $service */
        $service = \App::make(\App\Services\LanguageDetectionServiceInterface::class);
        $this->assertNotNull($service);

        $locale = $service->detect('gb');
        $this->assertEquals('gb', $locale);
    }
}
