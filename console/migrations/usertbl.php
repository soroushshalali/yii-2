<?php

use \yii\db\Migration;

class m180124_110200_add_verification_token_column_to_user_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user_tbl}}', 'verification_token', $this->string()->defaultValue(n));
    }

    public function down()
    {
        $this->dropColumn('{{%user_tbl}}', 'verification_token');
    }
}
