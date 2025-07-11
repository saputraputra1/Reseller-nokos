Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('service_id');
    $table->string('order_api_id');
    $table->string('phone')->nullable();
    $table->string('status');
    $table->text('sms')->nullable();
    $table->timestamps();
});
