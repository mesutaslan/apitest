<?php

namespace AppBundle\Controller;

use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthController extends Controller
{
    protected $encoder;

    protected $tokenManager;

    /**
     * AuthService constructor.
     */
    public function __construct(UserPasswordEncoderInterface $encoder, JWTTokenManagerInterface $tokenManager)
    {
        $this->encoder = $encoder;
        $this->tokenManager = $tokenManager;
    }
    public function register(Request $request)
    {
        /** @var $authService \AppBundle\Service\AuthServiceInterface */

        $authService = $this->get('AppBundle\Service\AuthService');

        $result = $authService->register($request, $this->encoder);
        return new Response($result[0], $result[1]);

    }

    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }

    public function createToken(Request $request)
    {
        /** @var $authService \AppBundle\Service\AuthServiceInterface */

        $authService = $this->get('AppBundle\Service\AuthService');

        $result = $authService->createToken($request, $this->tokenManager);
        return new Response($result[0], $result[1]);
    }
}