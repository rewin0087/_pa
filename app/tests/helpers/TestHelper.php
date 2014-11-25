<?php

class TestHelper {


    public static function registerCommands()
    {
        Artisan::add(new AfterUpdateCommand);
    }

    public static function migrateDatabase()
    {
        
    }

}