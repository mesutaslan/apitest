<?php

namespace AppBundle\Listener;


use AppBundle\Utility\Constants;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        $error_code = $exception->getStatusCode();
        $error_message = $exception->getMessage();

        // for no route found
        if (!($error_code > 0) && strpos($error_message, 'No route found for') !== false) {
            $error_code = Constants::EXCEPTION_CODE_APPLICATION_NOT_FOUND_ENDPOINT;
            $error_message = Constants::$apiErrors[$error_code]['message'];
        }

        // if unknown error code
        if (!in_array($error_code, array_keys(Constants::$apiErrors))) {
            $error_code = Constants::EXCEPTION_CODE_APPLICATION_INTERNAL;
            $error_message = Constants::$apiErrors[$error_code]['message'];
        }
        $content = json_encode(array(
            'exception' => true,
            'error_code' => $error_code,
            'error_message' => $error_message,
        ));
        $statusCode = Constants::$apiErrors[$error_code]['httpStatusCode'];
        $response = $event->getResponse();
        if (is_null($response)) {
            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');
        }
        $response->setContent($content);
        $response->setStatusCode($statusCode);
        $event->setResponse($response);
    }
}