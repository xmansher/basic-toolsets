<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * @covers \Xmansher\BasicToolsets\ArrayFunction
 */
final class ArrayFunctionTest extends TestCase
{
    /**
     * @dataProvider compareEqualsProvider
     * @param array $a
     * @param array $b
     * @param bool $expected
     * @return void
     */
    public function testArrayCompareEquals(array $a, array $b, bool $expected)
    {
        $arrayFunction = new \Xmansher\BasicToolsets\ArrayFunction();
        $this->assertSame($expected, $arrayFunction->arrayCompareEquals($a, $b));
    }

    public function compareEqualsProvider(): array
    {
        return [
            [
                ['@#$', '%^&', '*()'],
                ['*()', '@#$', '%^&'],
                true
            ],
            [
                ['@#$1', '%^&', '*()'],
                ['*()', '@#$', '%^&'],
                false
            ],
            [
                ['@#$1', '%^&'],
                ['*()', '@#$', '%^&'],
                false
            ],
            [
                ['alpha', 'beta', 'meta'],
                ['alpha', 'meta', 'beta'],
                true
            ],
            [
                ['alpha', 'beta', 'meta'],
                ['meta', 'alpha', 'beta'],
                true
            ],
            [
                ['meta', 'beta', 'alpha'],
                ['beta', 'alpha', 'meta'],
                true
            ],
            [
                ['alpha', 'beta', 'alpha'],
                ['beta', 'alpha', 'meta'],
                false
            ],
            [
                ['alpha', 'beta', 'meta'],
                ['alpha', 'alpha', 'meta'],
                false
            ],
            [
                ['alpha', 'alpha', 'alpha'],
                ['alpha', 'alpha', 'alpha'],
                true
            ],
            [
                ['哈', '皮', '猫'],
                ['皮', '猫', '哈'],
                true
            ],
            [
                [0, 0, 0],
                [0, intval('a'), intval('b')],
                true
            ],
            [
                [0, 0, 0],
                [0, '0', '0'],
                true
            ],
            [
                [0.01, 0.01, 0.01],
                ['0.01', '0.01', '0.01'],
                true
            ],
        ];
    }
}
