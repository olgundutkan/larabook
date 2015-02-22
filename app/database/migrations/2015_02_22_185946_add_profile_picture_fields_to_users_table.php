<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddProfilePictureFieldsToUsersTable extends Migration {

    /**
     * Make changes to the table.
     *
     * @return void
     */
    public function up()
    {   
        Schema::table('users', function(Blueprint $table) {     
            
            $table->string('profile_picture_file_name')->nullable()->after('language_id');
            $table->integer('profile_picture_file_size')->nullable()->after('profile_picture_file_name');
            $table->string('profile_picture_content_type')->nullable()->after('profile_picture_file_size');
            $table->timestamp('profile_picture_updated_at')->nullable()->after('profile_picture_content_type');

        });

    }

    /**
     * Revert the changes to the table.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {

            $table->dropColumn('profile_picture_file_name');
            $table->dropColumn('profile_picture_file_size');
            $table->dropColumn('profile_picture_content_type');
            $table->dropColumn('profile_picture_updated_at');

        });
    }

}
