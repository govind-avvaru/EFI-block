<?php

namespace Efi\Caves\Test\Unit\Block\Adminhtml;

use Efi\Caves\Block\Adminhtml\Selector;
use Efi\CaptureData\Model\ResourceModel\CaptureDataCaves\CollectionFactory;

class SelectorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CollectionFactory|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $CollectionFactory;
    /**
     * @var Selector
     */

    protected $block;
    /**
     * Set up
     * @return void
     */
    protected function setUp(): void
    {
        $this->CollectionFactory = $this->getMockBuilder(CollectionFactory::class)
            ->disableOriginalConstructor()
            ->setMethods(['create'])
            ->getMockForAbstractClass();

        $this->objectManager = new ObjectManager($this);

        $this->block = $this->objectManager->getObject(
            Selector::class,
            [
                'CollectionFactory' => $this->CollectionFactory
            ]
        );
    }
    /**
     * Test for getCavesData method
     */
    public function testgetCavesData()
    {
        $getCavesDataId=1;
        $expected=[];
        $this->block->expects($this->once())
            ->method('getCavesDataId')
            ->willReturn($getCavesDataId);

        $this->assertEquals($expected,json_decode($this->block->getCavesData()));

    }
}
