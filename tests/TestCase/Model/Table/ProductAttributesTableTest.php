<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductAttributesTable Test Case
 */
class ProductAttributesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductAttributesTable
     */
    protected $ProductAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductAttributes',
        'app.ProductAttributeHeaders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductAttributes') ? [] : ['className' => ProductAttributesTable::class];
        $this->ProductAttributes = TableRegistry::getTableLocator()->get('ProductAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductAttributes);

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
