<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTableBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE OR REPLACE VIEW v_blogs AS 
            SELECT
            `b`.`blogs_id` AS `id`,
            `b`.`title_ind` AS `title_ind`,
            `b`.`title_en` AS `title_en`,
            `b`.`url` AS `url`,
            `b`.`images` AS `images`,
            `b`.`article_ind` AS `article_ind`,
            `b`.`article_en` AS `article_en`,
            `b`.`status` AS `status`,
            `b`.`category_blogs_id` AS `category_id`,
            `b`.`created_at` AS `created_at`,
            `cb`.`name_ind` AS `name_ind`,
            `cb`.`name_en` AS `name_en` 
            FROM
            ( `blogs` `b` LEFT JOIN `category_blogs` `cb` ON ( ( `b`.`category_blogs_id` = `cb`.`category_blogs_id` ) ) )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
