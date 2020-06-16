<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BrandsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BrandsTable Test Case
 */
class BrandsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BrandsTable
     */
    protected $Brands;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Brands',
        'app.BrandManufacturers',
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
        $config = TableRegistry::getTableLocator()->exists('Brands') ? [] : ['className' => BrandsTable::class];
        $this->Brands = TableRegistry::getTableLocator()->get('Brands', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Brands);

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
