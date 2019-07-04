$(document).ready(function () {
    $("#commentBtn").on("click", comment_store);
});

// comment_store
function comment_store(e) {
    e.preventDefault();

    let commentMsg = $("#commentMsg").val();
    let postId = $("#postId").val();
    let loggedUserId = $("#loggedUserId").val();
    let postTitle = $("#postTitle").val();
    let loggedUserFN = $("#loggedUserFN").val();
    let loggedUserLN = $("#loggedUserLN").val();

    let reCommentMsg = /^[\wĆČŽĐŠćčžđš .,!(\?)':"-]{2,}$/;

    if(!commentMsg.match(reCommentMsg)){
        $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>Bad message format.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
    }
    else{
        $.ajax({
            type: "post",
            url: BASE_URL + "/posts/"+postId+"/comments",
            data: {
                content: commentMsg,
                post_id : postId,
                user_id : loggedUserId,
                postTitle : postTitle,
                userFN : loggedUserFN,
                userLN : loggedUserLN,
                _token : TOKEN
            },
            success: function () {
                location.reload();
            },
            error: function (xhr) {
                $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>"+xhr.status + ': ' + xhr.statusText+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
            }
        });
    }
}

// comment_delete
function comment_delete(post_id, comment_id, user_id, commentContent, userFN, userLN, postTitle) {
    $.ajax({
        type: "delete",
        url: BASE_URL + "/posts/"+post_id+"/comments/"+comment_id,
        data: {
            post_id : post_id,
            id : comment_id,
            user_id : user_id,
            commentContent : commentContent,
            userFN : userFN,
            userLN : userLN,
            postTitle : postTitle,
            _token : TOKEN
        },
        success: function () {
            location.reload();
        },
        error: function (xhr) {
            $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>"+xhr.status + ': ' + xhr.statusText+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
        }
    });
}

// comment_update
function comment_update(post_id, comment_id, user_id, userFN, userLN, postTitle) {
    let editComment = $("#editComment").val();

    let reCommentMsg = /^[\wĆČŽĐŠćčžđš .,!(\?)':"-]{2,}$/;

    if(!editComment.match(reCommentMsg)){
        $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>Bad message format.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
    }
    else{
        $.ajax({
            type: "patch",
            url: BASE_URL + "/posts/" + post_id + "/comments/" + comment_id,
            data: {
                post_id: post_id,
                id: comment_id,
                user_id: user_id,
                content: editComment,
                userFN: userFN,
                userLN: userLN,
                postTitle: postTitle,
                _token: TOKEN
            },
            success: function () {
                location.reload();
            },
            error: function (xhr) {
                $(".blog-comment-form").prepend("<div class='alert alert-warning alert-dismissable' role='alert'>" + xhr.status + ': ' + xhr.statusText + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
            }
        });
    }
}