<?php

final class RoboFile extends \Robo\Tasks
{
    public function verify($opts = ['debug|d' => false])
    {
        $debug = !$opts['debug'] ? '' : ' --debug';
        $result = $this->_exec('phpdbg -qrr /usr/local/bin/codecept run --fail-fast'.$debug);
        file_put_contents('/result/verify.output', $result->getOutputData());

        if (! $result->wasSuccessful()) {
            $this->yell(
                'Some verifications failed.'.PHP_EOL.
                'Please review on "result/verify.output".',
                40,
                'red'
            );
        } else {
            $this->yell('All verifications passed.');
        }
    }
}
