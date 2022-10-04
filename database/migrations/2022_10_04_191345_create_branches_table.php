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
            $table->json("name")->nullable();
            $table->text("area")->nullable();
            $table->text("sector")->nullable();
            $table->string("financial_code")->nullable();
            $table->string('post_number')->nullable();
            $table->string('technical_support_phone')->nullable();
            $table->string('technical_support_name')->nullable();
            $table->string('branch_manager_name')->nullable();
            $table->string('branch_manager_phone')->nullable();
            $table->string("telephone")->nullable();
            $table->string('viop_no')->nullable();
            $table->foreignId('branch_level_id')->nullable()->constrained()->cascadeOnDelete();
            $table->json('working_days')->nullable();
            $table->json('working_hours')->nullable();
            $table->text("address")->nullable();
            $table->string("main_order_id")->nullable();
            $table->string("backup_order_id")->nullable();
            $table->foreignId('project_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('modeling')->nullable();
            $table->foreignId('ups_installation_id')->nullable()->constrained()->cascadeOnDelete();

           
            $table->foreignId('line_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('line_capacity_id')->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('added_on_entuity')->nullable();
            $table->foreignId('entuity_status_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('lan_ip')->nullable();
            $table->text('additional_ips')->nullable();
            $table->longText('ip_notes')->nullable();
            $table->longText('notes')->nullable();
            $table->string('wan_ip')->nullable();
            $table->string('tunnel_ip')->nullable();
            $table->string('router_serial')->nullable();
            $table->string('router_model_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('entuity_systemname')->nullable();
            $table->string('switch_serial')->nullable();
            $table->foreignId('switch_model_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('government_id')->nullable()->constrained()->cascadeOnDelete();

            
           
            $table->string('switch_ip')->nullable();
            $table->longText('switch_nots')->nullable();
            $table->boolean('atm_exists')->default(false)->nullable();
            $table->string('atm_ip')->nullable();
            $table->boolean('installation_and_commissioning')->nullable();
            $table->foreignId('network_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('postal_user_id')->nullable();
            $table->string('counter_user_id')->nullable();
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
