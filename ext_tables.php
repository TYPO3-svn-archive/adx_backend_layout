<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

// Add static TypoScript
$typoScriptPath = t3lib_div::getFileAbsFileName('EXT:adx_backend_layout/Configuration/TypoScript/');
$typoScripts = t3lib_div::get_dirs($typoScriptPath);
foreach ($typoScripts as $key => $directory) {
	t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/' .$directory, 'ad: Backend Layout ' . str_replace('Layout', '', $directory));
}

/**
 * Add-ons for backend_layout
 */
$tempColumns = array(
	'tx_adxbackendlayout_layout_id' => array(
		'label' => 'LLL:EXT:adx_backend_layout/Resources/Private/Language/locallang_db.xlf:tx_adxbackendlayout_layout_id',
		'exclude' => 1,
		'config' => array(
			'type' => 'input',
			'eval' => 'trim',
		),
	),
);

t3lib_div::loadTCA('backend_layout');
t3lib_extMgm::addTCAcolumns('backend_layout', $tempColumns, 1);
t3lib_extMgm::addToAllTCAtypes('backend_layout', 'tx_adxbackendlayout_layout_id', '', 'after:title');


/**
 * Add-ons for tt_content
 */
$tempColumns = array(
	'tx_adxbackendlayout_inherit' => array(		
		'label' => 'LLL:EXT:adx_backend_layout/Resources/Private/Language/locallang_db.xlf:tx_adxbackendlayout_inherit',
		'exclude' => 1,		
		'config' => array(
			'type' => 'check',
			'items' => array(
				'1'	=> array(
					'0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
				),
			),
		),
	),
	'tx_adxbackendlayout_device_visibility' => array(
		'label' => 'LLL:EXT:adx_backend_layout/Resources/Private/Language/locallang_db.xlf:tx_adxbackendlayout_device_visibility',
		'exclude' => 1,
		'config' => array(
			'type' => 'check',
			'cols' => 3,
			'items' => array(
				array('LLL:EXT:adx_backend_layout/Resources/Private/Language/locallang_db.xlf:tx_adxbackendlayout_device_visibility.hideOnDesktop'),
				array('LLL:EXT:adx_backend_layout/Resources/Private/Language/locallang_db.xlf:tx_adxbackendlayout_device_visibility.hideOnTablet'),
				array('LLL:EXT:adx_backend_layout/Resources/Private/Language/locallang_db.xlf:tx_adxbackendlayout_device_visibility.hideOnPhone'),
			),
		),
	),
);

t3lib_div::loadTCA('tt_content');
t3lib_extMgm::addTCAcolumns('tt_content', $tempColumns, 1);
t3lib_extMgm::addFieldsToPalette('tt_content', 'visibility', 'tx_adxbackendlayout_inherit', 'after:linkToTop');
t3lib_extMgm::addFieldsToPalette('tt_content', 'frames', '--linebreak--,tx_adxbackendlayout_device_visibility', 'after:section_frame');
t3lib_extMgm::addLLrefForTCAdescr('tt_content', 'EXT:adx_backend_layout/Resources/Private/Language/locallang_db.xlf');

?>