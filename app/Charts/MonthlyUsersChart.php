<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        return $this->chart->areaChart()
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setHeight(270)
            ->setColors(['#FFFFFF'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
