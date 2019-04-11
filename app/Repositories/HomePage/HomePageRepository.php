<?php

namespace Photon\Repositories\HomePage;

use Photon\Repositories\HomePage\HomePageInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class HomePageRepository implements HomePageInterface
{
    /**
     * The IAPI instance
     *
     * @var  IAPI
     */
    private $IAPI;

    /**
     * Repository constructor.
     *
     * @param IAPI $IAPI
     */
    public function __construct(IAPI $IAPI)
    {
        $this->IAPI = $IAPI;
    }

    /**
     * Fetch home page data
     *
     * @return array
     */
    public function getHomePage()
    {
        return $this->IAPI->home_page(1)->get()->toArray();
    }
}
