Schema::create('topups', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->integer('amount');
    $table->string('bukti_transfer');
    $table->enum('status', ['pending','approved','rejected'])->default('pending');
    $table->timestamps();
});
