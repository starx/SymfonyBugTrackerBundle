<?php
namespace Starx\SymfonyBugTrackerBundle\Services;

use Doctrine\ORM\EntityManager;
use Starx\BugTrackerBundle\Entity\Issue;
use Symfony\Component\HttpFoundation\RequestStack;

class IssueService
{
    /** @var  EntityManager */
    private $em;
    /** @var RequestStack */
    private $request_stack;
    private $env;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function setRequestStack(RequestStack $stack) {
        $this->request_stack = $stack;
    }

    public function setEnv($env) {
        $this->env = $env;
    }

    public function reportIssue(Issue $entity) {
        try {
            $this->em->persist($entity);
            $this->em->flush();
            return true;
        } catch(\Exception $e) {
            throw $e;
            return false;
        }
    }

}