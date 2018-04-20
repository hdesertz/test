<?php
/**
 * Created by PhpStorm.
 * User:  liuxiaolong
 * Brief: sql辅助类
 * Date:  2017/6/15
 * Time:  上午10:15
 */


namespace App\Lib\Util;

class SqlUtil {

    /*
     * sql语句安全过滤
     */
    public static function safe_sql_filter($sql) {
        $arr = str_split($sql);
        foreach ($arr as $k => $v) {
            if (!ctype_alnum($v) && !in_array($v, array(' ', ',', '_', '-', '>', '<', '=', '!', '(', ')', '*'))) {
                unset($arr[$k]);
            }
        }
        return implode("", $arr);
    }

    /*
     * sql拓展操作
     */
    public static function extra_sql($operation, $value) {
        return (object)array('operation' => $operation, 'value' => $value);
    }

    /*
     * 拼接select语句
     */
    public static function assemble_select_sql($table, $column = '*', $params = array()) {
        if( isset($params['order_by']) ) { //移除参数中的order_by，避免干扰筛选
            $order_by = $params['order_by'];
            unset($params['order_by']);
        }
        if( isset($params['limit']) ) { //移除参数中的limit，避免干扰筛选
            $limit = $params['limit'];
            unset($params['limit']);
        }
        if( isset($params['group_by']) ) { //移除参数中的group_by，避免干扰筛选
            $group_by = $params['group_by'];
            unset($params['group_by']);
        }
        if( isset($params['contract']) ) { //移除参数中的contract，避免干扰筛选
            $contract = $params['contract'];
            unset($params['contract']);
        }
        if( !empty($params['not_between']) ) {
            foreach ($params['not_between'] as $nb_value) {
                if( isset($params[$nb_value['key']]) ) {
                    unset($params[$nb_value['key']]);
                }
            }
        }

        $sql = "SELECT " . $column . " FROM " . self::safe_sql_filter($table) . " WHERE 1=1";
        $sql_data = array();
        foreach ($params as $key => $value) {
            if ($key == 'and_or') {
                foreach ($value as $or_condition) {
                    $snippets = array();
                    foreach ($or_condition as $_key => $_value) {
                        $v_key = $_key . '_' . self::get_param_prefix();
                        $snippets[] = "`$_key` " . self::extra_sql_opt($_value) . " :$v_key";
                        $sql_data[$v_key] = self::extra_sql_value($_value);
                    }
                    $sql .= " AND (" . implode(" OR ", $snippets) . ")";
                }
            } elseif ($key == 'between_or') {
                $sql .= " AND ( ";
                foreach ($value as $between_or_key => $between_or_value) {
                    $between_count = 0;
                    foreach ($between_or_value as $between_value) {
                        if( count($between_value) == 2 ) {
                            $v_key_0 = $between_or_key . '_br_or_' . $between_count;
                            $between_count++;
                            $v_key_1 = $between_or_key . '_br_or_' . $between_count;
                            $between_count++;
                            if( $between_count == 2 ) {
                                $sql .= "`$between_or_key` BETWEEN :{$v_key_0} AND :{$v_key_1}";
                            } else {
                                $sql .= " OR `$between_or_key` BETWEEN :{$v_key_0} AND :{$v_key_1}";
                            }
                            $sql_data[$v_key_0] = $between_value[0];
                            $sql_data[$v_key_1] = $between_value[1];
                        }
                    }
                    $sql .= " )";
                }
            } elseif ($key == 'not_between') {
                foreach ($value as $nb_condition) {
                    $nb_key = $nb_condition['key'];
                    if( isset($params[$nb_key]) ) {
                        unset($params[$nb_key]);
                    }
                    $sql .= " AND `$nb_key` NOT BETWEEN :nb_{$nb_key}_min AND :nb_{$nb_key}_max";
                    $sql_data["nb_{$nb_key}_min"] = $nb_condition['min'];
                    $sql_data["nb_{$nb_key}_max"] = $nb_condition['max'];
                }
            } elseif ($key == 'notIn') {
                if(is_array($value)) {
                    foreach ($value as $ni_condition) {
                        $ni_key = $ni_condition['key'];
                        $key_list = '';
                        foreach ($ni_condition['value'] as $idx => $item) {
                            $key_list .= ":ni_{$ni_key}_{$idx},";
                            $sql_data["ni_{$ni_key}_{$idx}"] = $item;
                        }
                        $key_list = trim($key_list, ',');
                        $sql .= " AND `$ni_key` NOT IN (" . $key_list . ")";
                    }
                }
            } elseif (is_array($value) && is_object(current($value))) {
                foreach ($value as $idx => $obj) {
                    $sql .= " AND `{$key}` " . self::extra_sql_opt($obj) . " :{$key}_{$idx}";
                    $sql_data["{$key}_{$idx}"] = self::extra_sql_value($obj);
                }
            } elseif (is_array($value)) {
                $key_list = '';
                foreach ($value as $idx => $item) {
                    $key_list .= ":{$key}_{$idx},";
                    $sql_data["{$key}_{$idx}"] = $item;
                }
                $key_list = trim($key_list, ',');
                $sql .= " AND `$key` IN (" . $key_list . ")";
            } elseif (is_object($value)) {
                $sql .= " AND `$key` " . self::extra_sql_opt($value) . " :$key";
                $sql_data[$key] = self::extra_sql_value($value);
            } else {
                $sql .= " AND `$key` = :$key";
                $sql_data[$key] = $value;
            }
        }
        
        if( !empty($contract) ) {
            $sql .= " AND CONCAT (" . $contract['contract_field'] . ") LIKE :contract_word";
            $sql_data['contract_word'] = $contract['contract_word'];
        }
        !empty($group_by) && $sql .= " GROUP BY " . self::safe_sql_filter($group_by);
        !empty($order_by) && $sql .= " ORDER BY " . $order_by;
        !empty($limit) && $sql .= " LIMIT " . self::safe_sql_filter($limit);
        return array($sql, $sql_data);
    }

    /*
     * 拼接update语句
     */
    public static function assemble_update_sql($table, $update_by = array(), $update_data = array()) {
        if( empty($table) || empty($update_by) || empty($update_data) ) {
            return 0;
        }

        $update_by_keys = array_map(function ($key) {
            return " AND {$key}=:{$key}";
        }, array_keys($update_by));

        $update_data_keys = array_map(function ($key) {
            return "{$key}=:{$key}";
        }, array_keys($update_data));

        $sql = "UPDATE " . self::safe_sql_filter($table) . " SET " . implode(', ', $update_data_keys)
            . " WHERE 1=1 ". implode(' ', $update_by_keys);

        return array($sql, array_merge($update_data, $update_by));
    }

    /*
     * 拼接insert语句
     */
    public static function assemble_insert_sql($table, $insert_data = array()) {
        if( empty($table) || empty($insert_data) ) {
            return 0;
        }

        $sql = "INSERT INTO " . self::safe_sql_filter($table) . " ("
            . implode(', ', array_keys($insert_data)) . ") VALUES (:"
            . implode(', :', array_keys($insert_data)) . ") ";

        return array($sql, $insert_data);
    }

    /*
     * 拓展操作名
     */
    private static function extra_sql_opt($obj) {
        return self::safe_sql_filter($obj->operation);
    }

    /*
     * 拓展操作参数值
     */
    private static function extra_sql_value($obj) {
        return $obj->value;
    }

    /*
     * 获取参数命名前缀
     */
    private static function get_param_prefix() {
        static $idx = 1;
        return strval($idx++);
    }
    
}