<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('newId')->nullable();
            $table->string('product_name');
            $table->text('description');
            $table->text('style');
            $table->text('brand')->nullable();
            $table->string('url')->nullable();
            $table->string('product_type');
            $table->integer('shipping_price');
            $table->text('note')->nullable();
            $table->foreignIdFor(User::class, 'admin_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
