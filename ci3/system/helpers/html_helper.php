<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter HTML Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/html_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Heading
 *
 * Generates an HTML heading tag.  First param is the data.
 * Second param is the size of the heading tag.
 *
 * @access	public
 * @param	string
 * @param	integer
 * @return	string
 */
if ( ! function_exists('heading'))
{
	function heading($data = '', $h = '1', $attributes = '')
	{
		$attributes = ($attributes != '') ? ' '.$attributes : $attributes;
		return "<h".$h.$attributes.">".$data."</h".$h.">";
	}
}

// ------------------------------------------------------------------------

/**
 * Unordered List
 *
 * Generates an HTML unordered list from an single or multi-dimensional array.
 *
 * @access	public
 * @param	array
 * @param	mixed
 * @return	string
 */
if ( ! function_exists('ul'))
{
	function ul($list, $attributes = '')
	{
		return _list('ul', $list, $attributes);
	}
}

// ------------------------------------------------------------------------

/**
 * Ordered List
 *
 * Generates an HTML ordered list from an single or multi-dimensional array.
 *
 * @access	public
 * @param	array
 * @param	mixed
 * @return	string
 */
if ( ! function_exists('ol'))
{
	function ol($list, $attributes = '')
	{
		return _list('ol', $list, $attributes);
	}
}

// ------------------------------------------------------------------------

/**
 * Generates the list
 *
 * Generates an HTML ordered list from an single or multi-dimensional array.
 *
 * @access	private
 * @param	string
 * @param	mixed
 * @param	mixed
 * @param	integer
 * @return	string
 */
if ( ! function_exists('_list'))
{
	function _list($type = 'ul', $list, $attributes = '', $depth = 0)
	{
		// If an array wasn't submitted there's nothing to do...
		if ( ! is_array($list))
		{
			return $list;
		}

		// Set the indentation based on the depth
		$out = str_repeat(" ", $depth);

		// Were any attributes submitted?  If so generate a string
		if (is_array($attributes))
		{
			$atts = '';
			foreach ($attributes as $key => $val)
			{
				$atts .= ' ' . $key . '="' . $val . '"';
			}
			$attributes = $atts;
		}
		elseif (is_string($attributes) AND strlen($attributes) > 0)
		{
			$attributes = ' '. $attributes;
		}

		// Write the opening list tag
		$out .= "<".$type.$attributes.">\n";

		// Cycle through the list elements.  If an array is
		// encountered we will recursively call _list()

		static $_last_list_item = '';
		foreach ($list as $key => $val)
		{
			$_last_list_item = $key;

			$out .= str_repeat(" ", $depth + 2);
			$out .= "<li>";

			if ( ! is_array($val))
			{
				$out .= $val;
			}
			else
			{
				$out .= $_last_list_item."\n";
				$out .= _list($type, $val, '', $depth + 4);
				$out .= str_repeat(" ", $depth + 2);
			}

			$out .= "</li>\n";
		}

		// Set the indentation for the closing tag
		$out .= str_repeat(" ", $depth);

		// Write the closing list tag
		$out .= "</".$type.">\n";

		return $out;
	}
}

// ------------------------------------------------------------------------

/**
 * Generates HTML BR tags based on number supplied
 *
 * @access	public
 * @param	integer
 * @return	string
 */
if ( ! function_exists('br'))
{
	function br($num = 1)
	{
		return str_repeat("<br />", $num);
	}
}

// ------------------------------------------------------------------------

/**
 * Image
 *
 * Generates an <img /> element
 *
 * @access	public
 * @param	mixed
 * @return	string
 */
if ( ! function_exists('img'))
{
	function img($src = '', $index_page = FALSE)
	{
		if ( ! is_array($src) )
		{
			$src = array('src' => $src);
		}

		// If there is no alt attribute defined, set it to an empty string
		if ( ! isset($src['alt']))
		{
			$src['alt'] = '';
		}

		$img = '<img';

		foreach ($src as $k=>$v)
		{

			if ($k == 'src' AND strpos($v, '://') === FALSE)
			{
				$CI =& get_instance();

				if ($index_page === TRUE)
				{
					$img .= ' src="'.$CI->config->site_url($v).'"';
				}
				else
				{
					$img .= ' src="'.$CI->config->slash_item('base_url').$v.'"';
				}
			}
			else
			{
				$img .= " $k=\"$v\"";
			}
		}

		$img .= '/>';

		return $img;
	}
}

// ------------------------------------------------------------------------

/**
 * Doctype
 *
 * Generates a page document type declaration
 *
 * Valid options are xhtml-11, xhtml-strict, xhtml-trans, xhtml-frame,
 * html4-strict, html4-trans, and html4-frame.  Values are saved in the
 * doctypes config file.
 *
 * @access	public
 * @param	string	type	The doctype to be generated
 * @return	string
 */
if ( ! function_exists('doctype'))
{
	function doctype($type = 'xhtml1-strict')
	{
		global $_doctypes;

		if ( ! is_array($_doctypes))
		{
			if (defined('ENVIRONMENT') AND is_file(APPPATH.'config/'.ENVIRONMENT.'/doctypes.php'))
			{
				include(APPPATH.'config/'.ENVIRONMENT.'/doctypes.php');
			}
			elseif (is_file(APPPATH.'config/doctypes.php'))
			{
				include(APPPATH.'config/doctypes.php');
			}

			if ( ! is_array($_doctypes))
			{
				return FALSE;
			}
		}

		if (isset($_doctypes[$type]))
		{
			return $_doctypes[$type];
		}
		else
		{
			return FALSE;
		}
	}
}

// ------------------------------------------------------------------------

/**
 * Link
 *
 * Generates link to a CSS file
 *
 * @access	public
 * @param	mixed	stylesheet hrefs or an array
 * @param	string	rel
 * @param	string	type
 * @param	string	title
 * @param	string	media
 * @param	boolean	should index_page be added to the css path
 * @return	string
 */
if ( ! function_exists('link_tag'))
{
	function link_tag($href = '', $rel = 'stylesheet', $type = 'text/css', $title = '', $media = '', $index_page = FALSE)
	{
		$CI =& get_instance();

		$link = '<link ';

		if (is_array($href))
		{
			foreach ($href as $k=>$v)
			{
				if ($k == 'href' AND strpos($v, '://') === FALSE)
				{
					if ($index_page === TRUE)
					{
						$link .= 'href="'.$CI->config->site_url($v).'" ';
					}
					else
					{
						$link .= 'href="'.$CI->config->slash_item('base_url').$v.'" ';
					}
				}
				else
				{
					$link .= "$k=\"$v\" ";
				}
			}

			$link .= "/>";
		}
		else
		{
			if ( strpos($href, '://') !== FALSE)
			{
				$link .= 'href="'.$href.'" ';
			}
			elseif ($index_page === TRUE)
			{
				$link .= 'href="'.$CI->config->site_url($href).'" ';
			}
			else
			{
				$link .= 'href="'.$CI->config->slash_item('base_url').$href.'" ';
			}

			$link .= 'rel="'.$rel.'" type="'.$type.'" ';

			if ($media	!= '')
			{
				$link .= 'media="'.$media.'" ';
			}

			if ($title	!= '')
			{
				$link .= 'title="'.$title.'" ';
			}

			$link .= '/>';
		}


		return $link;
	}
}

// ------------------------------------------------------------------------

/**
 * Generates meta tags from an array of key/values
 *
 * @access	public
 * @param	array
 * @return	string
 */
if ( ! function_exists('meta'))
{
	function meta($name = '', $content = '', $type = 'name', $newline = "\n")
	{
		// Since we allow the data to be passes as a string, a simple array
		// or a multidimensional one, we need to do a little prepping.
		if ( ! is_array($name))
		{
			$name = array(array('name' => $name, 'content' => $content, 'type' => $type, 'newline' => $newline));
		}
		else
		{
			// Turn single array into multidimensional
			if (isset($name['name']))
			{
				$name = array($name);
			}
		}

		$str = '';
		foreach ($name as $meta)
		{
			$type		= ( ! isset($meta['type']) OR $meta['type'] == 'name') ? 'name' : 'http-equiv';
			$name		= ( ! isset($meta['name']))		? ''	: $meta['name'];
			$content	= ( ! isset($meta['content']))	? ''	: $meta['content'];
			$newline	= ( ! isset($meta['newline']))	? "\n"	: $meta['newline'];

			$str .= '<meta '.$type.'="'.$name.'" content="'.$content.'" />'.$newline;
		}

		return $str;
	}
}

// ------------------------------------------------------------------------

/**
 * Generates non-breaking space entities based on number supplied
 *
 * @access	public
 * @param	integer
 * @return	string
 */
if ( ! function_exists('nbs'))
{
	function nbs($num = 1)
	{
		return str_repeat("&nbsp;", $num);
	}
}


/* End of file html_helper.php */
/* Location: ./system/helpers/html_helper.php */


########################author by zsc####################################
/**
* [join description]
* @param  [type] $params      [description]
* @param  array  $unsetParams [description]
* @return [type]              [description]
*/
if ( ! function_exists('html_join')){
	function html_join($params,$unsetParams=array()){
		$html = null;
		if(!empty($params)) {
		  foreach ($params as $key => $val) {
		    if(!in_array($key, $unsetParams) && isset($val)){
		      $html .= $key.'="'.$val.'" ';
		    }        
		  }
		}
		return $html;
	}
}
/**
* [radio description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_img')){
   function html_img($params){    
    $img = '<img ';
    $img .= html_join($params);
    $img .= ' />';    
    return $img;     
  }
}
/**
* [radio description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_radio')){
   function html_radio($params){
    $params['id'] = $params['id'] ? $params['id'] : $params['name'];    
    $position = $params['position'];//0默认后边，1前边 
    $radio = '<input type="radio" ';
    $radio .= html_join($params,array('position','text'));
    $radio .= ' />';    
    $text = $position ? $params['text'].$radio : $radio.$params['text'];    
    return html_a(array('text'=>$text,'class'=>'html-radio','data-value'=>$params['value'],'data-id'=>$params['id'],'data-name'=>$params['name']));
  }
}
/**
* [tags description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_tags')){
    function html_tags($params){
    	$html = null;
    	$class = $params['class'] ? "html-tags ".$params['class'] : "html-tags";
	  	if(!empty($params['options'])) {
	    	foreach ($params['options'] as $key => $val) {	
	    		$rparams = array();    		
	    		$rparams['text'] = $params['sval'] ? $val[$params['sval']] : $val;
	    		$rparams['data-value'] = $params['skey'] ? $val[$params['skey']] : $key;
	    		$rparams['data-name'] = $params['name'];
	    		$rparams['id'] = $params['name']."_".$rparams['data-value'];
	    		$rparams['class'] = isset($params['checked']) && $params['checked'] == $rparams['data-value'] ? $class.' checked' : $class;
	    		$rparams['href'] = $params['href'] ? $params['href']."&{$params['name']}=".$rparams['data-value'] : $params['href'];
	    		$html .= html_a($rparams).$params['blank'];
	    	}
	    }	
	    $html .= html_hidden(array('name'=>$params['name'],'value'=>$params['checked']));
		return $html;
  }
}
/**
* [radios description]
* @param  [type] $params [description]
*  $radios['options'] =  array('原创','转载');
*  $radios['options'] =  array('原创','转载');
*  $radios['name'] = 'radios';
*  $radios['checked'] = 1;
*  $radios['blank'] = “&nbsp”;//间隔
*  html_radios($radios);   
* @return [type]         [description]
*/
if ( ! function_exists('html_radios')){
   function html_radios($params){
	  	$html = null;
	  	if(!empty($params['options'])) {
	    	foreach ($params['options'] as $key => $val) {	
	    		$rparams = array();    		
	    		$rparams['name'] = $params['name'];
	    		$rparams['text'] = $params['sval'] ? $val[$params['sval']] : $val;
	    		$rparams['value'] = $params['skey'] ? $val[$params['skey']] : $key;
	    		$rparams['id'] = $params['name']."_".$rparams['value'];
	    		$rparams['checked'] = $params['checked'] == $rparams['value'] ? 'checked' : null;
	    		$html .= html_radio($rparams).$params['blank'];
	    	}
	    }	
	    return $html;
	  }
}
/**
* [text description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_text')){
   function html_text($params){
  	$params['id'] = $params['id'] ? $params['id'] : $params['name'];
  	$params['class'] = $params['class'] ? $params['class'] : 'form-control';
    $text = '<input type="text" ';
    $text .= html_join($params);
    $text .= '/>';
  	return $text; 
  }
}
/**
* [file description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_file')){
   function html_file($params){
  	$params['id'] = $params['id'] ? $params['id'] : $params['name'];
  	$params['class'] = $params['class'] ? $params['class'] : 'form-control';
    $text = '<input type="file" ';
    $text .= html_join($params);
    $text .= '/>';
  	return $text; 
  }
}
/**
* [text description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_password')){
   function html_password($params){
  	$params['id'] = $params['id'] ? $params['id'] : $params['name'];
    $text = '<input type="password" ';
    $text .= html_join($params);
    $text .= '/>';
  	return $text; 
  }
}
/**
* [text description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_hidden')){
	function html_hidden($params){
		$params['id'] = $params['id'] ? $params['id'] : $params['name'];		
		$params['autocomplete'] = "off";
		$text = '<input type="hidden" ';
		$text .= html_join($params);
		$text .= '/>';
		return $text; 
	}
}
/**
* [textarea description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_textarea')){
	function html_textarea($params){
		$value = $params['value'];
		$params['id'] = $params['id'] ? $params['id'] : $params['name'];
		$params['class'] = $params['class'] ? $params['class'] : 'form-control';
		$text = '<textarea ';
		$text .= html_join($params,array('value'));
		$text .= '>';
		$text .= $value;
		$text .= '</textarea>';
		return $text; 
	}
}
/**
* [text description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_hiddens')){
	function html_hiddens($params){
		$html = null;
		foreach ($params as $key => $value) {     
		  $html .= html_hidden(array('name'=>$key,'value'=>$value));
		}
		return $html; 
	}
}
/**
* [a description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_a')){
	function html_a($params){
		$href = $params['href'] ? $params['href'] : 'javascript:;';
		$text = $params['text'];
		$a = '<a href="'.$href.'" ';
		$a .= html_join($params,array('href','text'));
		$a .= ' >'.$text.'</a>';
		return $a;
	}
}

/**
* [select description]
* @param  [type] $params [description]
* options 选项数据
* selected 选中项 
* sval option 的 text
* skey option 的 value
* 
* @return [type]         [description]
*/
if ( ! function_exists('html_select')){
	function html_select($params){
		$select = null;
		$options = $params['options'];
		if(!empty($options)){		
			$params['class'] = $params['class'] ? $params['class'] : 'form-control';
			$selected = $params['selected'];
			$params['id'] = $params['id'] ? $params['id'] : $params['name'];
			$select .= '<select ';
			$select .= html_join($params,array('options','selected','sval','sval'));		
			$select .= '>';			
			foreach ($options as $key => $val) {
				$optionValue = $params['skey'] ? $val[$params['skey']] : $key;
				$optionText = $params['sval'] ? $val[$params['sval']] : $val;
				$select .= '<option value="'.$optionValue.'"';
				$select .= $key == $selected ? ' selected="selected"' : null;
				$select .= '>'.$optionText.'</option>';
			}
			$select .= '</select>';
		}
		return $select;
	}
}
/**
* [checkbox description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_checkbox')){
	function html_checkbox($params){
		$params['id'] = $params['id'] ? $params['id'] : $params['name'];
		$checkbox ='<input type="checkbox" ';
		$checkbox .= html_join($params,array('position','text','checked'));
		$checkbox .= $params['checked'] ? ' checked="checked" ' : null;
		$checkbox .= '/>';
		$text = $params['text'];
		$position = $params['position'];//0默认后边，1前边 
		return $position ? $text.$checkbox : $checkbox.$text;
	}
}
/**
* [submit description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_submit')){
   function html_submit($params=array()){
    $params['id'] = $params['id'] ? $params['id'] : $params['name'];
    $params['value'] = $params['value'] ? $params['value'] : '提交';
    $submit ='<input type="submit" ';
    $submit .= html_join($params);
    $submit .= '/>';
    return $submit;
  }
}
/**
* [html_button description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_button')){
   function html_button($params=array()){
	    $params['id'] = $params['id'] ? $params['id'] : $params['name'];
	    $params['value'] = $params['value'] ? $params['value'] : '提交';
	    $submit ='<input type="button" ';
	    $submit .= html_join($params);
	    $submit .= '/>';
	    return $submit;
  }
}
/**
* [html_table description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_table')){
   function html_table($params=array()){	   
	    $html ='<table ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</table>';
	    return $html;
  }
}
/**
* [html_tr description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_tr')){
	function html_tr($params=array()){	   
	    $html ='<tr ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</tr>';
	    return $html;
	}
}
/**
* [html_th description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_th')){
	function html_th($params=array()){	   
	    $html ='<th ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</th>';
	    return $html;
	}
}
/**
* [html_td description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_td')){
	function html_td($params=array()){	   
	    $html ='<td ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</td>';
	    return $html;
	}
}
/**
* [html_form description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_form')){
	function html_form($params=array()){	   
	    $html ='<form ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</form>';
	    return $html;
	}
}
/**
* [html_div description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_div')){
	function html_div($params=array()){	   
	    $html ='<div ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</div>';
	    return $html;
	}
}
/**
* [html_span description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_span')){
	function html_span($params=array()){	   
	    $html ='<span ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</span>';
	    return $html;
	}
}
/**
* [html_dd description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_dd')){
	function html_dd($params=array()){	   
	    $html ='<dd ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</dd>';
	    return $html;
	}
}
/**
* [html_dt description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_dt')){
	function html_dt($params=array()){	   
	    $html ='<dt ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</dt>';
	    return $html;
	}
}
/**
* [html_dl description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_dl')){
	function html_dl($params=array()){	   
	    $html ='<dl ';
	    $html .= html_join($params,array('body'));
	    $html .= '>';
	    $html .= $params['body'];
	    $html .= '</dl>';
	    return $html;
	}
}
/**
* [html_qq description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_qq')){
	function html_qq($qq,$text='在线交谈'){
		return html_a(array('href'=>'http://wpa.qq.com/msgrd?v=3&uin='.$qq.'&site=qq&menu=yes','target'=>'_blank','class'=>'online-qq','text'=>html_span(array('class'=>'third-icons qq','body'=>"&nbsp;")).$text,'title'=>'QQ:'.$qq));
	}
}
/**
* [html_weibo description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_weibo')){
	function html_weibo($weibo,$text='微博交流'){
		return html_a(array('href'=>mobi_format_url($weibo),'target'=>'_blank','class'=>'online-qq','text'=>html_span(array('class'=>'third-icons weibo','body'=>"&nbsp;")).$text,'title'=>'微博:'.$weibo));
	}
}
/**
* [html_weixin description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_weixin')){
	function html_weixin($weixin,$text='微信交流'){
		return html_a(array('href'=>mobi_format_url($weixin),'target'=>'_blank','class'=>'online-qq','text'=>html_span(array('class'=>'third-icons weixin','body'=>"&nbsp;")).$text,'title'=>'微信:'.$weixin));
	}
}
/**
* [html_email description]
* @param  [type] $params [description]
* @return [type]         [description]
*/
if ( ! function_exists('html_email')){
	function html_email($email,$text='邮箱交流'){
		return html_a(array('href'=>"mailto:".$email,'target'=>'_blank','class'=>'online-qq','text'=>html_span(array('class'=>'third-icons email','body'=>"&nbsp;")).$text,'title'=>'邮箱:'.$email));
	}
}