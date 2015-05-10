/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.stylesSet.add( 'my_styles', [
	// Block-level styles.

	// Inline styles.
	{ name: 'VQ Red', element: 'span', styles: { 'color': 'rgb(165, 30, 45)' } }
]);

CKEDITOR.editorConfig = function( config ) {
	// -- Define changes to default configuration here. For example:
	config.language = 'nl';
	// -- KCFinder
	config.filebrowserBrowseUrl = '../components/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '../components/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '../components/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '../components/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '../components/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '../components/kcfinder/upload.php?opener=ckeditor&type=flash';
	config.stylesSet = 'my_styles';

	config.removePlugins = 'font';
	config.height = '500px';

	//config.removePlugins = 'image, flash';
};