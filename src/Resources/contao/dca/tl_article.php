// contao/dca/tl_article.php
$GLOBALS['TL_DCA']['tl_article'] = [
    'fields' => [
		'addImage' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['addImage'],
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['submitOnChange'=>true],
			'sql' => ['type' => 'string', 'length' => 1, 'fixed' => true, 'notnull' => true, 'default' => ''],
		],
		'singleSRC' => [
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
        ],
		'alt' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['alt'],
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength'=>255, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
		],
		'imageTitle' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['imageTitle'],
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength'=>255, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
		],
		'caption' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['caption'],
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['maxlength'=>255, 'allowHtml'=>true, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
		],
		'fullsize' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['fullsize'],
			'exclude' => true,
			'inputType' => 'checkbox',
			'eval' => ['tl_class'=>'w50 m12'],
			'sql' => [ 'type' => 'string', 'length' => 1, 'fixed' => true, 'notnull' => true, 'default' => ''],
		],
		'size' => [
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
		],
		'imagemargin' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['imagemargin'],
			'exclude' => true,
			'inputType' => 'trbl',
			'options' => $GLOBALS['TL_CSS_UNITS'],
			'eval' => ['includeBlankOption'=>true, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 128, 'notnull' => true, 'default' => ''],
		],
		'imageUrl' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['imageUrl'],
			'exclude' => true,
			'search' => true,
			'inputType' => 'text',
			'eval' => ['rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>255, 'dcaPicker'=>true, 'addWizardClass'=>false, 'tl_class'=>'w50'],
			'sql' => [ 'type' => 'string', 'length' => 255, 'notnull' => true, 'default' => ''],
		],
		'floating' => [
			'label' => &$GLOBALS['TL_LANG']['tl_content']['floating'],
			'exclude' => true,
			'inputType' => 'radioTable',
			'options' => ['above', 'left', 'right', 'below'],
			'eval' => ['cols'=>4, 'tl_class'=>'w50'],
			'reference' => &$GLOBALS['TL_LANG']['MSC'],
			'sql' => [ 'type' => 'string', 'length' => 12, 'notnull' => true, 'default' => 'above'],
		],
    ],
    'palettes' => [
		'__selector__' => [ 'protected', 'published', 'background_switch' ],
        'default' => str_replace(
			'keywords;',
			'keywords;{article_background},addImage;',
			$GLOBALS['TL_DCA']['tl_article']['palettes']['default']),
    ],
	'subpalettes' => [
		'addImage' => 'singleSRC,size,floating,imagemargin,fullsize,overwriteMeta',
		'overwriteMeta' => 'alt,imageTitle,imageUrl,caption'
	],
];

