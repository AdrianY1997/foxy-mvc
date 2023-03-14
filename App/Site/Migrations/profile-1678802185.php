<?php

return new class
{
    protected $tableName = "profile";

    public function up()
    {
        $tableName = $this->tableName;

        return "CREATE TABLE IF NOT EXISTS $tableName (
            prof_id INT AUTO_INCREMENT,
            

            PRIMARY KEY (prof_id)
        );";
    }

    public function down()
    {
        $tableName = $this->tableName;

        return "DROP TABLE IF EXISTS $tableName;";
    }
};
