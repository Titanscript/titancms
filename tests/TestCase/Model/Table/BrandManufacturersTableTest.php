<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BrandManufacturersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BrandManufacturersTable Test Case
 */
class BrandManufacturersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BrandManufacturersTable
     */
    protected $BrandManufacturers;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BrandManufacturers',
        'app.Brands',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BrandManufacturers') ? [] : ['className' => BrandManufacturersTable::class];
        $this->BrandManufacturers = TableRegistry::getTableLocator()->get('BrandManufacturers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BrandManufacturers);

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
}
