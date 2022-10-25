//[editor Javascript]

//Project:	Sunny Admin - Responsive Admin Template
//Primary use:   Used only for the wysihtml5 Editor

//Add text editor1
$(function () {
    "use strict";

    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    let editor = CKEDITOR.replace("editor1");
    //bootstrap WYSIHTML5 - text editor
    CKFinder.setupCKEditor(editor);
    $(".textarea").wysihtml5();
});

//Add text editor2
$(function () {
    "use strict";

    // Replace the <textarea id="editor2"> with a CKEditor
    // instance, using default configuration.
    let editor2 = CKEDITOR.replace("editor2");
    //bootstrap WYSIHTML5 - text editor
    CKFinder.setupCKEditor(editor2);
    $(".textarea").wysihtml5();
});
