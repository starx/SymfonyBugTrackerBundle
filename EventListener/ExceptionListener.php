<?php

namespace Starx\SymfonyBugTrackerBundle\EventListener;


use Starx\SymfonyBugTrackerBundle\Services\BugTrackerService;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    /** @var BugTrackerService */
    protected $bugTrackerService;

    public function setIssueService(BugTrackerService $service) {
        $this->bugTrackerService = $service;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        // You get the exception object from the received event
        $exception = $event->getException();
        $this->bugTrackerService->reportException($exception);

        return true;
    }
}