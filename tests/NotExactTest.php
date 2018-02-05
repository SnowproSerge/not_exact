<?php
/**
 * Created by PhpStorm.
 * User: uzhass
 * Date: 21.09.16
 * Time: 14:52
 */

namespace Snowserge\NotExactTest;
use PHPUnit\Framework\TestCase;
use Snowserge\NotExact\NotExact;


class NotExactTest extends TestCase
{
       /**
     * @var NotExact
     */
    protected $object;
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object=new NotExact();
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    public function providerApproximate()
    {
        return [
            [11,'11'],
            [61,'61'],
            [100,'100'],
            [111,'Более сотни'],
            [590,'Более пяти сотен'],
            [1250,'Более тысячи'],
            [7250,'Более семи тысяч'],
            [22250,'Более двух десятков тысяч'],
            [99250,'Около ста тысяч'],
            [992501,'Около миллиона'],
            [1992501,'Более миллиона'],
            [9925011,'Около десяти миллионов']
        ];
    }

    /**
     * @dataProvider providerApproximate
     * @param int $in
     * @param string $out
     * @throws \Exception
     */
    public function testApproximateValues($in, $out)
    {
          $this->assertEquals($this->object->approximateValues($in),$out);
    }
}
