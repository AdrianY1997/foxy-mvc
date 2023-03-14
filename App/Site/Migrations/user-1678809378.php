<?php

return new class
{
    protected $tableName = "user";

    public function up()
    {
        $tableName = $this->tableName;

        return "CREATE TABLE IF NOT EXISTS $tableName (
            user_id INT AUTO_INCREMENT,
            user_name VARCHAR(255) NOT NULL,
            user_lastname VARCHAR(255) NOT NULL,
            user_email VARCHAR(255),

            PRIMARY KEY (user_id)
        );";
    }

    public function down()
    {
        $tableName = $this->tableName;

        return "DROP TABLE IF EXISTS $tableName;";
    }
};
