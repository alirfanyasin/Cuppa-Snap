<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyAdminChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        return $this->chart->areaChart()
            ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
            ->setHeight(270)
            ->setColors(['#FFFFFF'])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
