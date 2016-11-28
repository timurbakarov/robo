<?php

namespace Tiix\Robo;

trait Git
{
    /**
     * @param $dir
     * @param $tagName
     * @param string $message
     * @return mixed
     */
    protected function gitTag($dir, $tagName, $message = '')
    {
        return $this->taskGitStack()
            ->stopOnFail()
            ->dir($dir)
            ->tag($tagName, $message)
        ;
    }

    /**
     * @param $branch
     * @param $dir
     * @return \Robo\Result
     */
    protected function gitPull($dir, $branch)
    {
        return $this->taskGitStack()
            ->stopOnFail()
            ->dir($dir)
            ->pull('origin', $branch)
        ;
    }

    /**
     * @param $dir
     * @param $branch
     * @return \Robo\Result
     */
    protected function gitCheckout($dir, $branch)
    {
        return $this->taskGitStack()
            ->stopOnFail()
            ->dir($dir)
            ->checkout($branch)
        ;
    }

    /**
     * @param $branch
     * @param $dir
     * @return mixed
     */
    protected function gitCreateBranch($dir, $branch, $checkout = false)
    {
        return $this->taskGitStack()
            ->stopOnFail()
            ->dir($dir)
            ->exec($checkout
                ? sprintf('git checkout -b %s', $branch)
                : sprintf('git branch %s', $branch)
            )
        ;
    }

    /**
     * @param $dir
     * @param string $message
     * @return mixed
     */
    protected function gitCommit($dir, $message = 'update')
    {
        return $this->taskGitStack()
            ->dir($dir)
            ->commit($message);
    }

    /**
     * @param $dir
     * @param $branch
     */
    protected function gitDeleteBranch($dir, $branch)
    {
        return $this->taskGitStack()
            ->stopOnFail()
            ->dir($dir)
            ->exec(sprintf('branch -D %s', $branch))
        ;
    }

    protected function gitAdd($dir, $pattern = '.')
    {
        return $this->taskGitStack()
            ->dir($dir)
            ->add($pattern);
    }

    /**
     * @param $dir
     * @param $branch
     * @return mixed
     */
    protected function gitPush($dir, $branch)
    {
        return $this->taskGitStack()
            ->dir($dir)
            ->push('origin', $branch)
        ;
    }
}