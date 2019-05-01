<?php

/**
 * This file is part of the TchoulomViewCounterBundle package.
 *
 * @package    TchoulomViewCounterBundle
 * @author     Original Author <tchoulomernest@yahoo.fr>
 *
 * (c) Ernest TCHOULOM <https://www.tchoulom.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tchoulom\ViewCounterBundle\Tests\DependencyInjection;

use Tchoulom\ViewCounterBundle\DependencyInjection\TchoulomViewCounterExtension;
use Tchoulom\ViewCounterBundle\Tests\BaseTest;

/**
 * Class TchoulomViewCounterExtensionTest
 */
class TchoulomViewCounterExtensionTest extends BaseTest
{
    protected $viewCounterExtension;

    /**
     * Setup the fixtures.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->viewCounterExtension = new TchoulomViewCounterExtension();
    }

    /**
     * tearDown
     */
    public function tearDown()
    {
        parent::tearDown();

        $this->viewCounterExtension = null;
    }

    /**
     * tests postProcessSuccess
     *
     * @dataProvider postProcessProvider
     */
    public function testPostProcessSuccess($configs)
    {
        $uniqueElt = $this->viewCounterExtension->postProcess($configs);

        $this->assertTrue(is_array($uniqueElt));
    }

    /**
     * tests postProcessError
     *
     * @expectedException \Tchoulom\ViewCounterBundle\Exception\RuntimeException
     * @expectedExceptionMessage You must choose one of the following values: increment_each_view, unique_view, daily_view, hourly_view, weekly_view, monthly_view.
     */
    public function testPostProcessError($configs = null)
    {
        $this->viewCounterExtension->postProcess($configs);
    }

    /**
     * @return array
     */
    public function postProcessProvider()
    {
        return [
            [
                [
                    ['view_interval' => ['daily_view' => 1]]
                ]
            ]
        ];
    }
}