<?php
namespace Starx\SymfonyBugTrackerBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Starx\SymfonyBugTrackerBundle\Entity\Issue;
use Symfony\Component\HttpFoundation\RequestStack;

class IssueService
{

    /** @var  Registry */
    private $doctrineRegistry;
    /** @var  EntityManager */
    private $entityManager;
    /** @var RequestStack */
    private $request_stack;
    private $env;

    public function __construct(Registry $doctrineRegistry) {
        $this->doctrineRegistry = $doctrineRegistry;
        $this->entityManager = $this->doctrineRegistry->getManager();
    }

    public function setRequestStack(RequestStack $stack) {
        $this->request_stack = $stack;
    }

    public function setEnv($env) {
        $this->env = $env;
    }

    public function reportIssue(Issue $entity) {
        try {
            $this->entityManager->rollback();
            $this->entityManager->persist($entity);
            $this->entityManager->flush();
            return true;
        } catch(ORMException $e) {
            // reset entity manager
            if (!$this->entityManager->isOpen()) {
                $this->entityManager = $this->entityManager->create(
                    $this->entityManager->getConnection(),
                    $this->entityManager->getConfiguration()
                );
                return $this->reportIssue($entity);
            }
        }
        return false;
    }

}