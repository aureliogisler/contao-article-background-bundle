<?php
/**
 * This file is part of a Xippo GmbH Contao Article Background Bundle.
 *
 * (c) Aurelio Gisler (Xippo GmbH)
 *
 * @author     Aurelio Gisler
 * @package    ContaoArticleBackground
 * @license    MIT
 * @see        https://github.com/xippoGmbH/contao-article-background-bundle
 *
 */
namespace XippoGmbH\ContaoArticleBackgroundBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use XippoGmbH\ContaoArticleBackgroundBundle\ContaoArticleBackgroundBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoArticleBackgroundBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
