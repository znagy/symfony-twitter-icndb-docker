<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class KernelTest extends KernelTestCase
{

    public function testKernelWorks()
    {
        self::bootKernel();

        $this->assertTrue(true);
    }
}