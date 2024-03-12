<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Blog extends CI_Migration
{
    public function up()
    {
        // Create 'frontend' table
        if (!$this->db->table_exists('frontend')) {
            $this->dbforge->add_field(
                array(
                    'id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                    ),
                    'password' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100
                    ),
                    'description' => array(
                        'type' => 'TEXT',
                        'null' => TRUE
                    ),
                )
            );
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('frontend');
            echo "Table 'frontend' created successfully.";
        } else {
            echo "Table 'frontend' already exists.";
        }

        // Create 'second_table' table with foreign key
        if (!$this->db->table_exists('backend')) {
            $this->dbforge->add_field(
                array(
                    'id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                    ),
                    'frontend_id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => TRUE
                    ),
                    'email' => array(
                        'type' => 'VARCHAR',
                        'constraint' => 100
                    ),
                )
            );
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('backend');

            // Add foreign key constraint using SQL
            $this->dbforge->add_field('CONSTRAINT  FOREIGN KEY (frontend_id) REFERENCES frontend(id)');

            echo "Table 'backend' created successfully with foreign key referencing 'frontend'.";
        } else {
            echo "Table 'backend' already exists.";
        }
    }

    public function down()
    {
    
        $this->dbforge->drop_table('backend', TRUE);
        $this->dbforge->drop_table('frontend', TRUE);
        echo "Tables dropped successfully.";
    }
}

