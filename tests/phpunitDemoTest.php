<?php

use PHPUnit\Framework\TestCase;

class phpunitDemoTest extends TestCase
{

    // 1 PHPUnit 依赖关系示例

    public function testProducerFirst(): string
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testProducerSecond(): string
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @param string $a 依赖于testProducerFirst的返回值
     * @param string $b 依赖于testProducerSecond的返回值
     *
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer(string $a, string $b): void
    {
        $this->assertSame('first', $a);
        $this->assertSame('second', $b);
    }

    // 2 数据供给器

    /**
     * @dataProvider additionProvider
     * @param int $a
     * @param int $b
     * @param int $expected
     * @return void
     */
    public function testAdd(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function additionProvider(): array
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 3],
        ];
    }

    // 3 命名数据集

    /**
     * @dataProvider namedProvider
     * @param int $a
     * @param int $b
     * @param int $expected
     * @return void
     */
    public function testAdd2(int $a, int $b, int $expected): void
    {
        $this->assertSame($expected, $a + $b);
    }

    public function namedProvider(): array
    {
        return [
            'zero zero zero' => [0, 0, 0],
            'zero one one' => [0, 1, 1],
            'one zero one' => [1, 0, 1],
            'one one three' => [1, 1, 3],
        ];
    }


}