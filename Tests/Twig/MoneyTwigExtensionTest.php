<?php


namespace Dothiv\Bundle\MoneyFormatBundle\Tests\Twig\Extension;

use Dothiv\Bundle\MoneyFormatBundle\Service\MoneyFormatService;
use Dothiv\Bundle\MoneyFormatBundle\Service\NumberFormatService;
use Dothiv\Bundle\MoneyFormatBundle\Twig\Extension\MoneyFormatTwigExtension;

/**
 * Test for the money and decimalMoney Twig Filters.
 *
 * @author Markus Tacker <m@tld.hiv>
 */
class MoneyFormatTwigExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @group BaseWebsiteBundle
     * @group TwigExtension
     * @group MoneyFormatService
     */
    public function itShouldBeInstantiable()
    {
        $this->assertInstanceOf('\Dothiv\Bundle\MoneyFormatBundle\Twig\Extension\MoneyFormatTwigExtension', $this->getTestObject());
    }

    /**
     * @test
     * @group        BaseWebsiteBundle
     * @group        TwigExtension
     * @group        MoneyFormatService
     * @depends      itShouldBeInstantiable
     */
    public function itShouldFormatMoney()
    {
        $this->assertEquals('500.000,00 €', $this->getTestObject()->money(array('locale' => 'en'), '500000', 'de'));
    }

    /**
     * @test
     * @group        BaseWebsiteBundle
     * @group        TwigExtension
     * @group        MoneyFormatService
     * @depends      itShouldBeInstantiable
     */
    public function itShouldFormatDecimalMoney()
    {
        $this->assertEquals('500.000 €', $this->getTestObject()->decimalMoney(array('locale' => 'en'), '500000', 'de'));
    }

    /**
     * @return MoneyFormatTwigExtension
     */
    protected function getTestObject()
    {
        return new MoneyFormatTwigExtension(new MoneyFormatService(new NumberFormatService()));
    }
}
