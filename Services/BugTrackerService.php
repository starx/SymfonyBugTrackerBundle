<?php
namespace Starx\SymfonyBugTrackerBundle\Services;

use Doctrine\ORM\EntityManager;
use Starx\BugTrackerBundle\Entity\Issue;
use Symfony\Component\HttpFoundation\RequestStack;

class BugTrackerService
{
    /** @var  EntityManager */
    private $em;
    /** @var RequestStack */
    private $request_stack;
    /** @var IssueService */
    private $issueService;


    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function setRequestStack(RequestStack $stack) {
        $this->request_stack = $stack;
    }

    public function setIssueService(IssueService $service) {
        $this->issueService = $service;
    }

    public function reportException(\Exception $e) {
        $entity = new Issue();
        $entity
            ->setIssueType(Issue::TYPE_EXCEPTION)
            ->setSummary($e->getMessage())
            ->setPriority(Issue::PRIORITY_CRITICAL)
            ->setRequestData(serialize($this->request_stack))
            ->setAdditionalData($e->getTraceAsString());
        $this->issueService->reportIssue($entity);
    }

    public function reportIssue($type, $summary, $priority, $description = null) {
        $entity = new Issue();
        $entity
            ->setIssueType($type)
            ->setSummary($summary)
            ->setPriority($priority)
            ->setDescription($description)
            ->setRequestData(serialize($this->request_stack));
        $this->issueService->reportIssue($entity);
    }

}