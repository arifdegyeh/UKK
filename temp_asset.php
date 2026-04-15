<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$url = asset('storage/' . 'aspirasi-lampiran/u4YK1HqNhNdfU4QEUAovwjNSZxshGuEjzVNDYOBg.png');
var_dump($url);
