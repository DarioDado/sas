<?php

namespace Photon\Repositories\Games;

use Photon\Repositories\Games\GamesInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class GamesRepository implements GamesInterface
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
     * Fetch all games
     *
     * @return array
     */
    public function getGames()
    {
        return $this->IAPI->filter->games->post([
            'sorting' => [
                'date' => 'asc',
            ],
        ])['entries']->toArray();
    }
}