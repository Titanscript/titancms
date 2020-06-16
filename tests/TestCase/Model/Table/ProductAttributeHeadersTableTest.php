<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductAttributeHeadersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductAttributeHeadersTable Test Case
 */
class ProductAttributeHeadersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductAttributeHeadersTable
     */
    protected $ProductAttributeHeaders;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ProductAttributeHeaders',
        'app.Products',
        'app.ProductAttributes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ProductAttributeHeaders') ? [] : ['className' => ProductAttributeHeadersTable::class];
        $this->ProductAttributeHeaders = TableRegistry::getTableLocator()->get('ProductAttributeHeaders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ProductAttributeHeaders);

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
