<?php

namespace Acme\Blog;

class Comment
{
    private $comment;

    public function __construct(string $comment)
    {
        $this->comment = $comment;
    }

    public function get_comment(): string
    {
        return strip_tags($this->comment);
    }
}
