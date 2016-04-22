<?php

namespace Starx\SymfonyBugTrackerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Issue
 *
 * @ORM\Table(name="bt_issue")
 * @ORM\Entity(repositoryClass="Starx\SymfonyBugTrackerBundle\Repository\IssueRepository")
 */
class Issue
{
    const TYPE_FEATURE = 'feature';
    const TYPE_TASK = 'task';
    const TYPE_IMPROVEMENT = 'improvement';
    const TYPE_EPIC = 'epic';
    const TYPE_STORY = 'story';
    const TYPE_REFACTOR = 'refactor';
    const TYPE_BUG = 'bug';
    const TYPE_ERROR = 'error';
    const TYPE_FATAL_ERROR = 'fatal_error';
    const TYPE_EXCEPTION = 'exception';

    const PRIORITY_URGENT = 'urgent';
    const PRIORITY_CRITICAL = 'critical';
    const PRIORITY_HIGH = 'high';
    const PRIORITY_NORMAL = 'normal';
    const PRIORITY_low = 'low';
    const PRIORITY_MINOR = 'minor';
    const PRIORITY_MAJOR = 'major';
    const PRIORITY_TRIVIAL = 'trivial';

    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_OPEN = 'open';
    const STATUS_REOPENED = 'reopened';
    const STATUS_IN_TESTING = 'in_testing';
    const STATUS_CLOSED = 'closed';
    const STATUS_BUILDING = 'building';
    const STATUS_BUILD_BROKEN = 'build_broken';
    const STATUS_DONE = 'done';
    const STATUS_IN_REVIEW = 'in_review';
    const STATUS_NOT_APPROVED = 'not_approved';
    const STATUS_TO_DO = 'to_do';
    const STATUS_BACKLOG = 'backlog';
    const STATUS_SELECTION_FOR_DEVELOPMENT = 'selection_for_development';
    const STATUS_PENDING = 'pending';
    const STATUS_TO_REVIEW = 'to_review';

    const RESOLUTION_FIXED = 'fixed';
    const RESOLUTION_WONT_FIX = 'wont_fix';
    const RESOLUTION_DUPLICATE = 'duplicate';
    const RESOLUTION_INCOMPLETE = 'incomplete';
    const RESOLUTION_CANNOT_REPRODUCE = 'cannot_reproduce';
    const RESOLUTION_DONE = 'done';
    const RESOLUTION_WONT_DO = 'wont_do';

    const ENV_DEV = 'dev';
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="issue_time", type="datetime", nullable=true)
     */
    private $issue_time;

    /**
     * @var string
     *
     * @ORM\Column(name="issue_type", type="string", length=45, nullable=true)
     */
    private $issue_type;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=255, nullable=true)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="priority", type="string", length=45, nullable=true)
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="env", type="string", length=45, nullable=true)
     */
    private $env;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="request_data", type="text", nullable=true)
     */
    private $request_data;

    /**
     * @var string
     *
     * @ORM\Column(name="additional_data", type="text", nullable=true)
     */
    private $additional_data;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set issueTime
     *
     * @param \DateTime $issueTime
     *
     * @return Issue
     */
    public function setIssueTime($issueTime)
    {
        $this->issue_time = $issueTime;

        return $this;
    }

    /**
     * Get issueTime
     *
     * @return \DateTime
     */
    public function getIssueTime()
    {
        return $this->issue_time;
    }

    /**
     * Set issueType
     *
     * @param string $issueType
     *
     * @return Issue
     */
    public function setIssueType($issueType)
    {
        $this->issue_type = $issueType;

        return $this;
    }

    /**
     * Get issueType
     *
     * @return string
     */
    public function getIssueType()
    {
        return $this->issue_type;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Issue
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set priority
     *
     * @param string $priority
     *
     * @return Issue
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set env
     *
     * @param string $env
     *
     * @return Issue
     */
    public function setEnv($env)
    {
        $this->env = $env;

        return $this;
    }

    /**
     * Get env
     *
     * @return string
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Issue
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set requestData
     *
     * @param string $requestData
     *
     * @return Issue
     */
    public function setRequestData($requestData)
    {
        $this->request_data = $requestData;

        return $this;
    }

    /**
     * Get requestData
     *
     * @return string
     */
    public function getRequestData()
    {
        return $this->request_data;
    }

    /**
     * Set additionalData
     *
     * @param string $additionalData
     *
     * @return Issue
     */
    public function setAdditionalData($additionalData)
    {
        $this->additional_data = $additionalData;

        return $this;
    }

    /**
     * Get additionalData
     *
     * @return string
     */
    public function getAdditionalData()
    {
        return $this->additional_data;
    }
}

