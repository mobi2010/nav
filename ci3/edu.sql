-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2016 at 05:27 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL COMMENT '摘要',
  `content` text NOT NULL,
  `image_url` varchar(200) NOT NULL,
  `category_id` tinyint(1) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `abstract`, `content`, `image_url`, `category_id`, `likes`, `views`, `update_time`) VALUES
(1, '螃蟹不能和什么一起吃 吃螃蟹的禁忌', '吃螃蟹在我国已经有很久远的历史了。我从小在山区长大，不靠海也不靠湖，只有逢年过节才能吃上螃蟹。最初喜欢吃螃蟹是因为数量少，每人一两个，物以稀为贵，一只一只腿慢慢的吃，后来慢慢是因为味道鲜美喜欢上的，虽然肉少，但是还是很喜欢。另外螃蟹很有营养价值，一次也不能吃太多。螃蟹是与很多食物都是相克的，所以大家在吃螃蟹的时候后千万要注意，不能跟什么一起吃，以防造成不必要的伤害。', '<p>吃螃蟹在我国已经有很久远的历史了。我从小在山区长大，不靠海也不靠湖，只有逢年过节才能吃上螃蟹。最初喜欢吃螃蟹是因为数量少，每人一两个，物以稀为贵，一只一只腿慢慢的吃，后来慢慢是因为味道鲜美喜欢上的，虽然肉少，但是还是很喜欢。另外螃蟹很有营养价值，一次也不能吃太多。螃蟹是与很多食物都是相克的，所以大家在吃螃蟹的时候后千万要注意，不能跟什么一起吃，以防造成不必要的伤害。</p><p style="text-align: center;"><img src="http://resource.3uol.com/images/ueditor/20161213/6361726021271044542945664.jpg" title="u=411075681,399865139&amp;fm=23&amp;gp=0.jpg" alt="u=411075681,399865139&amp;fm=23&amp;gp=0.jpg"/></p><p>　<span style="font-size: 24px;"><strong>　螃蟹不能和什么一起吃</strong></span></p><p>　　螃蟹是很多人都喜欢吃的海鲜，味道鲜美爽口。但是，食用螃蟹可不能大意。有的东西是不能和螃蟹一起吃的，可能会引起食物中毒等的不良反应噢。让我们看看螃蟹不能和什么一起吃吧!</p><p><strong>　　1、柿子：</strong>螃蟹、<a href="http://www.3uol.com/mama/48823.html" target="_blank" title="柿子不能与什么同吃" style="color: rgb(255, 0, 0); text-decoration: underline;"><span style="color: rgb(255, 0, 0);">柿子</span></a>是秋天都可以吃到的两样东西，但这两样却不能一起吃。原因是：蟹肉中富含蛋白质，而柿子中含有大量的鞣酸，这两样物质会互相发生反应，形成蛋白质凝固成块状物，而我们的胃部很难消化这种产物。所以有人吃了螃蟹又吃柿子，就可以造成恶心、呕吐、腹痛、腹泻等不适。</p><p>　<strong>　2、浓茶：</strong>中国人喜欢喝茶，但吃螃蟹的时候，最佳的饮料是温黄酒，吃螃蟹前后最好不要饮茶。原因有两点：</p><p>　　(1)蟹脚、蟹腮中不免带有一点细菌，喝酒饮醋可以杀死它们，我们的胃液也有一定的杀菌能力，但喝了茶水之后，会将胃液冲淡，杀菌效果就大打折扣了;</p><p>　　(2)茶水和柿子一样，也含有鞣酸，同食会引起肠胃不适;</p><p><strong>　　3、梨：</strong>梨为凉性食物，与寒性的螃蟹同食，会损伤脾胃，引起消化不良。脾胃虚寒者尤其要注意;</p><p><strong>　　4、冰水、雪糕：</strong>同理，螃蟹已经很寒，再吃冷冰冰的食物，会导致腹泻、肠胃紊乱;</p><p><strong>　　5、羊肉：</strong>羊肉性味甘热，而螃蟹性寒，二者同食后不仅大大减低了羊肉的温补作用，且有碍脾胃，对于素有阳虚或脾虚的患者，极易因此而引起脾胃功能失常，进而影响人体的元气;</p><p><strong>　　6、狗肉、泥鳅</strong>：和上面所说的是一个道理;</p><p><strong>　　7、花生：</strong>在吃螃蟹不能和什么一起吃的问题中，花生同样应该遭到拒绝。中医记载：花生仁性味甘平，而且现代医学发现，在花生中含有大量的脂肪，其含量高达45%。可以说花生是属于油腻性食物的，如果与寒冷性的食物一块食用的话，就会导致出现腹泻的现象。因此螃蟹不能与花生仁不宜同时进食，肠胃虚弱之人，尤应忌之</p><p><strong>　　8、香瓜：</strong>香瓜即甜瓜，性甘寒而滑利，能除热通便。与蟹同食，有损于肠胃，易致腹泻。</p><p>　　除此之外，螃蟹还不可与红薯、南瓜、蜂蜜、橙子、石榴、西红柿、蜗牛、芹菜、兔肉、荆芥、茄子同食，会导致食物中毒。</p><p style="text-align: center;"><img src="http://resource.3uol.com/images/ueditor/20161213/6361726022777686399876404.jpg" title="u=2542151793,2246121326&amp;fm=23&amp;gp=0.jpg" alt="u=2542151793,2246121326&amp;fm=23&amp;gp=0.jpg"/></p><p>　　<span style="font-size: 24px;"><strong>吃螃蟹的禁忌</strong></span></p><p>　　吃螃蟹的禁忌可不少，大家在大快朵颐之前，先了解一下这些禁忌，以免伤害身体噢!</p><p><strong>　　1、螃蟹死了绝对不能吃</strong>，死蟹体内的细菌迅速繁殖、扩散到蟹肉中，分解蟹肉中的氨基酸，产生大量有害物质，食用死蟹可能诱发呕吐、腹痛、腹泻。除此之外，垂死的蟹也不宜购买。</p><p><strong>　　2、吃螃蟹一定要煮熟，</strong>螃蟹的体表、鳃及胃肠道中布满了各类细菌和污泥。食蟹要蒸熟煮透，一般开锅后再加热30分钟以上才能起到消毒作用。</p><p><strong>　　3、对螃蟹有过敏史</strong>，或有荨麻疹、过敏性哮喘、过敏性皮炎的人，尤其是有过敏体质的儿童、老人、孕妇最好不要吃蟹;</p><p>　<strong>　4、对海鲜过敏的人</strong>，对螃蟹过敏的可能性非常高。如果您还是抵挡不住诱惑，不妨先少量尝试，如果有过敏反应，最好立刻停止食用。</p><p>　<strong>　5、久存熟蟹不要吃</strong>，存放的熟螃蟹极易被细菌污染，因此，螃蟹宜现烧现吃。万一吃不完，剩下的一定要保存在干净、阴凉通风的地方(最好是冰箱中)，吃时必须回锅再煮熟蒸透。</p><p><strong>　　6、吃蟹不可太多</strong>，蟹肉性寒，不宜多食。脾胃虚寒者尤应引起注意，以免腹痛腹泻。一般吃蟹一至两个即可，吃完蟹后最好喝上一杯姜茶祛寒。</p><p>　　7、平素脾胃虚寒、大便溏薄、腹痛隐隐、风寒感冒未愈、宿患风疾、顽固性皮肤瘙痒疾患之人忌食; 月经过多、痛经、怀孕妇女忌食螃蟹，<strong>尤忌食蟹爪。</strong></p><p style="text-align: center;"><img src="http://resource.3uol.com/images/ueditor/20161213/6361726024288722498494881.jpg" title="下载.jpg" alt="下载.jpg"/></p><p><span style="font-size: 24px;"><strong>　　吃完螃蟹不能吃什么</strong></span></p><p>　　一般认为，吃完螃蟹后不宜立刻吃水果，尤其不宜吃柿子或者是梨，螃蟹与这些水果都是性寒之物，肠胃不好的人吃了可能会出现腹泻的现象。</p><p><strong>　　1、吃完螃蟹能喝牛奶吗?</strong></p><p>　　吃完螃蟹后不要立刻喝牛奶，因为吃螃蟹本就容易过敏，因此不建议与其他可能诱发过敏的食物搭配食用。为了避免出现腹泻，最好隔1~2个小时后再喝。</p><p><strong>　　2、吃完螃蟹多久能吃水果?</strong></p><p>　　吃完螃蟹后，建议2个小时左右再吃水果，尤其是柿子、梨等水果。</p><p><span style="font-size: 24px;"><strong>　　孕妇能吃螃蟹吗</strong></span></p><p>　　孕妇能吃螃蟹吗?秋天是螃蟹上市的季节，膏肥味美的螃蟹让很多孕妇馋涎欲滴。但经常有孕妇误吃螃蟹而导致流产的消息，让大部分人心存顾虑。</p><p>　　孕妇可以吃螃蟹吗?这个问题目前还存在争议，但古代中草药经典书籍《名医别录》中有记载“蟹爪，破包堕胎”。因为螃蟹性寒，有活血祛瘀的作用，孕早期的妈妈过多食用后易造成出血，增加流产风险。另外，螃蟹体内易残存寄生虫，吃多了可能对孕妇和胎儿的身体不利。</p><p>　　所以为了安全起见，建议孕妇少吃或不吃螃蟹。尤其是在孕早期，建议孕妇尽量不吃螃蟹，更不要吃蟹爪;孕中后期的孕妇，能不吃则最好，同时不能吃蟹脚。</p><p><br/></p>', 'http://ci3.dev/assets/images/thumb/2016/12/13/148164421099193300.jpg', 11, 0, 2, 1481707532),
(2, '孕妇补钙食物排行榜 孕妇补钙的食谱推荐', '　　补钙，我们常常说，孕妇补钙更是话题中的重点问题，很多准妈妈都知道孕期补钙的重要性。准妈妈们在孕期补钙，更多的是为了宝宝。孕期补钙存在很多误区，比如，孕晚期补钙会导致胎盘硬化之类的说法。我们也知道很多常见的补钙食物，比如乳类以及乳制品，那么，准妈妈们在孕期补钙一般都是吃什么的呢?有好的食谱推荐吗?在推荐食谱的同时，家长还要了解食谱里面有没有相克的食物呢?', '<p>补钙，我们常常说，孕妇补钙更是话题中的重点问题，很多准妈妈都知道孕期补钙的重要性。准妈妈们在孕期补钙，更多的是为了宝宝。孕期补钙存在很多误区，比如，孕晚期补钙会导致胎盘硬化之类的说法。我们也知道很多常见的补钙食物，比如乳类以及乳制品，那么，准妈妈们在孕期补钙一般都是吃什么的呢?有好的食谱推荐吗?在推荐食谱的同时，家长还要了解食谱里面有没有相克的食物呢?</p><p style="text-align: center;"><img src="http://resource.3uol.com/images/ueditor/20161213/6361725979432316149742341.jpg" title="u=318736955,3605050217&amp;fm=15&amp;gp=0.jpg" alt="u=318736955,3605050217&amp;fm=15&amp;gp=0.jpg"/></p><p><span style="font-size: 24px;"><strong>　　孕妇补钙的食物有哪些</strong></span></p><p>　　宝宝骨骼发育所需的钙质完全来自于母体，很多准妈妈在孕期饮食中没有额外补充钙质就容易出现各种缺钙的症状。孕妇除了要选择合适的钙制剂以外，在饮食中获取钙质是最安全方便的方法。那么孕妇补钙的食物有哪些呢?</p><p><strong>　　1、奶制品：</strong>牛奶、奶粉、奶酪、酸奶、炼乳等</p><p>　　孕妇补钙时牛奶是最好的钙质来源，在半斤的牛奶中就含有近300mg的钙质，当然除了钙质之外还有多种氨基酸、乳酸、矿物质及维生素等营养素，帮助人体对钙的充分吸收以及消化。需要注意的是，由于胎儿所需的钙量全部要从母体吸收，孕妇单靠食物中摄取的钙量是远远满足不了胎儿快速发育所需的，所以还要合理的选择钙剂来加强补钙，孕妇可以吃钙\r\n \r\n之缘片，安全性高，不刺激<a href="http://www.3uol.com/mama/34491.html" target="_blank" title="如何让宝宝拥有好的肠胃？" style="color: rgb(255, 0, 0); text-decoration: underline;"><span style="color: rgb(255, 0, 0);">肠胃</span></a>。</p><p>　<strong>　2、海产品</strong>：海带、虾皮、鲫鱼、鲤鱼、鲢鱼、泥鳅等</p><p>　　在所有的海产品中几乎都含有丰富的钙质，其中以海带和虾皮是其中含钙量最高的食物。将海带与肉类同煮或是煮熟后凉拌，除了口感鲜美之外，同时含钙量更加的丰富，每天吃25g就可以补钙300mg。而虾皮中的含钙量更是丰富，25g虾皮就含有500mg的钙，因此平时不妨用虾皮做汤或做馅以此来补钙。</p><p><strong>　　3、豆制品：</strong>豆腐、豆浆、豆腐干、豆腐皮、豆腐乳等</p><p>　　在我们经常食用的大豆以及各种豆制品中，也都含有丰富的钙质，而且大豆还是高蛋白食物。在500g的豆浆中就含有钙质120mg，150g豆腐干含钙就高达500mg。但由于豆腐中的钙吸收率远低于奶制品，因此最好的补钙来源还是以牛奶为主，大豆则可以作为奶之外的补充。\r\n \r\n...</p><p>　　<span style="font-size: 24px;"><strong>孕妇补钙的食谱推荐</strong></span></p><p>　　怀孕期间，准妈妈体内的钙质会大量流失，来保证宝宝骨骼发育的需要。孕妇如果按照正常人的饮食习惯，流失的钙质没有办法得到补充，就会出现各种缺钙的症状。孕妇补钙食谱，准妈妈们快拿笔记本记下来吧。</p><p><strong>　　1、孕妇补钙食谱一：虾皮炒菠菜</strong></p><p><strong>　　原料：</strong>菠菜400克，虾皮10克，植物油10克，葱、姜、蒜各适量。</p><p><strong>　　做法：</strong>将菠菜洗干净，切成3厘米长的段;干虾皮用温水稍泡，洗净;将炒锅置于火上，放入油，待油热后，放入葱花及虾皮炒;将菠菜放入，一同炒几下，再放入食盐等炒即可。</p><p>　　此食谱含蛋白质12.3g，脂肪26.3g，能量325.4Kcal,钙336.3 g。</p><p style="text-align: center;"><img src="http://resource.3uol.com/images/ueditor/20161213/6361725981574366544298066.jpg" title="u=1887425099,281447906&amp;fm=21&amp;gp=0.jpg" alt="u=1887425099,281447906&amp;fm=21&amp;gp=0.jpg"/></p><p><strong>　　2、孕妇补钙食谱二：海米炒油菜</strong></p><p><strong>　　原料：</strong>油菜500克，水海米50克、香菇片、玉米片、火腿片各2.5克，姜末少许、食盐适量，油10克，鲜汤适量。</p><p><strong>　　做法</strong>：切成3.3厘米长的段，菜心用刀一破四掕，改切约3厘米的段，然后在开水内焯一下捞出，挤干水分，放在盘内;将炒锅放在火上，放入油，油热时，将油菜、海米、香菇片、玉米片、火腿片下锅，加上佐料和鲜汤，将锅翻动，炒匀即可。</p><p>　　此食谱含蛋白质12.7克，脂肪52.1克，能量571.6卡，钙584.6毫克。</p><p><span style="font-size: 24px;"><strong>　　孕妇补钙的最佳剂量</strong></span></p><p>　　在整个孕期，不同阶段准妈妈对钙质的需求量是不一样的。在孕妇补钙的最佳时间保证充足的钙质摄入，既能保证妈妈的身体健康，也能让宝宝的成长发育有足够的保障。</p><p><strong>　　1、怀孕早期(0～12周)</strong></p><p>　　(1)一般妊娠早期每日钙需要量为800毫克，这个时期的准妈妈如果每天能喝1-2袋奶(一袋奶250毫升约含260毫克的钙)，那么额外补充1片迪巧——美国进口钙(300毫克钙)即可，不爱喝奶的则要吃2片迪巧——美国进口钙。</p><p>　　(2)在妊娠早期(0-12周)，妈妈每天向胎儿提供的钙从0增加到50毫克。因此，准妈妈们最好在准备开始怀孕的时候就开始补钙，尤其是不爱吃奶制品和体质虚弱的女性更该提早行动。</p><p><strong>　　2、怀孕中期(13～26周)</strong></p><p>　　(1)为了更好地吸收钙质，孕妈妈还需要配合补钙做一些辅助工作，例如平时多晒太阳，充足的紫外线照射可以促进维生素D在人体内的合成，提高钙的吸收率。同时，孕妇多活动骨关节，做肌肉抻拉练习，能够改善骨骼肌的营养状况，提高骨密度。</p><p>　　(2)孕妇补钙最迟不要超过怀孕20周，因为这个阶段是胎儿骨骼形成、发育最旺盛的时期，妊娠中期妈妈对钙的需求量增加到了1200毫克。</p><p style="text-align: center;"><img src="http://resource.3uol.com/images/ueditor/20161213/6361725983411260699384400.jpg" title="u=3039967373,4125308523&amp;fm=15&amp;gp=0.jpg" alt="u=3039967373,4125308523&amp;fm=15&amp;gp=0.jpg"/></p><p><strong>　　3、怀孕晚期(27周～足月)</strong></p><p>　　妊娠晚期是宝宝蓄积骨量最多的时期，需要妈妈每天提供150-450毫克的钙，平均每天约350毫克。此时同样要做到坚持补钙，为自己和宝宝补足孕期最后阶段所需的钙。中国营养学会推荐孕晚期和哺乳期的妈妈每天应摄入1200毫克的钙，这样才能够保证妈妈和宝宝骨骼的“双赢”。\r\n &nbsp;　<span style="font-size: 24px;"><strong>　孕妇补钙的注意事项</strong></span></p><p>　　人体是一个有机的整体，补钙不是简单地加减乘除，缺多少补多少就可以了。个体差异、食物种类、搭配差异，都会对钙的摄入产生影响。孕妇补钙注意事项，还是需要好好学习一下。</p><p><strong>　　1、钙剂种类的选择</strong></p><p>　　(1)目前市场上钙剂的数量以活性钙为主，但有报道指出,在其制剂成品中检测出砷、汞、铅和铬，另外其毒性也较大,故对其安全性尚待评价。</p><p>　　(2)在强化食品中,使用最多的是碳酸钙。虽然碳酸钙吸收利用的个体差异大，但群体的平均利用率与其他形式钙以及乳制品相比无显著差异。由于碳酸钙的溶解需较低PH，故不适合于胃酸缺乏的病人。</p><p>　　(3)枸橼酸钙等有机酸钙，尽管钙含量较低，但比碳酸钙易溶解，适于胃酸缺乏病人。</p><p>　　(4)磷酸钙可作为强化剂加入食品或期货钙剂合用，但这些产品不易溶解，且含有相当数量的磷，不宜用于肾衰的病人。另外,许多钙剂产品中含有维生素D、镁及其他矿物质，这些产品用于肾功能不全病人或限制某种营养摄入病人时应谨慎。目前又出现了一种新的钙剂———L—苏糖酸钙，由有生物活性的阴离子与钙结合得到的盐，在体内血钙浓度达峰时间、半衰期以及总的生物利用度均较大。</p><p><strong>　　2、钙剂剂量的选择</strong></p><p>　　钙的吸收随着钙的摄入量增加而增加，但到达某一值后，摄入量再增加，钙的吸收却不再增加。孕妇在补钙的时候要考虑是机体(例如年龄、性别、种族习惯)的个体需要量不同，还是食物中钙的摄入量不同。</p><p><span style="font-size: 24px;"><strong>　　孕妇补钙什么时候吃好</strong></span></p><p>　　孕妇补钙什么时候吃好呢?准妈妈在补钙的时候应该选择少量多次补钙，这样的效果会更好，吸收更好。</p><p>　　吃钙片的时候分几次吃，喝牛奶也可以分开几次喝。因为钙很容易会和草酸、植酸等物质结合，影响吸收，而含有这些物质的多数为食物，因此补钙的最好时间是在睡觉之前或者两餐之间。注意要在睡觉之前一段时间以及晚饭后休息半小时后补钙最好，因为这些时间血钙的浓度低，最适合补钙。</p><p>　　那么妈妈们补钙的时候出了吃钙片之外，还可以吃些什么呢?豆腐类食物、虾皮等都是含钙量比较高的食物，可以食用补钙。另外除了摄入钙质外，补充维生素D帮助吸收钙质也很重要。这就要妈妈们每天要在阳光充足的室外活动活动才行。</p><p><br/></p>', 'http://ci3.dev/assets/images/thumb/2016/12/13/148164426904125300.jpg', 11, 0, 11, 1481707509);

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL COMMENT '摘要',
  `image_url` varchar(200) NOT NULL,
  `audio_url` varchar(200) NOT NULL,
  `category_id` tinyint(1) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `title`, `abstract`, `image_url`, `audio_url`, `category_id`, `likes`, `views`, `update_time`) VALUES
(1, '俞敏洪：你现在不看，孩子18岁你就后悔了', '我之所以能够在这谈谈家庭教育的心得，确实是因为我接触的孩子太多了。\n我看到过很多幸福的学生，也看到了很多被耽误的学生；看到了很多家长因为孩子的成功感到无比的幸福，也看到了很多家长因为孩子的不成功而痛不欲生；我看到很多贫困家庭最后因为孩子有出息而生活的满心幸福；我也看到很多亿万富翁的家庭，最后因为孩子问题父母甚至患上精神分裂症。好多父母都和我说，俞老师，我把我所有的钱都捐给你，只要你能把我的孩子变', 'http://ci3.dev/assets/images/thumb/2016/12/11/148144361624916700.jpg', 'http://mamafm.resource.3uol.com/20161213/1481613929920.mp3?e=1481791717&token=rDBDYPw36ixTYG84GMf3g1nTE-S7n3DNIljpe65f:MYqiaY-CjK_P6x4qi6jk5Ma1es0=', 6, 0, 7, 1481707318),
(2, '不要借口工作忙而忽略孩子', '人与人之所以不一样，主要是因为在后天受到的教育方式不同。在幼年的意识中留下的印象，哪怕是微不足道的，都会在未来漫长的一生中发挥重要的影响。孩子是父母的影子，孩子是父母的翻版。千万不要借口工作忙而忽略对孩子的教育。\n……\n在线收听：\n不要借口工作忙而忽略孩子\n>>进入主播【文月】的个人电台', 'http://ci3.dev/assets/images/thumb/2016/12/11/148144370944724600.jpg', 'http://mamafm.resource.3uol.com/20161213/1481613929920.mp3?e=1481791717&token=rDBDYPw36ixTYG84GMf3g1nTE-S7n3DNIljpe65f:MYqiaY-CjK_P6x4qi6jk5Ma1es0=', 6, 0, 4, 1481705460);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `sort_id` tinyint(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='分类表';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `type`, `sort_id`) VALUES
(1, '孕产百问', 1, 1),
(2, '准备怀孕', 1, 2),
(3, '宝宝疾病', 1, 3),
(4, '早教心理', 1, 4),
(5, '饮食护理', 1, 5),
(6, '育儿', 2, 1),
(7, '儿童故事', 2, 2),
(8, '情感', 2, 3),
(9, '智慧', 2, 4),
(10, '婚姻', 2, 5),
(11, '健康', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `abstract` varchar(200) NOT NULL COMMENT '摘要',
  `image_url` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `category_id` tinyint(1) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `abstract`, `image_url`, `video_url`, `category_id`, `likes`, `views`, `update_time`) VALUES
(1, '父母有高血压会遗传给小孩吗？', '很多家长问到，父母有高血压的倾向或者是有高血压疾病，会遗传给小孩吗？一起看看广州市白云区妇幼保健院妇产科杨承东副主任医师怎么说吧。', 'http://ci3.dev/assets/images/thumb/2016/12/05/148087217926345800.jpg', 'http://200021154.vod.myqcloud.com/200021154_c35bda167d5311e6b7ea7faff263bace.f30.mp4?start=0', 1, 0, 5, 1481707193),
(2, '先兆子痫患者是心脑血管疾病的高危人群吗', '有资料显示先兆子痫患者是日后发生心脑血管疾病的高危人群，其实在产后有没有方法可以预防出现心脑血管疾病的出现的呢？一起看看广州市白云区妇幼保健院妇产科杨承东副主任医师怎么说吧。', 'http://ci3.dev/assets/images/thumb/2016/12/05/148087218789995200.jpg', 'http://200021154.vod.myqcloud.com/200021154_2bd5e9ea757211e6ae28a5b0aa5d87cd.f30.mp4?start=0', 1, 0, 7, 1481704192);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`), ADD KEY `sort_id` (`sort_id`), ADD KEY `type` (`type`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
