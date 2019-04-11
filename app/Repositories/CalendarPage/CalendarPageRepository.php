<?php

namespace Photon\Repositories\CalendarPage;

use Photon\Repositories\CalendarPage\CalendarPageInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class CalendarPageRepository implements CalendarPageInterface
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
     * Fetch calendar page data
     *
     * @return array
     */
    public function getCalendarPage()
    {
        return $this->IAPI->calendar_page(1)->get()->toArray();
    }
}
