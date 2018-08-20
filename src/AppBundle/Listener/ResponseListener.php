<?php

namespace AppBundle\Listener;

use AppBundle\Utility\ApiResponse;
use AppBundle\Utility\Error;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ResponseListener
{

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $request = $event->getRequest();
        $response = $event->getResponse();
        $response->headers->set('Content-Type', 'application/json');

        $content = $response->getContent();

        $data = json_decode($content, true);

        if (is_array($data) && isset($data['exception']) && $data['exception'] === true) {
            $content = json_encode(new ApiResponse(null, new Error($data['error_code'], $data['error_message'])));
        } elseif ($request->attributes->has('_route')) {

            $content = json_encode(new ApiResponse($data, null));
        }
        if (in_array($response->getStatusCode(), [404,409])) {
            $content = json_encode(new ApiResponse(null, new Error($response->getStatusCode(), $response->getContent())));
        }
        $response->setContent($content);
        $event->setResponse($response);
    }

}