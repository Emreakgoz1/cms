<div id="comments">
    <div class="media comment-box">
        <div class="media-left">
            <a href="#">
                <img class="img-responsive user-photo" src="<?= get_gravatar($comment['comment_email']) ?>">
            </a>
        </div>
        <div class="media-body">
            <h6 class="media-heading"><?= $comment['comment_name'] ?>
                <span style="color : #999; font-size:12px; float:right; ">
                    <?= timeConvert($comment['comment_date']) ?>
                </span>
            </h6>
            <p>
                <?= $comment['comment_content'] ?>
            </p>
        </div>
    </div>
</div>