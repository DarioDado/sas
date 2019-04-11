<?php

namespace Photon\Repositories\Games;

interface GamesInterface
{
    /**
     * Fetch all games
     *
     * @return array
     */
    public function getGames();
}