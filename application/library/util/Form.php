<?php
/**
 * Util_Form
 *
 * @category Library
 * @package  Util
 * @author   Lancer He <lancer.he@gmail.com>
 * @version  1.0 
 */
class Util_Form{
    /**
     * @access public
     * @static
     * @param array   $array          数据源.
     * @param string  $selected_key   被选中key.
     * @param string  $default_label  增加默认选项标示.
     * @param boolean $label2value    是否将数据源中标签项做为值.
     * @param 
     * @return string.
     */
    public static function options($array, $selected_key=null, $default_label=null, $label2value=false) {
        $html = '';
        if ( $default_label ) 
            $html .= '<option value="">' . $default_label . '</option>';
        
        foreach ($array AS $key => $val) {
            $key      = $label2value ? $val : $key;
            $selected = ($selected_key === $key) ? " selected" : '';
            $html    .= "<option value=\"{$key}\"{$selected}>{$val}</option>";
        }
        return $html;
    }
    /**
     * @access public
     * @static
     * @param mixed $name           select名称和id.
     * @param mixed $array          数据源.
     * @param mixed $selected_key   被选中key.
     * @param mixed $default_option 默认选项.
     * @param mixed $callback       select回调函数.
     * @return string.
     */
    public static function select($name, $array, $selected_key=null, $default_option=null, $callback=null) {
        $callback_html = '';
        if( ! is_null($callback) )
            $callback_html .= ' onchange="return ' . $callback . ';"';
    
        $html  = '<select id="' . $name . '" name="' . $name . '" ' . $callback_html . '>';
        $html .= self::options($array, $selected_key, $default_option);
        $html .= '</select>';
        return $html;
    }
    /**
     * @access public
     * @static
     * @param mixed  $name        单选框名称.
     * @param mixed  $array       数据源.
     * @param mixed  $checked_key 被选中key.
     * @param string $class       默认Label Class
     * @return string.
     */
    public static function radio($name, $array, $checked_key=null, $class="radio") {
        $html = '';
        foreach ($array as $key => $val) {
            $checked = ($checked_key === $key) ? ' checked' : '';
            $html .= "
                <label class=\"{$class}\">
                    <input type=\"radio\" name=\"{$name}\" value=\"{$key}\"{$checked}>{$val}
                </label>"; 
        }
        return $html;
    }
    /**
     * @access public
     * @static
     * @param mixed  $name        复选框名称.
     * @param mixed  $array       数据源.
     * @param array  $checked_key 被选中key数组.
     * @param string $class       默认Label Class
     * @return string.
     */
    public static function checkbox($name, $array, $checked_key=array(), $class="checkbox") {
        $html = '';
        foreach ($array as $key => $val) {
            $checked = in_array($key, $checked_key ) ? ' checked' : '';
            $html .= "
                <label class=\"{$class}\">
                    <input type=\"checkbox\" name=\"{$name}\" value=\"{$key}\"{$checked}>{$val}
                </label>"; 
        }
        return $html;
    }
}