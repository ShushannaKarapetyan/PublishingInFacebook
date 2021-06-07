$(document).ready(function() {
    $('.openGroupModal').click(function () {
        $('.group-name').text($(this).attr('data-name'));

        window.group_id = $(this).attr('data-id');
    })

    $('.submit-group-post').click(function () {
        let url = "https://graph.facebook.com/" + window.group_id + "/feed";

        let message = $('textarea.group').val();

        $.ajax({
            type: "POST",
            url: url,
            data: {
                message,
                'access_token': window.user_access_token,
            },
        }).done(function () {
            alert("The post has been published");

            location.reload();
        }).fail(function (error) {
            alert("Error - " + error);
        });
    })

    $('.openPageModal').click(function () {
        $('.page-name').text($(this).attr('data-name'));

        window.page_id = $(this).attr('data-id');
    })

    $('.submit-page-post').click(function () {
        let url = "https://graph.facebook.com/" + window.page_id + "/feed";

        let message = $('textarea.page').val();

        $.ajax({
            type: "POST",
            url: url,
            data: {
                message,
                'access_token': $(this).attr('data-pageAccessToken'),
            },
        }).done(function () {
            alert("The post has been published");

            location.reload();
        }).fail(function (error) {
            alert("Error - " + error);
        });
    })
});
