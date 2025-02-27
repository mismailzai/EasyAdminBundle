<?php

namespace EasyCorp\Bundle\EasyAdminBundle\Tests\Field\Configurator;

use EasyCorp\Bundle\EasyAdminBundle\Field\Configurator\CommonPreConfigurator;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Tests\Field\AbstractFieldTest;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

class CommonPreConfiguratorTest extends AbstractFieldTest
{
    protected function setUp(): void
    {
        parent::setUp();

        /** @var PropertyAccessorInterface $propertyAccessor */
        $container = self::$kernel->getContainer()->get('test.service_container');
        $propertyAccessor = $container->get(PropertyAccessorInterface::class);
        $this->configurator = new CommonPreConfigurator($propertyAccessor);
    }

    public function testShouldKeepExistingValue()
    {
        $field = Field::new('foo')->setValue('bar');

        $this->assertSame('bar', $this->configure($field)->getValue());
    }

    public function testShouldKeepExistingFormattedValue()
    {
        $field = Field::new('foo')->setFormattedValue('bar');

        $this->assertSame('bar', $this->configure($field)->getFormattedValue());
    }
}
