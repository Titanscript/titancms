<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\UtilsComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\UtilsComponent Test Case
 */
class UtilsComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\UtilsComponent
     */
    protected $Utils;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Utils = new UtilsComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Utils);

        parent::tearDown();
    }
}
