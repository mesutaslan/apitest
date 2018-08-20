<?php

namespace AppBundle\Utility;

use Symfony\Component\HttpFoundation\Response;

class Constants
{

    const EXCEPTION_CODE_APPLICATION_INTERNAL = 500;
    const EXCEPTION_CODE_APPLICATION_NOT_FOUND = 404;
    const EXCEPTION_CODE_METHOD_NOT_ALLOWED = 405;
    const EXCEPTION_CODE_APPLICATION_NOT_FOUND_ENDPOINT = 404;
    const EXCEPTION_CODE_AUTH_API_AUTHENTICATION = 401;
    const EXCEPTION_CODE_AUTH_CUSTOMER_AUTHENTICATION = 2001;
    const EXCEPTION_CODE_AUTH_CUSTOMER_AUTHORIZATION = 2002;
    const EXCEPTION_CODE_AUTH_LOGIN = 403;
    const EXCEPTION_CODE_INFO_MESSAGE = 3000;
    const EXCEPTION_CODE_FATAL_RESTART = 4000;
    public static $apiErrors = array(
        self::EXCEPTION_CODE_APPLICATION_INTERNAL => array(
            'code' => self::EXCEPTION_CODE_APPLICATION_INTERNAL,
            'group' => 'APPLICATION',
            'message' => 'Internal error',
            'description' => 'Corresponds with an HTTP 500 - An unknown internal error occurred.',
            'httpStatusCode' => Response::HTTP_INTERNAL_SERVER_ERROR
        ),
        self::EXCEPTION_CODE_APPLICATION_NOT_FOUND => array(
            'code' => self::EXCEPTION_CODE_APPLICATION_NOT_FOUND,
            'group' => 'APPLICATION',
            'message' => 'Resource was not found',
            'description' => 'Corresponds with an HTTP 404 - The specified resource was not found.',
            'httpStatusCode' => Response::HTTP_NOT_FOUND
        ),
        self::EXCEPTION_CODE_METHOD_NOT_ALLOWED => array(
            'code' => self::EXCEPTION_CODE_METHOD_NOT_ALLOWED,
            'group' => 'APPLICATION',
            'message' => 'Method Not Allowed',
            'description' => 'Corresponds with an HTTP 405 - Method Not Allowe',
            'httpStatusCode' => Response::HTTP_METHOD_NOT_ALLOWED
        ),
        self::EXCEPTION_CODE_APPLICATION_NOT_FOUND_ENDPOINT => array(
            'code' => self::EXCEPTION_CODE_APPLICATION_NOT_FOUND_ENDPOINT,
            'group' => 'APPLICATION',
            'message' => 'Endpoint was not found',
            'description' => 'Corresponds with an HTTP 404 - The specified endpoint was not found.',
            'httpStatusCode' => Response::HTTP_NOT_FOUND
        ),
        self::EXCEPTION_CODE_AUTH_API_AUTHENTICATION => array(
            'code' => self::EXCEPTION_CODE_AUTH_API_AUTHENTICATION,
            'group' => 'AUTH',
            'message' => 'Invalid api authentication',
            'description' => 'Corresponds with a HTTP 401 - Api authentication credentials were missing or incorrect.',
            'httpStatusCode' => Response::HTTP_UNAUTHORIZED
        ),
        self::EXCEPTION_CODE_AUTH_CUSTOMER_AUTHENTICATION => array(
            'code' => self::EXCEPTION_CODE_AUTH_CUSTOMER_AUTHENTICATION,
            'group' => 'AUTH',
            'message' => 'Invalid user authentication',
            'description' => 'Corresponds with a HTTP 401 - user authentication credentials were missing or incorrect.',
            'httpStatusCode' => Response::HTTP_UNAUTHORIZED
        ),
        self::EXCEPTION_CODE_AUTH_CUSTOMER_AUTHORIZATION => array(
            'code' => self::EXCEPTION_CODE_AUTH_CUSTOMER_AUTHORIZATION,
            'group' => 'AUTH',
            'message' => 'Not authorized to see this resource',
            'description' => 'Corresponds with HTTP 403 — Resource cannot access by the authenticating user.',
            'httpStatusCode' => Response::HTTP_FORBIDDEN
        ),
        self::EXCEPTION_CODE_AUTH_LOGIN => array(
            'code' => self::EXCEPTION_CODE_AUTH_LOGIN,
            'group' => 'AUTH',
            'message' => 'Unauthorized, login required',
            'description' => 'Corresponds with a HTTP 401 - It means customer re-login required.',
            'httpStatusCode' => Response::HTTP_UNAUTHORIZED
        ),
        self::EXCEPTION_CODE_INFO_MESSAGE => array(
            'code' => self::EXCEPTION_CODE_INFO_MESSAGE,
            'group' => 'INFO',
            'message' => 'Human readable message',
            'description' => "Corresponds with a HTTP 400 - Validation failure.",
            'httpStatusCode' => Response::HTTP_BAD_REQUEST
        ),
        self::EXCEPTION_CODE_FATAL_RESTART => array(
            'code' => self::EXCEPTION_CODE_FATAL_RESTART,
            'group' => 'FATAL',
            'message' => 'Application restart required',
            'description' => 'Corresponds with an HTTP 500 - Application restart required.',
            'httpStatusCode' => Response::HTTP_INTERNAL_SERVER_ERROR
        ),
    );

}
