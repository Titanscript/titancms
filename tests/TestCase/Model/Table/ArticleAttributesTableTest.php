<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticleAttributesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticleAttributesTable Test Case
 */
class ArticleAttributesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticleAttributesTable
     */
    protected $ArticleAttributes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.ArticleAttributes',
        'app.ArticleAttributeHeaders',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ArticleAttributes') ? [] : ['className' => ArticleAttributesTable::class];
        $this->ArticleAttributes = TableRegistry::getTableLocator()->get('ArticleAttributes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->ArticleAttributes);

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
