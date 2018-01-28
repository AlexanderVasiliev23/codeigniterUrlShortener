<?php
class Migration_add_blog extends CI_Migration {
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => TRUE
            ),
            'full_url' => array(
                'type' => 'VARCHAR',
                'constraint' => '500',
            ),
            'short_key' => array(
                'type' => 'VARCHAR',
                'constraint' => '10',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('links');
    }

    public function down()
    {
        $this->dbforge->drop_table('links');
    }
}