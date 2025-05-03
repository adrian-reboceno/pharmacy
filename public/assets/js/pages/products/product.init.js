
FilePond.registerPlugin(
    // encodes the file as base64 data
    FilePondPluginFileEncode,
    // validates the size of the file
    FilePondPluginFileValidateSize,
    // corrects mobile image orientation
    FilePondPluginImageExifOrientation,
    // previews dropped images
    FilePondPluginImagePreview
);
var inputImageMain = document.querySelectorAll('input.main_imagen');
if(inputImageMain){

    FilePond.create(
        document.querySelector('.filepond-input-main'), {
            labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 400,
            imageResizeTargetHeight: 200,
            /* stylePanelLayout: 'compact circle', */
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
        }
    );
}

var inputOtherImagen = document.querySelectorAll('input.otherimagen');
if(inputOtherImagen){

    FilePond.create(
        document.querySelector('.filepond-input-multiple'), {
            labelIdle: 'Drag & Drop your pictures or <span class="filepond--label-action">Browse</span>',
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 400,
            imageResizeTargetHeight: 200,
            /* stylePanelLayout: 'compact circle', */
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
        }
    );
}