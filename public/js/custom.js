$(document).ready(function () {

    $('button.btnModalOpen').on('click', function(){
        $('#video_source').attr('src', $(this).data("video"));
    });

    $('#videoModal').on('shown.bs.modal', function () {
        let $video = $('#video_player');
        $video[0].load();
        $video[0].play();
    }).on('hide.bs.modal', function() {
        $('#video_player').trigger('pause');
    });


});