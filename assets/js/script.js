jQuery(document).ready(function($) {

    console.log('afsdfasdf');
    
    var mediaUploader;
    
    $('#upload-button').click(function(e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title:'Choose a profile picture',
            button:{
                text:'choos Picture'
            },
            multiple: false
        });
    });

});