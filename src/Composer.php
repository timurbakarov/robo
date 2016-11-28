<?php

namespace Tiix\Robo;

trait Composer
{
    /**
     * @return $this
     */
    private function composerInstall($dir, $noDev = false)
    {
        $task = $this->taskComposerInstall()
            ->dir($dir);

        if($task) {
            $task->noDev();
        }

        return $task;
    }

    private function composerUpdate($dir, $noDev = false)
    {
        $task = $this->taskComposerUpdate()
            ->dir($dir);

        if($task) {
            $task->noDev();
        }

        return $task;

    }
}