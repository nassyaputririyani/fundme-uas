<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER update_projects_current_amount
            AFTER UPDATE 
            ON transactions
            FOR EACH ROW
            BEGIN
                DECLARE goals_amount INT;
                
                SELECT projects.goal_amount INTO goals_amount FROM projects WHERE projects.id = NEW.projects_id;
            
                IF NEW.status = "paid" THEN
                    IF NEW.amount >= goals_amount THEN
                        UPDATE projects SET projects.status = "not-active" WHERE projects.id = NEW.projects_id;
                    END IF;
                    
                    UPDATE projects SET projects.current_amount = projects.current_amount + NEW.amount WHERE projects.id = NEW.projects_id;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER update_projects_current_amount');
    }
};
