<?php

namespace Xmansher\BasicToolsets;

class ArrayFunction
{
    /**
     * 如果两个数组项在与顺序无关的字符量上是相等的, 则返回true; 否则返回false.
     *
     * @param mixed[] $set1
     * @param mixed[] $set2
     *
     * @return bool
     */
    public function arrayCompareEquals(array $set1, array $set2) : bool
    {
        return array_diff($set1, $set2) == array_diff($set2, $set1);
    }

    /**
     * 如果子集$subset是集合$set的真子集, 则返回true
     *
     * @param mixed[] $set
     * @param mixed[] $subset
     *
     * @return bool
     */
    public function arrayIsSubset(array $set, array $subset) : bool
    {
        return !array_diff($subset, array_intersect($subset, $set));
    }

    /**
     * 如果一维子集$subset是二维集合$set的元素, 则返回true
     *
     * @param mixed[][] $set
     * @param mixed[]   $subset
     *
     * @return bool
     */
    public function contains(array $set, array $subset) : bool
    {
        return (bool) array_filter($set, function ($entry) use ($subset) {
            return $this->arrayCompareEquals($entry, $subset);
        });
    }


}