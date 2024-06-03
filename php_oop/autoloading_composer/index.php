<?php

require_once "app/bootstrap.php";

use Acme\Auth\User as User;
use Acme\Blog\Comment as Comment;

$user = new User("Rein", "123");
echo $user->get_username();

echo "<br>";

$comment = new Comment("This is a comment!");
echo $comment->get_comment();
