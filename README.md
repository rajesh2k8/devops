# DevOps Academy - Addition Functionality

This repository contains addition functionality implemented in PHP 8.4, demonstrating modern PHP features and best practices.
- making some changes to test the build and added test

## Features

- **AdditionCalculator Class**: Object-oriented approach with type safety
- **Standalone Functions**: Simple functional interface
- **Command-line Interface**: Direct execution from terminal
- **Comprehensive Testing**: Built-in test suite without external dependencies
- **PHP 8.4 Features**: Union types, strict typing, and modern syntax

## Files

- `addition.php` - Main addition functionality
- `test_addition.php` - Test suite for validation
- `README.md` - This documentation

## Usage

### Command Line Interface

```bash
# Add two numbers
php addition.php 5 3

# Add multiple numbers
php addition.php 1.5 2.7 3.2 4.1

# Add negative numbers
php addition.php -5 10 -2
```

### Programmatic Usage

```php
<?php
require_once 'addition.php';

// Using the AdditionCalculator class
$calculator = new AdditionCalculator();

// Add two numbers
$result = $calculator->addTwoNumbers(5, 3); // Returns 8.0

// Add multiple numbers
$result = $calculator->addNumbers(1, 2, 3, 4, 5); // Returns 15.0

// Using the standalone function
$result = add(10, 20, 30); // Returns 60.0
?>
```

## Testing

Run the built-in test suite:

```bash
php test_addition.php
```

The test suite covers:
- Basic two-number addition
- Multiple number addition
- Floating-point arithmetic
- Zero handling
- Negative numbers
- Error conditions
- Edge cases

## Requirements

- PHP 8.4 or higher
- CLI access for command-line usage

## PHP 8.4 Features Used

- **Union Types**: `float|int` for flexible numeric input
- **Strict Types**: `declare(strict_types=1)` for type safety
- **Variadic Functions**: `...$numbers` for multiple arguments
- **Return Type Declarations**: All functions have explicit return types
- **Modern Exception Handling**: Proper error messaging and type checking
