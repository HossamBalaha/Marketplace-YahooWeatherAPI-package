<?php

namespace Test\Functional;

class YahooWeatherAPITest extends BaseTestCase {
    
    public function testGetWeatherForecast() {
        
        $var = '{
                    "args": {
                            "location": "kyiv",
                            "filter": "wind"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/YahooWeatherAPI/getWeatherForecast', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
}
