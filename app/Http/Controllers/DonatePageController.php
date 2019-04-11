<?php

namespace Photon\Http\Controllers;

use Illuminate\Http\Request;
use Photon\Repositories\DonatePage\DonatePageInterface;
use Photon\PhotonCms\Core\Response\ResponseRepository;

class DonatePageController extends Controller
{
    /**
     * @var DonatePageInterface
     */
    private $donatePageInterface;

    /**
     * @var ResponseRepository
     */
    private $responseRepository;

    /**
     * Controller constructor.
     *
     * @param DonatePageInterface $donatePageInterface
     * @param ResponseRepository $responseRepository
     */
    public function __construct(
        DonatePageInterface $donatePageInterface,
        ResponseRepository $responseRepository
    )
    {
        $this->donatePageInterface = $donatePageInterface;
        $this->responseRepository = $responseRepository;
    }

    /**
     * Fetch donate page data.
     *
     * @param Request $request
     * @return Response A Response instance
     */
    public function donatePage()
    {
        $donatePageData = $this->donatePageInterface->getDonatePage();
        $donatePage = $this->mapDonatePageData($donatePageData); 
        
        return $this->responseRepository->make(
            'LOAD_DYNAMIC_MODULE_ENTRY_SUCCESS',
            ['entry' => $donatePage]
        );
    }

    /**
     * Map donate page data response
     *
     * @param array $donatePageData
     * @return array
     */
    private function mapDonatePageData($donatePageData)
    {
        return [
            'first_title' => $donatePageData['first_title'],
            'second_title' => $donatePageData['second_title'],
            'third_title' => $donatePageData['third_title'],
            'text' => $donatePageData['text'],
        ];
    }
}
