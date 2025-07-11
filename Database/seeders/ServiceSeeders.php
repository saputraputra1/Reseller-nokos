Schema::create('services', function (Blueprint $table) {
    $table->id();
    $table->string('country');
    $table->string('operator');
    $table->string('product');
    $table->float('price_usd');
    $table->float('markup')->default(1.2);
    $table->timestamps();
});
