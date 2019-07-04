<div class="blog-comment wow fadeInUp" id="comments" data-wow-delay="1s" xmlns="http://www.w3.org/1999/html">
    <br/>
    <h3>{{ $post->comments->count() }} Comments</h3>

    @php($i=1)

    @foreach($post->comments as $comment)

        <div class="media">
            <div class="media-object pull-left col-md-2 col-sm-4 col-xs-3">
                <img src="{{ asset($comment->user->image) }}" height="120" width="120" class="img-responsive img-circle" alt="blog">
            </div>
            <div class="media-body">

                @if(session()->has('user'))

                    @if(session('user')->id == $comment->user->id || session('user')->role_id == 1)

                        <button type="button" class="close" aria-label="Close" data-toggle="modal" data-target="#deleteWarning{{ $i }}">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <div class="modal fade" id="deleteWarning{{ $i++ }}" role="dialog">
                            <div class="modal-dialog modal-sm text-center">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">
                                            &times;
                                        </button>
                                        <h7>Are you sure?</h7>
                                        <button type="button" class="btn btn-default error" onclick="comment_delete({{ $post->id }}, {{ $comment->id }}, {{ $comment->user->id }}, '{{ $comment->content }}', '{{ $comment->user->first_name }}', '{{ $comment->user->last_name }}', '{{ $post->title }}');">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(session('user')->id == $comment->user->id)

                        <button type="button" class="close" data-toggle="modal" data-target="#edit{{ $i }}">
                            <span aria-hidden="true"><i class="fa fa-edit"></i></span>
                        </button>

                        <div class="modal fade" id="edit{{ $i++ }}" role="dialog">
                            <div class="modal-dialog modal-sm text-center">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">
                                            &times;
                                        </button>
                                        <h7>Edit comment</h7>

                                            <fieldset>

                                                <div class="group">
                                                    <textarea class="input" type="text" id="editComment" name="editComment" required />{{ $comment->content }}</textarea><span class="highlight"></span><span class="bar"></span>
                                                </div>

                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button class="button btn btn-primary btn-block" onclick="comment_update({{ $post->id }}, {{ $comment->id }}, {{ $comment->user->id }}, '{{ $comment->user->first_name }}', '{{ $comment->user->last_name }}', '{{ $post->title }}');">
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>

                                            </fieldset>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @endif

                <h4 class="media-heading">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</h4>
                <h5>{{ $comment->updated_at->format('d.m.Y. H:i') }} @if($comment->updated_at != $comment->created_at) <i>(edited)</i> @endif</h5>
                <p>{{ $comment->content }}</p>
            </div>
        </div>

    @endforeach

</div>