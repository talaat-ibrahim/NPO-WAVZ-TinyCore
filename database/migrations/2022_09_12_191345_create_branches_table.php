<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string("main_order_id")->nullable();
            $table->string("backup_order_id")->nullable();
            $table->foreignId('network_id')->nullable()->constrained()->cascadeOnDelete();
            $table->json("name")->nullable();
            $table->text("area")->nullable();
            $table->text("sector")->nullable();
            $table->text("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("financial_code")->nullable();
            $table->string('wan_ip')->nullable();
            $table->string('lan_ip')->nullable();
            $table->string('tunnel_ip')->nullable();
            $table->text('additional_ips')->nullable();
            $table->foreignId('project_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('line_capacity')->nullable();
            $table->longText('notes')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('post_number')->nullable();
            $table->string('technical_support_name')->nullable();
            $table->string('technical_support_phone')->nullable();
            $table->string('branch_manager_name')->nullable();
            $table->string('branch_manager_phone')->nullable();
            $table->foreignId('branch_level_id')->nullable()->constrained()->cascadeOnDelete();
            $table->json('working_days')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('modeling')->nullable();
            $table->string('ups_installation')->nullable();
            $table->foreignId('line_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->longText('ip_notes')->nullable();
            $table->boolean('installation_and_commissioning');
            $table->foreignId('router_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('postal_user_id')->nullable();
            $table->string('counter_user_id')->nullable();
            $table->string('viop_no')->nullable();
            $table->string('atm_ip')->nullable();
            $table->boolean('atm_exists')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('branches');
    }
}
