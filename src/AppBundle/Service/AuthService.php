<?php

namespace AppBundle\Service;

use AppBundle\Entity\User;
use AppBundle\Service\AbstractService;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTManager;

class AuthService extends AbstractService implements AuthServiceInterface
{
    public function register($request, $encoder)
    {
        $username = $request->request->get('_username');
        $password = $request->request->get('_password');


        /** @var $user \AppBundle\Entity\User */
        $user = $this->getEntityManager()->getRepository(User::class)->findBy(['username'=>$username]);
        if (count($user) > 0) {
            return $this->serviceResponse(sprintf('%s is already exist', $username), 409);
        } else {
            /** @var $user \AppBundle\Entity\User */
            $user = new User($username);

            $user->setPassword($encoder->encodePassword($user, $password));
            $this->getEntityManager()->persist($user);

            try {
                $this->getEntityManager()->flush();
            } catch (\Exception $e) {
                return $this->serviceResponse($e->getMessage(), 409);
            }

            return $this->serviceResponse('User '.$user->getUsername().' successfully created', 201);
        }
    }

    public function createToken($request, $tokenManager)
    {
        $username = $request->request->get('_username');
        $password = $request->request->get('_password');

        /** @var $user \AppBundle\Entity\User */
        $user = $this->getEntityManager()->getRepository(User::class)->findBy(['username'=>$username]);
        if (count($user) > 0) {
            $token = $tokenManager->create($user[0]);
            return $this->serviceResponse($this->serialize(['token' => $token]), 200);
        } else {
            return $this->serviceResponse(['message' => 'Token not created!'], 409);
        }
    }
}
