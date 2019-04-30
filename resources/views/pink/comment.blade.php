@foreach($items as $item)
    <li id="li-comment-{{ $item->id }}" class="comment even {{ ($item->user_id == $article->user_id) ? 'bypostauthor odd' : '' }}">
        <div id="comment-{{ $item->id }}" class="comment-container">
            <div class="comment-author vcard">
                @set($hash, isset($item->email) ? md5($item->email) : md5($item->user->email))
                <img alt="" src="http://www.gravatar.com/avatar/{{ $hash }}?d=mm&s=75" class="avatar" height="75" width="75" />
                <cite class="fn">{{ $item->user->name ?? $item->name }}</cite>
            </div>
            <!-- .comment-author .vcard -->
            <div class="comment-meta commentmetadata">
                <div class="intro">
                    <div class="commentDate">
                        <a href="#comment-{{ $item->id }}">
                            {{ is_object($item->created_at) ? $item->created_at->format('F d, Y \a\t H:i') : '' }}</a>
                    </div>
                    <div class="commentNumber">#&nbsp;1</div>
                </div>
                <div class="comment-body">
                    <p>Hi all, i’m a guest and this is the guest’s awesome comments template!</p>
                </div>
                <div class="reply group">
                    <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-2&quot;, &quot;2&quot;, &quot;respond&quot;, &quot;41&quot;)">Reply</a>
                </div>
                <!-- .reply -->
            </div>
            <!-- .comment-meta .commentmetadata -->
        </div>
        <!-- #comment-##  -->
    </li>
@endforeach
