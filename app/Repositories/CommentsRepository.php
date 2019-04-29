<?php
/**
 * Created by PhpStorm.
 * User: m.fedorov
 * Date: 29.04.2019
 * Time: 15:08
 */

namespace Corp\Repositories;

use Corp\Comment;


class CommentsRepository extends Repository
{
    public function __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}
