<?php

class Job
{
    private $jobName;
    private $employer;
    private $timeEmployed;

}

function __construct($jobName, $employer, $timeEmployed)
{
    $this->jobName = $jobName;
    $this->employer = $employer;
    $this->timeEmployed = $timeEmployed;
}

function getJobName()
{
    return $this->jobName;
}

function getEmployer()
{
    return $this->employer;
}

function getTimeEmployed()
{
    return $this->timeEmployed;
}

function save()
{
  array_push($_SESSION['list_of_jobs'], $this);
}

static function getAll()
{
    return $_SESSION['list_of_jobs'];
}

static function deleteAll()
{
    $_SESSION['list_of_jobs'] = array();
}

?>
