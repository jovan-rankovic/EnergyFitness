@if(session()->has('user'))
    <div class="blog-comment-form wow fadeInUp" data-wow-delay="1s">
        <h3>Leave a comment</h3>
        <form action="#" method="POST" id="comment-form">
            @csrf
            <div class="col-md-12 col-sm-12">
                <textarea class="form-control" placeholder="Message" rows="5" name="commentMsg" id="commentMsg" required ></textarea>
            </div>

                <input name="postId" type="hidden" class="form-control" id="postId" value="{{ $post->id }}" />

                <input name="loggedUserId" type="hidden" class="form-control" id="loggedUserId" value="{{ session('user')->id }}" />

                <input type="hidden" name="postTitle" class="form-control" id="postTitle" value="{{ $post->title }}">

                <input type="hidden" name="loggedUserFN" class="form-control" id="loggedUserFN" value="{{ session('user')->first_name }}" />

                <input type="hidden" name="loggedUserLN" class="form-control" id="loggedUserLN" value="{{ session('user')->last_name }}" />

            <div class="col-md-3 col-sm-3">
                <input name="commentBtn" type="submit" class="form-control" id="commentBtn" value="Submit">
            </div>

        </form>
    </div>
@else
    <div class="blog-comment-form wow fadeInUp" data-wow-delay="1s">
        <h3>You must <a href="#" data-toggle="modal" data-target=".log-sign">log in</a> to comment.</h3>
    </div>
@endif