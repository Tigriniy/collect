<?php

use PHPUnit\Framework\TestCase;
use Collect\Collect;

class CollectTest extends TestCase
{
    // Примерный тест из оригинального файла (оставляем)
    public function testCount()
    {
        $collect = new Collect([13, 17]);
        $this->assertSame(2, $collect->count());
    }

    // ==================== Тесты для варианта 4 ====================

    /** @test */
    public function test_pop_removes_last_element()
    {
        $collection = new Collect([10, 20, 30, 40]);

        $result = $collection->pop();

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([10, 20, 30], $collection->toArray());
    }

    /** @test */
    public function test_pop_on_empty_collection()
    {
        $collection = new Collect([]);

        $result = $collection->pop();

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([], $collection->toArray());
    }

    /** @test */
    public function test_keys_returns_new_collection_with_keys()
    {
        $collection = new Collect(['name' => 'Alex', 'age' => 25, 'city' => 'Moscow']);

        $keys = $collection->keys();

        $this->assertInstanceOf(Collect::class, $keys);
        $this->assertEquals(['name', 'age', 'city'], $keys->toArray());
    }

    /** @test */
    public function test_first_returns_first_element()
    {
        $collection = new Collect([100, 200, 300, 400]);

        $first = $collection->first();

        $this->assertEquals(100, $first);
    }

    /** @test */
    public function test_first_on_empty_collection()
    {
        $collection = new Collect([]);

        $first = $collection->first();

        $this->assertNull($first);
    }

    /** @test */
    public function test_splice_removes_elements_by_index_and_length()
    {
        $collection = new Collect([10, 20, 30, 40, 50]);

        $result = $collection->splice(1, 2);

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([10, 50], $collection->toArray());
    }

    /** @test */
    public function test_splice_removes_one_element()
    {
        $collection = new Collect(['a', 'b', 'c', 'd', 'e']);

        $result = $collection->splice(2, 1);

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals(['a', 'b', 'd', 'e'], $collection->toArray());
    }

    /** @test */
    public function test_chain_keys_and_first()
    {
        $collection = new Collect(['first' => 10, 'second' => 20, 'third' => 30]);

        $firstKey = $collection->keys()->first();

        $this->assertEquals('first', $firstKey);
    }
}