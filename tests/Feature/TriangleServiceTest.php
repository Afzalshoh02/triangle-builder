<?php

namespace Tests\Feature;

use App\Services\TriangleService;
use Tests\TestCase;

class TriangleServiceTest extends TestCase
{
    private TriangleService $triangleService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->triangleService = app(TriangleService::class);
    }

    public function test_valid_triangle_with_9_elements()
    {
        $result = $this->triangleService->buildTriangle(9);

        $this->assertNotNull($result);
        $this->assertCount(3, $result);
        $this->assertEquals('   1', $result[0]);
        $this->assertEquals('  2 3 4', $result[1]);
        $this->assertEquals(' 5 6 7 8 9', $result[2]);
    }

    public function test_invalid_triangle_with_12_elements()
    {
        $result = $this->triangleService->buildTriangle(12);
        $this->assertNull($result);
    }
}
