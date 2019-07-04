<div class="blog-content wow fadeInUp" data-wow-delay="1s">
    <span>{{ $post->created_at->format('d.m.Y.') }}</span>
    <span class="meta-author">{{ $post->user->first_name }} {{ $post->user->last_name }}</span>
    <div class="blog-clear"></div>
    <p id="post-content">{{ $post->content }}</p>
</div>