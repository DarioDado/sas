<?php

namespace Photon\Repositories\Contact;

use Photon\Repositories\Contact\ContactInterface;
use Photon\PhotonCms\Core\IAPI\IAPI;

class ContactRepository implements ContactInterface
{
    /**
     * The IAPI instance
     *
     * @var  IAPI
     */
    private $IAPI;

    /**
     * Repository constructor.
     *
     * @param IAPI $IAPI
     */
    public function __construct(IAPI $IAPI)
    {
        $this->IAPI = $IAPI;
    }

    /**
     * Fetch contact data
     *
     * @return array
     */
    public function getContact()
    {
        return $this->IAPI->contact(1)->get()->toArray();
    }
}
