<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$a = App\Models\Aspirasi::whereNotNull('lampiran')->first();
if ($a) {
    var_dump($a->lampiran);
} else {
    var_dump(null);
}
