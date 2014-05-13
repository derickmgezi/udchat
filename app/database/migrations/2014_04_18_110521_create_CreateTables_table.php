
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateTablesTable extends Migration {

	public function up()
	{
            Schema::create('users',function($attrib){
                $attrib->increments('id');
                $attrib->string('first_name',40);
                $attrib->string('sir_name',40);
                $attrib->string('nick_name',20)->unique();
                $attrib->string('gender',6);
                $attrib->boolean('status')->default(1);
                $attrib->text('bio')->nullable();
                $attrib->timestamp('first_login');
                $attrib->timestamp('login');
                $attrib->timestamp('logout')->nullable();
                $attrib->string('remember_token', 100);

                // created_at, updated_at DATETIME
                $attrib->timestamps();
            });
            
            Schema::create('messages',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('sender_id')->unsigned();
                    $attrib->integer('receiver_id')->unsigned();
                    $attrib->text('message_content');
                    $attrib->timestamp('date_sent');
                    $attrib->timestamp('date_read')->nullable();
                    $attrib->boolean('status')->default(0);
                    $attrib->boolean('checking_typing')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('sender_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('receiver_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                });
            
            Schema::create('friends',function($attrib){
                $attrib->increments('id');
                $attrib->integer('request_id')->unsigned();
                $attrib->integer('accept_id')->unsigned();
                $attrib->boolean('status')->default(0);
                $attrib->timestamp('date_requested');
                $attrib->timestamp('date_accepted');;

                // created_at, updated_at DATETIME
                $attrib->timestamps();

                //foreign keys
                $attrib->foreign('request_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

                $attrib->foreign('accept_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

                //unique keys In case of an error comment the unique function.
                $attrib->unique(array('request_id','accept_id'));
            });
                
                Schema::create('forum_suggestions',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggested_by_id')->unsigned();
                    $attrib->text('suggestion_content');
                    $attrib->timestamp('suggestion_time');
                    $attrib->string('suggestion_category',20);
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('suggested_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('forum_suggestion_votes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggestion_id')->unsigned();
                    $attrib->integer('voted_by_id')->unsigned();
                    $attrib->timestamp('vote_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('voted_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('suggestion_id')
                            ->references('id')
                            ->on('forum_suggestions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('suggestion_id','voted_by_id'));
                });
                
                Schema::create('forum_suggestion_comments',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggestion_id')->unsigned();
                    $attrib->integer('commented_by_id')->unsigned();
                    $attrib->text('comment_content');
                    $attrib->timestamp('comment_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('commented_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('suggestion_id')
                            ->references('id')
                            ->on('forum_suggestions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('forum_suggestion_comment_likes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('comment_id')->unsigned();
                    $attrib->integer('liked_by_id')->unsigned();
                    $attrib->timestamp('time_liked');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('liked_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('comment_id')
                            ->references('id')
                            ->on('forum_suggestion_comments')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('comment_id','liked_by_id'));
                });
                
                Schema::create('debate_suggestions',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggested_by_id')->unsigned();
                    $attrib->text('suggestion_content');
                    $attrib->timestamp('suggestion_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('suggested_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('debate_suggestion_votes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggestion_id')->unsigned();
                    $attrib->integer('voted_by_id')->unsigned();
                    $attrib->timestamp('vote_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('voted_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('suggestion_id')
                            ->references('id')
                            ->on('debate_suggestions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('suggestion_id','voted_by_id'));
                });
                
                Schema::create('debate_suggestion_comments',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggestion_id')->unsigned();
                    $attrib->integer('commented_by_id')->unsigned();
                    $attrib->boolean('comment_type');
                    $attrib->text('comment_content');
                    $attrib->timestamp('comment_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('commented_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('suggestion_id')
                            ->references('id')
                            ->on('debate_suggestions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('debate_suggestion_comment_likes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('comment_id')->unsigned();
                    $attrib->integer('liked_by_id')->unsigned();
                    $attrib->timestamp('time_liked');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('liked_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('comment_id')
                            ->references('id')
                            ->on('debate_suggestion_comments')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('comment_id','liked_by_id'));
                });
                
                Schema::create('point_of_additions',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('comment_id')->unsigned();
                    $attrib->integer('ad_by_id')->unsigned();
                    $attrib->text('ad_content');
                    $attrib->timestamp('ad_time');
                    $attrib->boolean('status');
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('ad_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('comment_id')
                            ->references('id')
                            ->on('debate_suggestion_comments')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('point_of_addition_likes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('ad_id')->unsigned();
                    $attrib->integer('liked_by_id')->unsigned();
                    $attrib->timestamp('time_liked');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('liked_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('ad_id')
                            ->references('id')
                            ->on('point_of_additions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('ad_id','liked_by_id'));
                });
	}

	public function down()
	{
            Schema::drop('point_of_addition_likes');
            Schema::drop('pont_of_additions');
            Schema::drop('debate_suggestion_comment_likes');
            Schema::drop('debate_suggestion_comments');
            Schema::drop('debate_suggestion_votes');
            Schema::drop('debate_suggestions');
            Schema::drop('forum_suggestion_comment_likes');
            Schema::drop('forum_suggestion_comments');
            Schema::drop('forum_suggestion_votes');
            Schema::drop('forum_suggestions');
            Schema::drop('friends');
            Schema::drop('messages');
            Schema::drop('users');
            
	}

}
=======
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreateTablesTable extends Migration {

	public function up()
	{
            Schema::create('users',function($attrib){
                $attrib->increments('id');
                $attrib->string('first_name',40);
                $attrib->string('sir_name',40);
                $attrib->string('nick_name',20)->unique();
                $attrib->string('gender',6);
                $attrib->boolean('status')->default(1);
                $attrib->text('bio')->nullable();
                $attrib->timestamp('first_login');
                $attrib->timestamp('login');
                $attrib->timestamp('logout')->nullable();
                $attrib->string('remember_token', 100);

                // created_at, updated_at DATETIME
                $attrib->timestamps();
            });
            
            Schema::create('messages',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('sender_id')->unsigned();
                    $attrib->integer('receiver_id')->unsigned();
                    $attrib->text('message_content');
                    $attrib->timestamp('date_sent');
                    $attrib->timestamp('date_read')->nullable();
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('sender_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('receiver_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                });
            
            Schema::create('friends',function($attrib){
                $attrib->increments('id');
                $attrib->integer('request_id')->unsigned();
                $attrib->integer('accept_id')->unsigned();
                $attrib->boolean('status')->default(0);
                $attrib->timestamp('date_requested');
                $attrib->timestamp('date_accepted');;

                // created_at, updated_at DATETIME
                $attrib->timestamps();

                //foreign keys
                $attrib->foreign('request_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

                $attrib->foreign('accept_id')
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');

                //unique keys In case of an error comment the unique function.
                $attrib->unique(array('request_id','accept_id'));
            });
                
                Schema::create('forum_suggestions',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggested_by_id')->unsigned();
                    $attrib->text('suggestion_content');
                    $attrib->timestamp('suggestion_time');
                    $attrib->string('suggestion_category',20);
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('suggested_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('forum_suggestion_votes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggestion_id')->unsigned();
                    $attrib->integer('voted_by_id')->unsigned();
                    $attrib->timestamp('vote_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('voted_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('suggestion_id')
                            ->references('id')
                            ->on('forum_suggestions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('suggestion_id','voted_by_id'));
                });
                
                Schema::create('forum_suggestion_comments',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggestion_id')->unsigned();
                    $attrib->integer('commented_by_id')->unsigned();
                    $attrib->text('comment_content');
                    $attrib->timestamp('comment_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('commented_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('suggestion_id')
                            ->references('id')
                            ->on('forum_suggestions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('forum_suggestion_comment_likes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('comment_id')->unsigned();
                    $attrib->integer('liked_by_id')->unsigned();
                    $attrib->timestamp('time_liked');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('liked_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('comment_id')
                            ->references('id')
                            ->on('forum_suggestion_comments')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('comment_id','liked_by_id'));
                });
                
                Schema::create('debate_suggestions',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggested_by_id')->unsigned();
                    $attrib->text('suggestion_content');
                    $attrib->timestamp('suggestion_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('suggested_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('debate_suggestion_votes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggestion_id')->unsigned();
                    $attrib->integer('voted_by_id')->unsigned();
                    $attrib->timestamp('vote_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('voted_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('suggestion_id')
                            ->references('id')
                            ->on('debate_suggestions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('suggestion_id','voted_by_id'));
                });
                
                Schema::create('debate_suggestion_comments',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('suggestion_id')->unsigned();
                    $attrib->integer('commented_by_id')->unsigned();
                    $attrib->boolean('comment_type');
                    $attrib->text('comment_content');
                    $attrib->timestamp('comment_time');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('commented_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('suggestion_id')
                            ->references('id')
                            ->on('debate_suggestions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('debate_suggestion_comment_likes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('comment_id')->unsigned();
                    $attrib->integer('liked_by_id')->unsigned();
                    $attrib->timestamp('time_liked');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('liked_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('comment_id')
                            ->references('id')
                            ->on('debate_suggestion_comments')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('comment_id','liked_by_id'));
                });
                
                Schema::create('point_of_additions',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('comment_id')->unsigned();
                    $attrib->integer('ad_by_id')->unsigned();
                    $attrib->text('ad_content');
                    $attrib->timestamp('ad_time');
                    $attrib->boolean('status');
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('ad_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('comment_id')
                            ->references('id')
                            ->on('debate_suggestion_comments')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                });
                
                Schema::create('point_of_addition_likes',function($attrib){
                    $attrib->increments('id');
                    $attrib->integer('ad_id')->unsigned();
                    $attrib->integer('liked_by_id')->unsigned();
                    $attrib->timestamp('time_liked');
                    $attrib->boolean('status')->default(0);
                    
                    // created_at, updated_at DATETIME
                    $attrib->timestamps();
                    
                    //foreign keys
                    $attrib->foreign('liked_by_id')
                            ->references('id')
                            ->on('users')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    $attrib->foreign('ad_id')
                            ->references('id')
                            ->on('point_of_additions')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
                    
                    //unique keys
                    $attrib->unique(array('ad_id','liked_by_id'));
                });
	}

	public function down()
	{
            Schema::drop('point_of_addition_likes');
            Schema::drop('point_of_additions');
            Schema::drop('debate_suggestion_comment_likes');
            Schema::drop('debate_suggestion_comments');
            Schema::drop('debate_suggestion_votes');
            Schema::drop('debate_suggestions');
            Schema::drop('forum_suggestion_comment_likes');
            Schema::drop('forum_suggestion_comments');
            Schema::drop('forum_suggestion_votes');
            Schema::drop('forum_suggestions');
            Schema::drop('friends');
            Schema::drop('messages');
            Schema::drop('users');
            
	}

}

