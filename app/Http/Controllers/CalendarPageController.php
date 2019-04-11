<?php

namespace Photon\Http\Controllers;

use Illuminate\Http\Request;
use Photon\Repositories\CalendarPage\CalendarPageInterface;
use Photon\Repositories\Teams\TeamsInterface;
use Photon\Repositories\Games\GamesInterface;
use Photon\PhotonCms\Core\Response\ResponseRepository;
use Carbon\Carbon;

class CalendarPageController extends Controller
{
    /**
     * @var CalendarPageInterface
     */
    private $calendarPageInterface;

    /**
     * @var TeamsInterface
     */
    private $teamsInterface;

    /**
     * @var GamesInterface
     */
    private $gamesInterface;

    /**
     * @var ResponseRepository
     */
    private $responseRepository;

    /**
     * Controller constructor.
     *
     * @param CalendarPageInterface $calendarPageInterface
     * @param TeamsInterface $teamsInterface
     * @param GamesInterface $gamesInterface
     * @param ResponseRepository $responseRepository
     */
    public function __construct(
        CalendarPageInterface $calendarPageInterface,
        TeamsInterface $teamsInterface,
        GamesInterface $gamesInterface,
        ResponseRepository $responseRepository
    )
    {
        $this->calendarPageInterface = $calendarPageInterface;
        $this->teamsInterface = $teamsInterface;
        $this->gamesInterface = $gamesInterface;
        $this->responseRepository = $responseRepository;
    }

    /**
     * Fetch game calendar page data.
     *
     * @return Response A Response instance
     */
    public function calendarPage()
    {
        $calendarPageData = $this->calendarPageInterface->getCalendarPage();
        $euroleagueTeams = $this->teamsInterface->getEuroleagueTeams();
        $games = $this->gamesInterface->getGames();
        $calendarPage = $this->mapCalendarPageData($calendarPageData, $euroleagueTeams, $games);
        
        return $this->responseRepository->make(
            'LOAD_DYNAMIC_MODULE_ENTRY_SUCCESS',
            ['entry' => $calendarPage]
        );
    }

    /**
     * Map calendar page data response
     *
     * @param array $calendarPageData
     * @param array $teams
     * @param array $games
     * @return array
     */
    private function mapCalendarPageData($calendarPageData, $teams, $games)
    {
        $mappedGames = array_map(function($game) {
            $date = Carbon::parse($game['date']);
            $year = $date->year;
            $month = $date->month;
            $shortMonth= $date->shortEnglishMonth;
            $day = $date->day;
            $shortDayOfWeek = $date->shortEnglishDayOfWeek;
            $hour = $date->hour;
            $minute = $date->minute;

            return [
                'id' => $game['id'],
                'our_score' => $game['our_score'],
                'opponent_score' => $game['opponent_score'],
                'opponent' => [
                    'name' => $game['opponent_relation']['name'],
                    'country_code' => $game['opponent_relation']['country_code'],
                ],
                'win' => $game['our_score'] > $game['opponent_score'] ? 1 : 0,
                'date' => [
                    'year'              => $year,
                    'month'             => $month,
                    'shortMonth'        => $shortMonth,
                    'day'               => $day,
                    'shortDayOfWeek'    => $shortDayOfWeek,
                    'hour'              => $hour,
                    'minute'            => $minute,
                ],
            ];
        }, $games);

        $mappedTeams = array_map(function($team) {
            return [
                'id' => $team['id'],
                'name' => $team['name'],
                'country_code' => $team['country_code'],
            ];
        }, $teams);

        return [
            'first_title' => $calendarPageData['first_title'],
            'second_title' => $calendarPageData['second_title'],
            'first_subtitle' => $calendarPageData['first_subtitle'],
            'second_subtitle' => $calendarPageData['second_subtitle'],
            'euroleague_teams' => $mappedTeams,
            'games' => $mappedGames,
        ];
    }
}
