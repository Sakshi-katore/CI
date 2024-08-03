<?php
function get_setting_value($key) {
    $C =& get_instance();
    $C->load->model('Company_model');
    $setting = $C->Company_model->get_setting_by_key($key);
    return $setting ? $setting['value'] : null;
}

function set_setting_value($key, $value) {
    $C =& get_instance();
    $C->load->model('Company_model');
    $data = array('key' => $key, 'value' => $value);
    $set = $C->Company_model->get_setting_by_key($key);
    if ($set) {
        $C->Company_model->update_setting($set['id'], $data);
    } else {
        $C->Company_model->add_setting($data);
    }
}

function format_date($date) {
    $dateObj = DateTime::createFromFormat('Y-m-d', $date);
    return $dateObj ? $dateObj->format('Y-m-d') : $date;
}
?>
