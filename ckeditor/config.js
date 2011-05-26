/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';

config.toolbar = 'MyToolBar';
config.toolbar_MyToolBar = 
[ 
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar'],
    ['TextColor','BGColor']
                           ];
};
