/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';

    filebrowserBrowseUrl =
        "http://127.0.0.1:5500/assets/vendor_components/ckfinder/ckfinder.html";
    filebrowserUploadUrl =
        "http://127.0.0.1:5500/assets/vendor_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files";
    filebrowserWindowWidth = "1000";
    filebrowserWindowHeight = "700";
};
