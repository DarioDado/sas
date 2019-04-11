<?php

namespace Photon\Repositories\Contact;

interface ContactInterface
{
    /**
     * Fetch contact data
     *
     * @return array
     */
    public function getContact();
}