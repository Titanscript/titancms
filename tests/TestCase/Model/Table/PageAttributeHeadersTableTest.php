<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PageAttributeHeadersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PageAttributeHeadersTable Test Case
 */
class PageAttributeHeadersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PageAttributeHeadersTable
     */
    protected $PageAttributeHeaders;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PageAttributeHeaders',
        'app.Pages',
        'app.PageAttributes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PageAttributeHeaders') ? [] : ['className' => PageAttributeHeadersTable::class];
        $this->PageAttributeHeaders = TableRegistry::getTableLocator()->get('PageAttributeHeaders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PageAttributeHeaders);

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
