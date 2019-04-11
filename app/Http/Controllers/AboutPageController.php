<?php

namespace Photon\Http\Controllers;

use Illuminate\Http\Request;
use Photon\Repositories\AboutPage\AboutPageInterface;
use Photon\Repositories\Teams\TeamsInterface;
use Photon\PhotonCms\Core\Response\ResponseRepository;

class AboutPageController extends Controller
{
    /**
     * @var AboutPageInterface
     */
    private $aboutPageInterface;

    /**
     * @var TeamsInterface
     */
    private $teamsInterface;

    /**
     * @var ResponseRepository
     */
    private $responseRepository;

    /**
     * Controller constructor.
     *
     * @param AboutPageInterface $aboutPageInterface
     * @param TeamsInterface $teamsInterface
     * @param ResponseRepository $responseRepository
     */
    public function __construct(
        AboutPageInterface $aboutPageInterface,
        TeamsInterface $teamsInterface,
        ResponseRepository $responseRepository
    )
    {
        $this->aboutPageInterface = $aboutPageInterface;
        $this->teamsInterface = $teamsInterface;
        $this->responseRepository = $responseRepository;
    }

    /**
     * Fetch about page data.
     *
     * @param Request $request
     * @return Response A Response instance
     */
    public function aboutPage()
    {
        $aboutPageData = $this->aboutPageInterface->getAboutPage();
        $ourTeams = $this->teamsInterface->getOurTeams();
        $aboutPage = $this->mapAboutPageData($aboutPageData, $ourTeams); 
        
        return $this->responseRepository->make(
            'LOAD_DYNAMIC_MODULE_ENTRY_SUCCESS',
            ['entry' => $aboutPage]
        );
    }

    /**
     * Map about page data response
     *
     * @param array $aboutPageData
     * @param array $teams
     * @return array
     */
    private function mapAboutPageData($aboutPageData, $teams)
    {
        $mappedTeams = array_map(function($team) {
            return [
                'id' => $team['id'],
                'name' => $team['name'],
                'seniority' => $team['seniority_relation']['name'],
                'logo' => $team['logo_relation']['storage_file_name'],
            ];
        }, $teams);

        return [
            'first_title' => $aboutPageData['first_title'],
            'second_title' => $aboutPageData['second_title'],
            'subtitle' => $aboutPageData['subtitle'],
            'description' => $aboutPageData['description'],
            'our_teams' => $mappedTeams,
        ];
    }
}
