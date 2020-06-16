<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SiteSettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SiteSettingsTable Test Case
 */
class SiteSettingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SiteSettingsTable
     */
    protected $SiteSettings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SiteSettings',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SiteSettings') ? [] : ['className' => SiteSettingsTable::class];
        $this->SiteSettings = TableRegistry::getTableLocator()->get('SiteSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SiteSettings);

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
