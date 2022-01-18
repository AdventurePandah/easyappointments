<?php defined('BASEPATH') or exit('No direct script access allowed');

/* ----------------------------------------------------------------------------
 * Easy!Appointments - Open Source Web Scheduler
 *
 * @package     EasyAppointments
 * @author      A.Tselegidis <alextselegidis@gmail.com>
 * @copyright   Copyright (c) 2013 - 2020, Alex Tselegidis
 * @license     http://opensource.org/licenses/GPL-3.0 - GPLv3
 * @link        http://easyappointments.org
 * @since       v1.4.0
 * ---------------------------------------------------------------------------- */

/**
 * @property CI_DB_query_builder db
 * @property CI_DB_forge $dbforge
 */
class Migration_Add_color_column_to_services_table extends CI_Migration {
    /**
     * Upgrade method.
     */
    public function up()
    {
        if ( ! $this->db->field_exists('color', 'services'))
        {
            $fields = [
                'color' => [
                    'type' => 'VARCHAR',
                    'constraint' => '256',
                    'default' => '#4c95d2',
                    'after' => 'description'
                ]
            ];

            $this->dbforge->add_column('services', $fields);
        }
    }

    /**
     * Downgrade method.
     */
    public function down()
    {
        if ( ! $this->db->field_exists('color', 'services'))
        {
            $this->dbforge->drop_column('services', 'color');
        }
    }
}
