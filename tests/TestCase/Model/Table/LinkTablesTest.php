<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LinkTables;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LinkTables Test Case
 */
class LinkTablesTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LinkTables
     */
    protected $LinkTables;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Links') ? [] : ['className' => LinkTables::class];
        $this->LinkTables = TableRegistry::getTableLocator()->get('Links', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->LinkTables);

        parent::tearDown();
    }
}
