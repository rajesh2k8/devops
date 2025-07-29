<?php
declare(strict_types=1);

require_once 'addition.php';

/**
 * Simple test runner for addition functionality
 * PHP 8.4 implementation without external dependencies
 */

class AdditionTest
{
    private int $passed = 0;
    private int $failed = 0;
    private array $failures = [];

    public function runAllTests(): void
    {
        echo "Running Addition Tests...\n\n";

        $this->testAddTwoNumbers();
        $this->testAddMultipleNumbers();
        $this->testAddWithFloats();
        $this->testAddWithZero();
        $this->testAddNegativeNumbers();
        $this->testStandaloneFunction();
        $this->testEmptyInput();
        $this->testSingleNumber();

        $this->printResults();
    }

    private function testAddTwoNumbers(): void
    {
        $calculator = new AdditionCalculator();
        $result = $calculator->addTwoNumbers(5, 3);
        $this->assertEquals(8.0, $result, "Adding 5 + 3 should equal 8");
    }

    private function testAddMultipleNumbers(): void
    {
        $calculator = new AdditionCalculator();
        $result = $calculator->addNumbers(1, 2, 3, 4, 5);
        $this->assertEquals(15.0, $result, "Adding 1+2+3+4+5 should equal 15");
    }

    private function testAddWithFloats(): void
    {
        $calculator = new AdditionCalculator();
        $result = $calculator->addNumbers(1.5, 2.7, 3.2);
        $this->assertEquals(7.4, $result, "Adding 1.5+2.7+3.2 should equal 7.4", 0.001);
    }

    private function testAddWithZero(): void
    {
        $calculator = new AdditionCalculator();
        $result = $calculator->addNumbers(5, 0, 3);
        $this->assertEquals(8.0, $result, "Adding 5+0+3 should equal 8");
    }

    private function testAddNegativeNumbers(): void
    {
        $calculator = new AdditionCalculator();
        $result = $calculator->addNumbers(-5, 3, -2);
        $this->assertEquals(-4.0, $result, "Adding -5+3+(-2) should equal -4");
    }

    private function testStandaloneFunction(): void
    {
        $result = add(10, 20, 30);
        $this->assertEquals(60.0, $result, "Standalone add function should work correctly");
    }

    private function testEmptyInput(): void
    {
        $calculator = new AdditionCalculator();
        $this->expectException(function() use ($calculator) {
            $calculator->addNumbers();
        }, "Empty input should throw InvalidArgumentException");
    }

    private function testSingleNumber(): void
    {
        $calculator = new AdditionCalculator();
        $result = $calculator->addNumbers(42);
        $this->assertEquals(42.0, $result, "Single number should return itself");
    }

    private function assertEquals(float $expected, float $actual, string $message, float $delta = 0.0): void
    {
        if (abs($expected - $actual) <= $delta) {
            $this->passed++;
            echo "✓ PASS: {$message}\n";
        } else {
            $this->failed++;
            $this->failures[] = "{$message} - Expected: {$expected}, Got: {$actual}";
            echo "✗ FAIL: {$message} - Expected: {$expected}, Got: {$actual}\n";
        }
    }

    private function expectException(callable $callback, string $message): void
    {
        try {
            $callback();
            $this->failed++;
            $this->failures[] = "{$message} - No exception was thrown";
            echo "✗ FAIL: {$message} - No exception was thrown\n";
        } catch (InvalidArgumentException $e) {
            $this->passed++;
            echo "✓ PASS: {$message}\n";
        } catch (Exception $e) {
            $this->failed++;
            $this->failures[] = "{$message} - Wrong exception type: " . get_class($e);
            echo "✗ FAIL: {$message} - Wrong exception type: " . get_class($e) . "\n";
        }
    }

    private function printResults(): void
    {
        echo "\n" . str_repeat("=", 50) . "\n";
        echo "Test Results:\n";
        echo "Passed: {$this->passed}\n";
        echo "Failed: {$this->failed}\n";
        echo "Total:  " . ($this->passed + $this->failed) . "\n";

        if ($this->failed > 0) {
            echo "\nFailures:\n";
            foreach ($this->failures as $failure) {
                echo "- {$failure}\n";
            }
            exit(1);
        } else {
            echo "\nAll tests passed! ✓\n";
        }
    }
}

// Run tests if this file is executed directly
if (php_sapi_name() === 'cli' && basename(__FILE__) === basename($_SERVER['SCRIPT_NAME'])) {
    $test = new AdditionTest();
    $test->runAllTests();
} 