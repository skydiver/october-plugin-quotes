<?php

    namespace Martin\Quotes\Updates;

    use Schema;
    use October\Rain\Database\Updates\Migration;

    class CreateTable extends Migration {

        public function up() {
            Schema::create('martin_quotes_items', function($table) {
                $table->increments('id')->unsigned();
                $table->text  ('quote' );
                $table->string('author')->nullable();
                $table->string('link'  )->nullable();
                $table->string('image' )->nullable();
                $table->timestamps();
            });
        }

        public function down() {
            Schema::drop('martin_quotes_items');
        }

    }

?>