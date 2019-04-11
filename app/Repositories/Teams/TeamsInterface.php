<?php

namespace Photon\Repositories\Teams;

interface TeamsInterface
{
    /**
     * Fetch all teams which belong to SAS organisation
     *
     * @return array
     */
    public function getOurTeams();

    /**
     * Fetch all teams which are euroleague participators
     *
     * @return array
     */
    public function getEuroleagueTeams();
}