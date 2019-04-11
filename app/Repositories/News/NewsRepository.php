<?php

namespace Photon\Repositories\News;

use Photon\Repositories\News\NewsInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class NewsRepository implements NewsInterface
{
    /**
     * The IAPI instance
     *
     * @var  IAPI
     */
    private $IAPI;

    /**
     * Repository construcor.
     *
     * @param IAPI $IAPI
     */
    public function __construct(IAPI $IAPI)
    {
        $this->IAPI = $IAPI;
    }

    /**
     * Fetch all active news
     *
     * @return array
     */
    public function getNews()
    {
        return $this->IAPI->filter->news->post([
            'filter' => [
                'active' => [
                    'equal' => 1,
                ],
            ],
            'sorting' => [
                'created_at' => 'desc',
            ],
        ])['entries']->toArray();
    }
}