<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppearanceSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appearance_setting', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained('users')->onDelete('cascade');
            $table->string('button360Color')->nullable(true);
            $table->string('text_changed360view')->nullable(true);
            $table->string('image360_backgroundColor')->nullable(true);
            $table->string('home_buttonColor')->nullable(true);
            $table->string('homebuttontextColor')->nullable(true);
            $table->string('Inhomeimg_backgroundColor')->nullable(true);
            $table->string('whishlistColorIcon')->nullable(true);
            $table->string('whishlistColor')->nullable(true);
            $table->string('tracking_button_backgroundColor')->nullable(true);
            $table->string('textSize360')->nullable(true);
            $table->string('textSizeHomeButton')->nullable(true);
            $table->string('textSizewishlistButton')->nullable(true);
            $table->string('tracking_button_fontsize')->nullable(true);
            $table->string('peview_button_background_color')->nullable(true);
            $table->string('upload_font_awesome360')->nullable(true);
            $table->string('inhome_upload_fontAwesome')->nullable(true);
            $table->string('whishlist_font_awesome')->nullable(true);
            $table->string('preview_font_awesome')->nullable(true);
            
            $table->string('buttonHeight360')->nullable(true);
            $table->string('buttonwidth360')->nullable(true);
            $table->string('button_borderradius360')->nullable(true);
            
            $table->string('Inhomebuttonheight')->nullable(true);
            $table->string('Inhomebuttonwidth')->nullable(true);
            $table->string('Inhomebutton_borderradius')->nullable(true);
            
            $table->string('whishlistButtonheight')->nullable(true);
            $table->string('whishlistButtonwidth')->nullable(true);
            $table->string('whishlistButton_borderRadius')->nullable(true);
            
            $table->string('previewbuttonheight')->nullable(true);
            $table->string('previewbuttonwidth')->nullable(true);
            $table->string('previewButton_borderadius')->nullable(true);
            $table->string('remove_whishlist_font_icon')->nullable(true);
            
            $table->string('whishlist_remove_icon_buttonheight')->nullable(true);
            $table->string('whishlist_remove_icon_buttonwidth')->nullable(true);
            $table->string('whishlist_remove_icon_borderadius')->nullable(true);
            
            $table->string('whishlist_remove_icon_text_color')->nullable(true);
            $table->string('whishlist_remove_icon_background_color')->nullable(true);
            $table->string('whishlist_remove_icon_font_size')->nullable(true);
            
            
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
        Schema::dropIfExists('appearance_setting');
    }
}
