<?php

namespace Tests\Feature\Config;

use App\Models\Config;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * 
     * 更改网站配置的接口
     *
     * @return void
     * @test
     */
    public function updateSiteConfiguration()
    {
        $response = $this->put('/api/config/site',[
            'name' => '后盾人',
            'tel'  => 'aa613113'
        ]);

        $response->assertSee('aa613113');
    }
}
