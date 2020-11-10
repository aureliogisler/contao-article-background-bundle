<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');
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


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'] = [ 'protected', 'published', 'background_switch', 'addImage', 'overwriteMeta' ];
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace('keywords;','keywords;{article_background},addImage;', $GLOBALS['TL_DCA']['tl_article']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_article']['subpalettes']['addImage'] = 'singleSRC,size,floating,imagemargin,fullsize,overwriteMeta';
$GLOBALS['TL_DCA']['tl_article']['subpalettes']['overwriteMeta'] = 'alt,imageTitle,imageUrl,caption';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_article']['fields']['addImage'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['addImage'],
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['submitOnChange'=>true],
			'sql' => ['type' => 'string', 'length' => 1, 'fixed' => true, 'notnull' => true, 'default' => ''],
		];
$GLOBALS['TL_DCA']['tl_article']['fields']['singleSRC'] = [
            'exclude' => true,
            'inputType' => 'fileTree',
            'eval' => [
                'fieldType' => 'radio',
                'files' => true,
                'filesOnly' => true,
                'extensions' => \Config::get('validImageTypes'),
                'mandatory' => false,
            ],
            'sql' => [ 'type' => 'binary', 'length' => 16, 'notnull' => false ],
            'save_callback' => [
                ['xippogmbh_contao_article_background_bundle.dca_helper', 'storeFileMetaInformation'],
            ],
        ];
$GLOBALS['TL_DCA']['tl_article']['fields']['alt'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['alt'],
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength'=>255, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
		];
$GLOBALS['TL_DCA']['tl_article']['fields']['imageTitle'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['imageTitle'],
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength'=>255, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
		];
$GLOBALS['TL_DCA']['tl_article']['fields']['caption'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['caption'],
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength'=>255, 'allowHtml'=>true, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
		];
$GLOBALS['TL_DCA']['tl_article']['fields']['size'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['size'],
			'exclude' => true,
			'inputType' => 'imageSize',
			'reference' => &$GLOBALS['TL_LANG']['MSC'],
			'eval' => ['rgxp'=>'natural', 'includeBlankOption'=>true, 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50'],
			'options_callback' => static function ()
			{
				return System::getContainer()->get('contao.image.image_sizes')->getOptionsForUser(BackendUser::getInstance());
			},
			'sql' => [ 'type' => 'string', 'length' => 64, 'notnull' => true, 'default' => ''],
		];
$GLOBALS['TL_DCA']['tl_article']['fields']['imagemargin'] = [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['imagemargin'],
			'exclude' => true,
			'inputType' => 'trbl',
			'options' => $GLOBALS['TL_CSS_UNITS'],
			'eval' => ['includeBlankOption'=>true, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 128, 'notnull' => true, 'default' => ''],
		];
