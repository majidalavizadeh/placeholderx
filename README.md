# PlaceHolderX File Name Generators
The filename generators can be used to create filenames based on a 
simple format based on the implementation. 

For this assignment, we require the implementations of the following 
generators:

## Generators

###  DateBasedFileNameGenerator

```
$generator = new DateBasedFileNameGenerator('Ymd_His');
echo $generator->get(); // 20160101_120000.txt

$generator->setExtension('csv')->get(); // 20160101_120000.csv
```

### SequenceBasedFileNameGenerator

```
$generator = new SequenceBasedFileNameGenerator();
echo $generator->get(); // 1.txt

echo $generator->setExtension('csv')->get(); // 2.csv

$generator = new SequenceBasedFileNameGenerator(5);
$generator->get(); // 5.txt

$generator->setExtension('foobar'); // Throws invalid extension exception
```

### CustomFileNameGenerator

A generator that can return a file based on something you came up with.


### Installation
run `composer install` to install PHPUnit package.

### Tests

**Test the DataBasedFileNameGenerator object**
```bash
vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests/CustomFileNameGeneratorTest.php
```
**Test the SequenceBasedFileNameGenerator object**
```bash
vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests/SequenceBasedFileNameGeneratorTest.php
```
**Test the CustomFileNameGenerator object**
```bash
vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests/CustomFileNameGeneratorTest.php
```

