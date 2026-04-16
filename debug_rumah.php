<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$r = App\Models\Rumah::find(2);
var_dump($r?->only(['id','nama_rumah','luas_tanah','luas_bangunan','kamar_tidur','kamar_mandi','lantai','carport','tipe_id']));
