<?php
declare(strict_types=1);

/**
 * Addition functionality for DevOps Academy
 * PHP 8.4 implementation with modern features
 */

class AdditionCalculator
{
    /**
     * Add multiple numbers together
     *
     * @param float|int ...$numbers Variable number of numeric arguments
     * @return float The sum of all provided numbers
     * @throws InvalidArgumentException If no arguments are provided
     */
    public function addNumbers(float|int ...$numbers): float
    {
        if (empty($numbers)) {
            throw new InvalidArgumentException("At least one number must be provided");
        }

        return array_sum($numbers);
    }

    /**
     * Add two numbers together
     *
     * @param float|int $a First number
     * @param float|int $b Second number
     * @return float The sum of a and b
     */
    public function addTwoNumbers(float|int $a, float|int $b): float
    {
        return $a + $b;
    }
}

/**
 * Standalone function for simple addition
 *
 * @param float|int ...$numbers Variable number of numeric arguments
 * @return float The sum of all provided numbers
 * @throws InvalidArgumentException If no arguments are provided
 */
function add(float|int ...$numbers): float
{
    if (empty($numbers)) {
        throw new InvalidArgumentException("At least one number must be provided");
    }

    return array_sum($numbers);
}

/**
 * Command-line interface for addition functionality
 */
function runCliAddition(): void
{
    global $argv;
    
    if (count($argv) < 3) {
        echo "Usage: php addition.php <number1> <number2> [number3] ...\n";
        echo "Example: php addition.php 5 3\n";
        echo "Example: php addition.php 1.5 2.7 3.2\n";
        exit(1);
    }

    try {
        $numbers = array_slice($argv, 1);
        $numericNumbers = array_map(function($value) {
            if (!is_numeric($value)) {
                throw new InvalidArgumentException("'{$value}' is not a valid number");
            }
            return (float) $value;
        }, $numbers);

        $calculator = new AdditionCalculator();
        $result = $calculator->addNumbers(...$numericNumbers);
        
        echo "Sum of [" . implode(", ", $numericNumbers) . "] = {$result}\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        exit(1);
    }
}

// Run CLI interface if this file is executed directly
if (php_sapi_name() === 'cli' && basename(__FILE__) === basename($_SERVER['SCRIPT_NAME'])) {
    runCliAddition();
} 