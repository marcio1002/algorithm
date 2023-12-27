<?php

namespace Algorithm\Helpers;

class Time 
{
    private float $start_time = 0;
    private float $end_time = 0;

    public function start(): void
    {
      $this->start_time=  microtime(true);
    }

    public function end(): void
    {
        $this->end_time = microtime(true);
    }

    public function duration(): float
    {
        return number_format($this->end_time - $this->start_time, 4);
    }
}