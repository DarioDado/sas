<?php

namespace Photon\Http\Controllers;

use Illuminate\Http\Request;
use Photon\Repositories\HomePage\HomePageInterface;
use Photon\PhotonCms\Core\Response\ResponseRepository;
use Photon\Repositories\Numbers\NumbersInterface;

class HomePageController extends Controller
{
    /**
     * @var HomePageInterface
     */
    private $homePageInterface;

    /**
     * @var ResponseRepository
     */
    private $responseRepository;

    /**
     * @var NumbersInterface
     */
    private $numbersInterface;

    /**
     * Controller constructor.
     *
     * @param ResponseRepository $responseRepository
     * @param HomePageInterface $homePageInterface
     * @param NumbersInterface $numbersInterface
     */
    public function __construct(
        ResponseRepository $responseRepository,
        HomePageInterface $homePageInterface,
        NumbersInterface $numbersInterface
    )
    {
        $this->responseRepository = $responseRepository;
        $this->homePageInterface = $homePageInterface;
        $this->numbersInterface = $numbersInterface;
    }

    /**
     * Fetch home page data.
     *
     * @param Request $request
     * @return Response A Response instance
     */
    public function homePage()
    {
        $homePageData = $this->homePageInterface->getHomePage();
        $numbers = $this->numbersInterface->getNumbers();
        $homePage = $this->mapHomePageData($homePageData, $numbers);
        
        
        return $this->responseRepository->make(
            'LOAD_DYNAMIC_MODULE_ENTRY_SUCCESS',
            ['entry' => $homePage]
        );
    }

    /**
     * Map home page data response
     *
     * @param array $homePageData
     * @param array $numbers
     * @return array
     */
    private function mapHomePageData($homePageData, $numbers)
    {
        $mappedNumbers = array_map(function($number) {
            return [
                'id' => $number['id'],
                'number' => $number['number'],
                'name' => $number['name'],
            ];
        }, $numbers);

        return [
            'main_title' => $homePageData['main_title'],
            'first_subtitle' => $homePageData['first_subtitle'],
            'second_subtitle' => $homePageData['second_subtitle'],
            'background_image' => $homePageData['background_image_relation']['storage_file_name'],
            'numbers' => $mappedNumbers,
        ];
    }
}
