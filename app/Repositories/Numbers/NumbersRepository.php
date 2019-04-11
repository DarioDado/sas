<?php

namespace Photon\Repositories\Numbers;

use Photon\Repositories\Numbers\NumbersInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class NumbersRepository implements NumbersInterface
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
     * Fetch all numbers
     *
     * @return array
     */
    public function getNumbers()
    {
        return $this->IAPI->filter->numbers->post([
            'sorting' => [
                'lft' => 'asc',
            ],
        ])['entries']->toArray();
    }
}