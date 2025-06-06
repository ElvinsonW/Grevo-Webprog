<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('organization_id');
            $table->string('organization_name');
            $table->string('operational_address');
            $table->text('brief_description');
            $table->string('coverage_region');
            $table->string('official_contact_info');
            $table->string('types_of_tree_planted');
            $table->string('existing_partner_or_sponsor')->nullable();
            $table->string('organization_status');
            $table->string('organization_logo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
