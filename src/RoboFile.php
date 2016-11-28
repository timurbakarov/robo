<?php

namespace Tiix\Robo;

class RoboFile extends \Robo\Tasks
{
    use Composer;
    use Git;

    /**
     * @param $message
     */
    protected function success($message)
    {
        $this->yell($message);
    }

    /**
     * @param $message
     */
    protected function warning($message)
    {
        $this->yell($message, 40, 'yellow');
    }

    /**
     * @param $message
     */
    protected function danger($message)
    {
        $this->yell($message, 40, 'red');
    }

    /**
     * @param array $tasks
     */
    protected function runTasks(array $tasks)
    {
        foreach($tasks as $desc => $task) {
            $this->yell($desc);
            if(!$task->run()->wasSuccessful()) {
                $this->danger('Fail');
                break;
            }
        }
    }
}