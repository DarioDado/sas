<?php

namespace Photon\Repositories\AboutPage;

use Photon\Repositories\AboutPage\AboutPageInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class AboutPageRepository implements AboutPageInterface
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
     * Fetch about page data
     *
     * @return array
     */
    public function getAboutPage()
    {
        return $this->IAPI->about_page(1)->get()->toArray();
    }
}
