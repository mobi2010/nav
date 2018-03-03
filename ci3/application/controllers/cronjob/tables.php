<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require('Article_Controller.php');


class Tables extends MY_Controller {		
	function __construct($params = array())
	{
		parent::__construct(array('auth'=>false));		

	}
	public function createComment()
	{
		for ($i=0; $i < 100; $i++) { 
			$index = str_pad($i,2,"0",STR_PAD_LEFT);
			echo $table = "`comment_{$index}`,";
			// $sql = "drop table if exists {$table};";
			// $this->ci3Model->query($sql);
			// $sql = "create table {$table} like comment;";
			// $this->ci3Model->query($sql);
		}
// 		CREATE TABLE `comment` (
//  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
//  `member_id` int(11) NOT NULL,
//  `article_id` int(11) NOT NULL,
//  `content` text NOT NULL,
//  `reply_id` int(11) NOT NULL,
//  `insert_time` int(11) NOT NULL,
//  PRIMARY KEY (`id`)
// ) ENGINE=MRG_MyISAM DEFAULT CHARSET=utf8 INSERT_METHOD=LAST UNION=(`comment_00`,`comment_01`,`comment_02`,`comment_03`,`comment_04`,`comment_05`,`comment_06`,`comment_07`,`comment_08`,`comment_09`,`comment_10`,`comment_11`,`comment_12`,`comment_13`,`comment_14`,`comment_15`,`comment_16`,`comment_17`,`comment_18`,`comment_19`,`comment_20`,`comment_21`,`comment_22`,`comment_23`,`comment_24`,`comment_25`,`comment_26`,`comment_27`,`comment_28`,`comment_29`,`comment_30`,`comment_31`,`comment_32`,`comment_33`,`comment_34`,`comment_35`,`comment_36`,`comment_37`,`comment_38`,`comment_39`,`comment_40`,`comment_41`,`comment_42`,`comment_43`,`comment_44`,`comment_45`,`comment_46`,`comment_47`,`comment_48`,`comment_49`,`comment_50`,`comment_51`,`comment_52`,`comment_53`,`comment_54`,`comment_55`,`comment_56`,`comment_57`,`comment_58`,`comment_59`,`comment_60`,`comment_61`,`comment_62`,`comment_63`,`comment_64`,`comment_65`,`comment_66`,`comment_67`,`comment_68`,`comment_69`,`comment_70`,`comment_71`,`comment_72`,`comment_73`,`comment_74`,`comment_75`,`comment_76`,`comment_77`,`comment_78`,`comment_79`,`comment_80`,`comment_81`,`comment_82`,`comment_83`,`comment_84`,`comment_85`,`comment_86`,`comment_87`,`comment_88`,`comment_89`,`comment_90`,`comment_91`,`comment_92`,`comment_93`,`comment_94`,`comment_95`,`comment_96`,`comment_97`,`comment_98`,`comment_99`);
	}


	public function truncate(){
		$sql = "show tables";
		$tables = $this->ci3Model->dataFetchArray(['sql'=>$sql]);
		foreach ($tables as $key => $value) {
			$table = $value['Tables_in_nav'];
			$sql = "TRUNCATE `{$table}`";
			$this->ci3Model->query($sql);
		}
		//var_dump($tables);
		//$sql = "TRUNCATE `comment_00`";
	}
}	
?>