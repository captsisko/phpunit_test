<?php

use PHPUnit\Framework\TestCase;

/**
 * WeatherMonitorTest
 * @group group
 */
class WeatherMonitorTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }
    
    /** @test */
    public function AccurateAverageTemperatureIsReturned()
    {
        // Test
        $map = [
            ['12:00', 20],
            ['14:00', 26]
        ];
        $service = $this->createMock(TemperatureService::class);
        $service->expects($this->exactly(2))
                ->method('getTemperature')
                ->will($this->returnValueMap($map));
        
        $weatherMonitor = new WeatherMonitor($service);
        
        $this->assertEquals(23, $weatherMonitor->getAverageTemperature('12:00', '14:00'));
    }

}
