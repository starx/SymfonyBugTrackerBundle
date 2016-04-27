<?php

namespace Starx\SymfonyBugTrackerBundle\EventListener;


use Starx\SymfonyBugTrackerBundle\Services\BugTrackerService;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    /** @var BugTrackerService */
    protected $bugTrackerService;
    protected $automatic_reporting = false;



    /**
     * @param BugTrackerService $bugTrackerService
     */
    public function setBugTrackerService($bugTrackerService)
    {
        $this->bugTrackerService = $bugTrackerService;
    }

    /**
     * @param boolean $automatic_reporting
     */
    public function setAutomaticReporting($automatic_reporting)
    {
        $this->automatic_reporting = $automatic_reporting;
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if($this->automatic_reporting === true) {
            // You get the exception object from the received event
            $exception = $event->getException();
            $this->bugTrackerService->reportException($exception);
        }
    }
}