<?php

use PHPUnit\Framework\TestCase;
use Collect\Collect;

class CollectTest extends TestCase
{
    public function test_count_returns_correct_number()
    {
        $collect = new Collect([13, 17]);
        $this->assertSame(2, $collect->count());
    }


    public function test_pop_removes_last_element()
    {
        $collection = new Collect([10, 20, 30, 40]);

        $result = $collection->pop();

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([10, 20, 30], $collection->toArray());
    }

    public function test_pop_on_empty_collection_does_not_fail()
    {
        $collection = new Collect([]);

        $result = $collection->pop();

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals([], $collection->toArray());
    }

    public function test_keys_returns_collection_of_keys()
    {
        $collection = new Collect(['name' => 'Alex', 'age' => 25, 'city' => 'Moscow']);

        $keys = $collection->keys();

        $this->assertInstanceOf(Collect::class, $keys);
        $this->assertEquals(['name', 'age', 'city'], $keys->toArray());
    }

    public function test_first_returns_first_element()
    {
        $collection = new Collect([100, 200, 300, 400]);

        $this->assertEquals(100, $collection->first());
    }

    public function test_first_on_empty_collection_returns_null()
    {
        $collection = new Collect([]);

        $this->assertNull($collection->first());
    }

    public function test_splice_removes_elements_by_index()
{
    $collection = new Collect([10, 20, 30, 40, 50]);

    $result = $collection->splice(1, 2);

    $this->assertInstanceOf(Collect::class, $result);
    $this->assertEquals([10, 40, 50], $collection->toArray());
}

    public function test_splice_removes_one_element()
    {
        $collection = new Collect(['a', 'b', 'c', 'd', 'e']);

        $result = $collection->splice(2, 1);

        $this->assertInstanceOf(Collect::class, $result);
        $this->assertEquals(['a', 'b', 'd', 'e'], $collection->toArray());
    }

    public function test_chain_keys_and_first_works_correctly()
    {
        $collection = new Collect(['first' => 10, 'second' => 20, 'third' => 30]);

        $this->assertEquals('first', $collection->keys()->first());
    }
}