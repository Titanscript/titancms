<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductGroupsTable Test Case
 */
class ProductGroupsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductGroupsTable
     */
    protected $ProductGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductGroups',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductGroups') ? [] : ['className' => ProductGroupsTable::class];
        $this->ProductGroups = TableRegistry::getTableLocator()->get('ProductGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductGroups);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
