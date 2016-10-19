<?php

namespace Starx\SymfonyBugTrackerBundle;

use Starx\SymfonyBugTrackerBundle\DependencyInjection\StarxSymfonyBugTrackerExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class StarxSymfonyBugTrackerBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new StarxSymfonyBugTrackerExtension();
        }

        return $this->extension;
    }
}
