<?php

namespace Blog\Service;

use Blog\Model\PostInterface;

interface PostServiceInterface {

    /**
     * Should return all blog posts that is iteratable.
     *
     * @return mixed|PostInterface[]
     */
    public function findAllPosts();


    /**
     * Should return a single post based on specified paramter.
     *
     * @param int $id   Identifier of the blog post.
     * @return PostInterface
     */
    public function findPost($id);


}