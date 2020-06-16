<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticleAttributeHeadersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticleAttributeHeadersTable Test Case
 */
class ArticleAttributeHeadersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticleAttributeHeadersTable
     */
    protected $ArticleAttributeHeaders;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ArticleAttributeHeaders',
        'app.Articles',
        'app.ArticleAttributes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArticleAttributeHeaders') ? [] : ['className' => ArticleAttributeHeadersTable::class];
        $this->ArticleAttributeHeaders = TableRegistry::getTableLocator()->get('ArticleAttributeHeaders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ArticleAttributeHeaders);

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
