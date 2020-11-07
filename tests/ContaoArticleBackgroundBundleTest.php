<?php

/*
 * This file is part of Contao Article Background Bundle.
 *
 * (c) Aurelio Gisler (Xippo GmbH)
 *
 * @license LGPL-3.0-or-later
 */

namespace XippoGmbH\ContaoArticleBackgroundBundle\Tests;

use XippoGmbH\ContaoArticleBackgroundBundle\ContaoArticleBackgroundBundle;
use PHPUnit\Framework\TestCase;

class ContaoArticleBackgroundBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoSkeletonBundle();

        $this->assertInstanceOf('XippoGmbH\ContaoArticleBackgroundBundle\ContaoArticleBackgroundBundle', $bundle);
    }
}
