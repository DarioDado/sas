<?php

namespace Photon\Repositories\Teams;

use Photon\Repositories\Teams\TeamsInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class TeamsRepository implements TeamsInterface
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
     * Fetch all teams which belong to SAS organisation
     *
     * @return array
     */
    public function getOurTeams()
    {
        return $this->IAPI->filter->teams->post([
            'filter' => [
                'our_team' => [
                    'equal' => 1,
                ],
            ],
            'sorting' => [
                'lft' => 'asc',
            ],
        ])['entries']->toArray();
    }

    /**
     * Fetch all teams which are euroleague participators
     *
     * @return array
     */
    public function getEuroleagueTeams()
    {
        return $this->IAPI->filter->teams->post([
            'filter' => [
                'euroleague_team' => [
                    'equal' => 1,
                ],
            ],
            'sorting' => [
                'lft' => 'asc',
            ],
        ])['entries']->toArray();
    }
}