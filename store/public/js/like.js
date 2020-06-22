$(document).ready(function () {
    $('.like').on('click', function () {
        let postId = $(this).data('id');

        $.ajax({
            'url': '/blog/like',
            'method': 'POST',
            'data': {id: postId},
            'success': function (data) {
                $('#likesCount_' + postId).html(data);
            },
            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        return false;
    });
});