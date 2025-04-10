<?php

namespace App\Console\Commands;

use App\Services\TriangleService;
use Illuminate\Console\Command;

class BuildTriangle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'triangle:build {number : The number of elements}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build an isosceles triangle from given number of elements';

    private TriangleService $triangleService;

    public function __construct(TriangleService $triangleService)
    {
        parent::__construct();
        $this->triangleService = $triangleService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $number = $this->argument('number');

        if (!is_numeric($number) || $number <= 0) {
            $this->error('Please provide a positive integer');
            return 1;
        }

        $result = $this->triangleService->buildTriangle((int)$number);

        if ($result === null) {
            $this->error('Невозможно построить треугольник');
            return 1;
        }

        foreach ($result as $row) {
            $this->line($row);
        }

        return 0;
    }
}
