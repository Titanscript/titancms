<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PartnersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PartnersTable Test Case
 */
class PartnersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PartnersTable
     */
    protected $Partners;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Partners',
        'app.Medias',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Partners') ? [] : ['className' => PartnersTable::class];
        $this->Partners = TableRegistry::getTableLocator()->get('Partners', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Partners);

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
