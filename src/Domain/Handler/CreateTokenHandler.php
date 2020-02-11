<?php

namespace App\Domain\Handler;

use App\Domain\Exception\AccessDeniedException;
use App\Domain\Exception\UnknownScopeException;
use App\Domain\Factory\TokenFactory;
use App\Domain\Message\CreateTokenMessage;
use App\Domain\Model\ScopeCollection;
use App\Domain\Model\ScopeInterface;
use App\Domain\Model\TokenInterface;
use App\Domain\Model\UserInterface;
use App\Domain\Ports\ScopeRepositoryInterface;
use App\Domain\Ports\UserRepositoryInterface;
use App\Domain\Ports\UuidFactoryInterface;

class CreateTokenHandler
{
    private TokenFactory $tokenFactory;
    private ScopeRepositoryInterface $scopeRepository;
    private UserRepositoryInterface $userRepository;
    private UuidFactoryInterface $uuidFactory;

    public function __construct(
        TokenFactory $tokenFactory,
        ScopeRepositoryInterface $scopeRepository,
        UserRepositoryInterface $userRepository,
        UuidFactoryInterface $uuidFactory
    ) {
        $this->tokenFactory = $tokenFactory;
        $this->scopeRepository = $scopeRepository;
        $this->userRepository = $userRepository;
        $this->uuidFactory = $uuidFactory;
    }

    public function __invoke(CreateTokenMessage $message): TokenInterface
    {
        $user = $this->userRepository->find($message->userId);

        if (!$user instanceof UserInterface) {
            throw new AccessDeniedException($message->userId);
        }

        $scopes = [];
        foreach($message->scopes as $scopeId) {
            $scope = $this->scopeRepository->find($scopeId);
            if (!$scope instanceof ScopeInterface) {
                throw new UnknownScopeException($scopeId);
            }

            $scopes[] = $scope;
        }

        return $this->tokenFactory->createToken(
            $this->uuidFactory->generate(),
            $user,
            new ScopeCollection($scopes)
        );
    }
}