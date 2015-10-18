<?php

namespace Blog\Model;

interface PostInterface
{
    /**
     * Will return the ID of the post
     *
     * @return int
     */
    public function getId();

    /**
     * Will return the title of the post
     *
     * @return string
     */
    public function getTitle();


    /**
     * Will return the content of the post
     *
     * @return string
     */
    public function getText();
}