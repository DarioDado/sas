<?php

namespace Photon\Repositories\DonatePage;

use Photon\Repositories\DonatePage\DonatePageInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class DonatePageRepository implements DonatePageInterface
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
     * Fetch donate page data
     *
     * @return array
     */
    public function getDonatePage()
    {
        return $this->IAPI->donate_page(1)->get()->toArray();
    }
}
