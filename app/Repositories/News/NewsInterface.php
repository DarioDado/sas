<?php

namespace Photon\Repositories\News;

interface NewsInterface
{
    /**
     * Fetch all active news
     *
     * @return array
     */
    public function getNews();
}