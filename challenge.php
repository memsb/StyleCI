<?php

$questions = [
    'Abstract Factory',
    'Builder',
    'Factory Method',
    'Prototype',
    'Singleton',
    'Adapter',
    'Bridge',
    'Composite',
    'Decorator',
    'Flyweight',
    'Facade',
    'Proxy',
    'Chain of Responsibility',
    'Command',
    'Interpreter',
    'Iterator',
    'Mediator',
    'Memento',
    'Observer',
    'State',
    'Strategy',
    'Template Method',
    'Visitor',
    'Single responsibility',
    'Open Closed',
    'Liskov Substitution',
    'Interface Segregation',
    'Dependency Injection',
];

$index = array_rand($questions);
$pattern = $questions[$index];
echo "Please explain the {$pattern} pattern".PHP_EOL;
