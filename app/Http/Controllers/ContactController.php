<?php

namespace Photon\Http\Controllers;

use Illuminate\Http\Request;
use Photon\Repositories\Contact\ContactInterface;
use Photon\PhotonCms\Core\Response\ResponseRepository;
use Photon\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Photon\Exception;

class ContactController extends Controller
{
    /**
     * @var ContactInterface
     */
    private $contactInterface;

    /**
     * @var ResponseRepository
     */
    private $responseRepository;

    /**
     * Controller constructor.
     *
     * @param ContactInterface $contactInterface
     * @param ResponseRepository $responseRepository
     */
    public function __construct(
        ContactInterface $contactInterface,
        ResponseRepository $responseRepository
    )
    {
        $this->contactInterface = $contactInterface;
        $this->responseRepository = $responseRepository;
    }

    /**
     * Fetch contact data.
     *
     * @return Response A Response instance
     */
    public function contact()
    {
        $contactData = $this->contactInterface->getContact();
        $contact = $this->mapContactData($contactData); 
        
        return $this->responseRepository->make(
            'LOAD_DYNAMIC_MODULE_ENTRY_SUCCESS',
            ['entry' => $contact]
        );
    }

    /**
     * Send contact message
     *
     * @param Request $request
     * @return Response A Response instance
     */
    public function sendMessage(Request $request)
    {
        $data = $request->data;

        try {
            //send email logic
            $address = env('CONTACT_EMAIL_ADDRESS');
            Mail::to($address)->send(new ContactMessage($data));

            return response()->json(['success' => 1, 'message' => 'Your message has been sent.',]);
        }  catch (\Exception $e) {
            return response()->json(['success' => 0, 'message' => 'Whoops, something went wrong. Try again later.'], 400);
        }

    }

    /**
     * Map contact data response
     *
     * @param array $contactData
     * @return array
     */
    private function mapContactData($contactData)
    {
        return [
            'email' => $contactData['email'],
            'phone_numbers' => $contactData['phone_numbers'],
            'address' => $contactData['address'],
        ];
    }
}
