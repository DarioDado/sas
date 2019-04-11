<?php

namespace Photon\Http\Controllers;

use Illuminate\Http\Request;
use Photon\Repositories\News\NewsInterface;
use Photon\PhotonCms\Core\Response\ResponseRepository;

class NewsController extends Controller
{
    /**
     * @var NewsInterface
     */
    private $newsInterface;

    /**
     * @var ResponseRepository
     */
    private $responseRepository;

    /**
     * Controller constructor.
     *
     * @param NewsInterface $newsInterface
     * @param ResponseRepository $responseRepository
     */
    public function __construct(
        NewsInterface $newsInterface,
        ResponseRepository $responseRepository
    )
    {
        $this->newsInterface = $newsInterface;
        $this->responseRepository = $responseRepository;
    }

    /**
     * Fetch all active news.
     *
     * @return Response A Response instance
     */
    public function news()
    {
        $newsData = $this->newsInterface->getNews();
        $news = $this->mapNews($newsData);
        
        return $this->responseRepository->make(
            'LOAD_DYNAMIC_MODULE_ENTRY_SUCCESS',
            ['entry' => $news]
        );
    }

    /**
     * Map news response
     *
     * @param array $news
     * @return array
     */
    private function mapNews($newsData)
    {
        return array_map(function($singleNews) {
            return [
                'id' => $singleNews['id'],
                'first_title' => $singleNews['first_title'],
                'second_title' => $singleNews['second_title'],
                'image' => $singleNews['image_relation']['storage_file_name'],
            ];
        }, $newsData);
    }
}
