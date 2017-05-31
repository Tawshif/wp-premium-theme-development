window.onload = function() {
    var mediaUploader;
    var upBtn = document.getElementById('upload-button');

    upBtn.onclick = function(e) {
        e.preventDefault();

        console.log('some thing fishy');

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose a profile picture',
            button: {
                text: 'Choose Picture'
            },
            multiple: false
        })

        mediaUploader.el.addEventListener('select', function(e) {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            document.getElementById("profile-picture").value = attachment.url;
            document.getElementById("profile-picture-preview").style.backgroundImage = 'url(' + attachment.url + ')';
        });

        mediaUploader.open();
    };
}



// jQuery(document).ready(function($) {

//     var mediaUploader;

//     $('#upload-button').on('click', function(e) {
//         e.preventDefault();
//         if (mediaUploader) {
//             mediaUploader.open();
//             return;
//         }

//         mediaUploader = wp.media.frames.file_frame = wp.media({
//             title: 'Choose a Profile Picture',
//             button: {
//                 text: 'Choose Picture'
//             },
//             multiple: false
//         });

//         mediaUploader.on('select', function() {
//             attachment = mediaUploader.state().get('selection').first().toJSON();
//             $('#profile-picture').val(attachment.url);
//             $('#profile-picture-preview').css('background-image', 'url(' + attachment.url + ')');
//         });

//         mediaUploader.open();

//     });

// });