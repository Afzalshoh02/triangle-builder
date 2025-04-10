<?php

namespace App\Services;

class TriangleService
{
    public function buildTriangle(int $number): ?array
    {
        $rows = $this->calculateRows($number);
        if ($rows === null) {
            return null;
        }

        return $this->generateTriangle($number, $rows);
    }

    private function calculateRows(int $number): ?int
    {
        $total = 0;
        $rows = 0;

        for ($n = 1; $total < $number; $n += 2) {
            $total += $n;
            $rows++;
            if ($total === $number) {
                return $rows;
            }
        }

        return null;
    }

    private function generateTriangle(int $number, int $rows): array
    {
        $result = [];
        $currentNumber = 1;
        $maxWidth = 2 * $rows - 1;

        for ($i = 0; $i < $rows; $i++) {
            $elementsInRow = 2 * $i + 1;
            $spaces = $rows - $i;

            $row = str_repeat(' ', $spaces);
            for ($j = 0; $j < $elementsInRow && $currentNumber <= $number; $j++) {
                $row .= $currentNumber;
                if ($j < $elementsInRow - 1) {
                    $row .= ' ';
                }
                $currentNumber++;
            }

            $result[] = $row;
        }

        return $result;
    }
}
