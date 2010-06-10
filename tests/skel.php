<?php

$dir = new RecursiveDirectoryIterator('../src');
$iter = new RecursiveIteratorIterator($dir);

foreach ($iter as $file) {
    $name = $file->getBasename();

    if ($name[0] == '.' || substr($name, -4) != '.php' || !$file->isFile()) {
        continue;
    }

    $class = str_replace('.php', '', $name);
    $namespace = str_replace('../src/', '', $file->getPath());

    $testClass = $class . 'Test';
    $testFile = 'src/' . $namespace . '/' . $testClass . '.php';

    $testPath = str_repeat('../', substr_count($testFile, '/'));
    $baseFile = $testPath . 'TestCase.php';

    $unitClass = 'PEAR2\phpDocumentor2\\' . $namespace . '\\' . $class;
    $unitFile = $testPath . '../' . str_replace($testClass, $class, $testFile);

    if (!is_dir('src/' . $namespace)) {
        mkdir('src/' . $namespace, 0777, true);
    }

    if (is_file($testFile)) {
        continue;
    }

    $test=<<<TEST
<?php

use $unitClass;

require '$baseFile';
require '$unitFile';

class $testClass extends TestCase {
}

?>
TEST;

    file_put_contents($testFile, $test);
}

?>
