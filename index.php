<?php
    //获得参数 signature nonce token timestamp echostr
    $nonce     = $_GET['nonce'];
    $token     = 'haha';
    $timestamp = $_GET['timestamp'];
    $echostr   = $_GET['echostr'];
    $signature = $_GET['signature'];
    //形成数组，然后按字典序排序
    $array = array();
    $array = array($nonce, $timestamp, $token);
    sort($array);
    //拼接成字符串,sha1加密 ，然后与signature进行校验
    $str = sha1( implode( $array ) );
    if( $str == $signature && $echostr ){
        //第一次接入weixin api接口的时候
        echo  $echostr;
        exit;
    }
 else{
   //1.获取到微信推送过来post数据（xml格式）
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        //2.处理消息类型，并设置回复类型和内容
        $postObj = simplexml_load_string( $postArr );
        //判断该数据包是否是订阅的事件推送
        if( strtolower( $postObj->MsgType) == 'event'){
            //如果是关注 subscribe 事件
            if( strtolower($postObj->Event == 'subscribe') ){
                //回复用户消息(纯文本格式)
                $toUser   = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time     = time();
                $msgType  =  'text';
                $content  = '欢迎关注我们的微信公众账号，此公众号为测试公众号！'.$postObj->FromUserName.'-'.$postObj->ToUserName;
                $template = "<xml>
                                <ToUserName><![CDATA[%s]]></ToUserName>
                                <FromUserName><![CDATA[%s]]></FromUserName>
                                <CreateTime>%s</CreateTime>
                                <MsgType><![CDATA[%s]]></MsgType>
                                <Content><![CDATA[%s]]></Content>
                                </xml>";
                $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
                echo $info;
            }
        }
   else   if(strtolower($postObj->MsgType) == 'text')
{ 
$content = $postObj->Content;
$toUser=$postObj->FromUserName; 
$fromUser=$postObj->ToUserName;
     
     if(!is_numeric($content)){
      $arr['北京']='101010100';  $arr['朝阳']='101010300';  $arr['顺义']='101010400';  $arr['怀柔']='101010500';  $arr['通州']='101010600';  $arr['昌平']='101010700';  $arr['延庆']='101010800';  $arr['丰台']='101010900';  $arr['石景山']='101011000';  $arr['大兴']='101011100';  $arr['房山']='101011200';  $arr['密云']='101011300';  $arr['门头沟']='101011400';  $arr['平谷']='101011500';  $arr['八达岭']='101011600';  $arr['佛爷顶']='101011700';  $arr['汤河口']='101011800';  $arr['密云上甸子']='101011900';  $arr['斋堂']='101012000';  $arr['霞云岭']='101012100';  $arr['北京城区']='101012200';  $arr['海淀']='101010200';  $arr['天津']='101030100';  $arr['宝坻']='101030300';  $arr['东丽']='101030400';  $arr['西青']='101030500';  $arr['北辰']='101030600';  $arr['蓟县']='101031400';  $arr['汉沽']='101030800';  $arr['静海']='101030900';  $arr['津南']='101031000';  $arr['塘沽']='101031100';  $arr['大港']='101031200';  $arr['武清']='101030200';  $arr['宁河']='101030700';  $arr['上海']='101020100';  $arr['宝山']='101020300';  $arr['嘉定']='101020500';  $arr['南汇']='101020600';  $arr['浦东']='101021300';  $arr['青浦']='101020800';  $arr['松江']='101020900';  $arr['奉贤']='101021000';  $arr['崇明']='101021100';  $arr['徐家汇']='101021200';  $arr['闵行']='101020200';  $arr['金山']='101020700';  $arr['石家庄']='101090101';  $arr['张家口']='101090301';  $arr['承德']='101090402';  $arr['唐山']='101090501';  $arr['秦皇岛']='101091101';  $arr['沧州']='101090701';  $arr['衡水']='101090801';  $arr['邢台']='101090901';  $arr['邯郸']='101091001';  $arr['保定']='101090201';  $arr['廊坊']='101090601';  $arr['郑州']='101180101';  $arr['新乡']='101180301';  $arr['许昌']='101180401';  $arr['平顶山']='101180501';  $arr['信阳']='101180601';  $arr['南阳']='101180701';  $arr['开封']='101180801';  $arr['洛阳']='101180901';  $arr['商丘']='101181001';  $arr['焦作']='101181101';  $arr['鹤壁']='101181201';  $arr['濮阳']='101181301';  $arr['周口']='101181401';  $arr['漯河']='101181501';  $arr['驻马店']='101181601';  $arr['三门峡']='101181701';  $arr['济源']='101181801';  $arr['安阳']='101180201';  $arr['合肥']='101220101';  $arr['芜湖']='101220301';  $arr['淮南']='101220401';  $arr['马鞍山']='101220501';  $arr['安庆']='101220601';  $arr['宿州']='101220701';  $arr['阜阳']='101220801';  $arr['亳州']='101220901';  $arr['黄山']='101221001';  $arr['滁州']='101221101';  $arr['淮北']='101221201';  $arr['铜陵']='101221301';  $arr['宣城']='101221401';  $arr['六安']='101221501';  $arr['巢湖']='101221601';  $arr['池州']='101221701';  $arr['蚌埠']='101220201';  $arr['杭州']='101210101';  $arr['舟山']='101211101';  $arr['湖州']='101210201';  $arr['嘉兴']='101210301';  $arr['金华']='101210901';  $arr['绍兴']='101210501';  $arr['台州']='101210601';  $arr['温州']='101210701';  $arr['丽水']='101210801';  $arr['衢州']='101211001';  $arr['宁波']='101210401';  $arr['重庆']='101040100';  $arr['合川']='101040300';  $arr['南川']='101040400';  $arr['江津']='101040500';  $arr['万盛']='101040600';  $arr['渝北']='101040700';  $arr['北碚']='101040800';  $arr['巴南']='101040900';  $arr['长寿']='101041000';  $arr['黔江']='101041100';  $arr['万州天城']='101041200';  $arr['万州龙宝']='101041300';  $arr['涪陵']='101041400';  $arr['开县']='101041500';  $arr['城口']='101041600';  $arr['云阳']='101041700';  $arr['巫溪']='101041800';  $arr['奉节']='101041900';  $arr['巫山']='101042000';  $arr['潼南']='101042100';  $arr['垫江']='101042200';  $arr['梁平']='101042300';  $arr['忠县']='101042400';  $arr['石柱']='101042500';  $arr['大足']='101042600';  $arr['荣昌']='101042700';  $arr['铜梁']='101042800';  $arr['璧山']='101042900';  $arr['丰都']='101043000';  $arr['武隆']='101043100';  $arr['彭水']='101043200';  $arr['綦江']='101043300';  $arr['酉阳']='101043400';  $arr['秀山']='101043600';  $arr['沙坪坝']='101043700';  $arr['永川']='101040200';  $arr['福州']='101230101';  $arr['泉州']='101230501';  $arr['漳州']='101230601';  $arr['龙岩']='101230701';  $arr['晋江']='101230509';  $arr['南平']='101230901';  $arr['厦门']='101230201';  $arr['宁德']='101230301';  $arr['莆田']='101230401';  $arr['三明']='101230801';  $arr['兰州']='101160101';  $arr['平凉']='101160301';  $arr['庆阳']='101160401';  $arr['武威']='101160501';  $arr['金昌']='101160601';  $arr['嘉峪关']='101161401';  $arr['酒泉']='101160801';  $arr['天水']='101160901';  $arr['武都']='101161001';  $arr['临夏']='101161101';  $arr['合作']='101161201';  $arr['白银']='101161301';  $arr['定西']='101160201';  $arr['张掖']='101160701';  $arr['广州']='101280101';  $arr['惠州']='101280301';  $arr['梅州']='101280401';  $arr['汕头']='101280501';  $arr['深圳']='101280601';  $arr['珠海']='101280701';  $arr['佛山']='101280800';  $arr['肇庆']='101280901';  $arr['湛江']='101281001';  $arr['江门']='101281101';  $arr['河源']='101281201';  $arr['清远']='101281301';  $arr['云浮']='101281401';  $arr['潮州']='101281501';  $arr['东莞']='101281601';  $arr['中山']='101281701';  $arr['阳江']='101281801';  $arr['揭阳']='101281901';  $arr['茂名']='101282001';  $arr['汕尾']='101282101';  $arr['韶关']='101280201';  $arr['南宁']='101300101';  $arr['柳州']='101300301';  $arr['来宾']='101300401';  $arr['桂林']='101300501';  $arr['梧州']='101300601';  $arr['防城港']='101301401';  $arr['贵港']='101300801';  $arr['玉林']='101300901';  $arr['百色']='101301001';  $arr['钦州']='101301101';  $arr['河池']='101301201';  $arr['北海']='101301301';  $arr['崇左']='101300201';  $arr['贺州']='101300701';  $arr['贵阳']='101260101';  $arr['安顺']='101260301';  $arr['都匀']='101260401';  $arr['兴义']='101260906';  $arr['铜仁']='101260601';  $arr['毕节']='101260701';  $arr['六盘水']='101260801';  $arr['遵义']='101260201';  $arr['凯里']='101260501';  $arr['昆明']='101290101';  $arr['红河']='101290301';  $arr['文山']='101290601';  $arr['玉溪']='101290701';  $arr['楚雄']='101290801';  $arr['普洱']='101290901';  $arr['昭通']='101291001';  $arr['临沧']='101291101';  $arr['怒江']='101291201';  $arr['香格里拉']='101291301';  $arr['丽江']='101291401';  $arr['德宏']='101291501';  $arr['景洪']='101291601';  $arr['大理']='101290201';  $arr['曲靖']='101290401';  $arr['保山']='101290501';  $arr['呼和浩特']='101080101';  $arr['乌海']='101080301';  $arr['集宁']='101080401';  $arr['通辽']='101080501';  $arr['阿拉善左旗']='101081201';  $arr['鄂尔多斯']='101080701';  $arr['临河']='101080801';  $arr['锡林浩特']='101080901';  $arr['呼伦贝尔']='101081000';  $arr['乌兰浩特']='101081101';  $arr['包头']='101080201';  $arr['赤峰']='101080601';  $arr['南昌']='101240101';  $arr['上饶']='101240301';  $arr['抚州']='101240401';  $arr['宜春']='101240501';  $arr['鹰潭']='101241101';  $arr['赣州']='101240701';  $arr['景德镇']='101240801';  $arr['萍乡']='101240901';  $arr['新余']='101241001';  $arr['九江']='101240201';  $arr['吉安']='101240601';  $arr['武汉']='101200101';  $arr['黄冈']='101200501';  $arr['荆州']='101200801';  $arr['宜昌']='101200901';  $arr['恩施']='101201001';  $arr['十堰']='101201101';  $arr['神农架']='101201201';  $arr['随州']='101201301';  $arr['荆门']='101201401';  $arr['天门']='101201501';  $arr['仙桃']='101201601';  $arr['潜江']='101201701';  $arr['襄樊']='101200201';  $arr['鄂州']='101200301';  $arr['孝感']='101200401';  $arr['黄石']='101200601';  $arr['咸宁']='101200701';  $arr['成都']='101270101';  $arr['自贡']='101270301';  $arr['绵阳']='101270401';  $arr['南充']='101270501';  $arr['达州']='101270601';  $arr['遂宁']='101270701';  $arr['广安']='101270801';  $arr['巴中']='101270901';  $arr['泸州']='101271001';  $arr['宜宾']='101271101';  $arr['内江']='101271201';  $arr['资阳']='101271301';  $arr['乐山']='101271401';  $arr['眉山']='101271501';  $arr['凉山']='101271601';  $arr['雅安']='101271701';  $arr['甘孜']='101271801';  $arr['阿坝']='101271901';  $arr['德阳']='101272001';  $arr['广元']='101272101';  $arr['攀枝花']='101270201';  $arr['银川']='101170101';  $arr['中卫']='101170501';  $arr['固原']='101170401';  $arr['石嘴山']='101170201';  $arr['吴忠']='101170301';  $arr['西宁']='101150101';  $arr['黄南']='101150301';  $arr['海北']='101150801';  $arr['果洛']='101150501';  $arr['玉树']='101150601';  $arr['海西']='101150701';  $arr['海东']='101150201';  $arr['海南']='101150401';  $arr['济南']='101120101';  $arr['潍坊']='101120601';  $arr['临沂']='101120901';  $arr['菏泽']='101121001';  $arr['滨州']='101121101';  $arr['东营']='101121201';  $arr['威海']='101121301';  $arr['枣庄']='101121401';  $arr['日照']='101121501';  $arr['莱芜']='101121601';  $arr['聊城']='101121701';  $arr['青岛']='101120201';  $arr['淄博']='101120301';  $arr['德州']='101120401';  $arr['烟台']='101120501';  $arr['济宁']='101120701';  $arr['泰安']='101120801';  $arr['西安']='101110101';  $arr['延安']='101110300';  $arr['榆林']='101110401';  $arr['铜川']='101111001';  $arr['商洛']='101110601';  $arr['安康']='101110701';  $arr['汉中']='101110801';  $arr['宝鸡']='101110901';  $arr['咸阳']='101110200';  $arr['渭南']='101110501';  $arr['太原']='101100101';  $arr['临汾']='101100701';  $arr['运城']='101100801';  $arr['朔州']='101100901';  $arr['忻州']='101101001';  $arr['长治']='101100501';  $arr['大同']='101100201';  $arr['阳泉']='101100301';  $arr['晋中']='101100401';  $arr['晋城']='101100601';  $arr['吕梁']='101101100';  $arr['乌鲁木齐']='101130101';  $arr['石河子']='101130301';  $arr['昌吉']='101130401';  $arr['吐鲁番']='101130501';  $arr['库尔勒']='101130601';  $arr['阿拉尔']='101130701';  $arr['阿克苏']='101130801';  $arr['喀什']='101130901';  $arr['伊宁']='101131001';  $arr['塔城']='101131101';  $arr['哈密']='101131201';  $arr['和田']='101131301';  $arr['阿勒泰']='101131401';  $arr['阿图什']='101131501';  $arr['博乐']='101131601';  $arr['克拉玛依']='101130201';  $arr['拉萨']='101140101';  $arr['山南']='101140301';  $arr['阿里']='101140701';  $arr['昌都']='101140501';  $arr['那曲']='101140601';  $arr['日喀则']='101140201';  $arr['林芝']='101140401';  $arr['台北县']='101340101';  $arr['高雄']='101340201';  $arr['台中']='101340401';  $arr['海口']='101310101';  $arr['三亚']='101310201';  $arr['东方']='101310202';  $arr['临高']='101310203';  $arr['澄迈']='101310204';  $arr['儋州']='101310205';  $arr['昌江']='101310206';  $arr['白沙']='101310207';  $arr['琼中']='101310208';  $arr['定安']='101310209';  $arr['屯昌']='101310210';  $arr['琼海']='101310211';  $arr['文昌']='101310212';  $arr['保亭']='101310214';  $arr['万宁']='101310215';  $arr['陵水']='101310216';  $arr['西沙']='101310217';  $arr['南沙岛']='101310220';  $arr['乐东']='101310221';  $arr['五指山']='101310222';  $arr['琼山']='101310102';  $arr['长沙']='101250101';  $arr['株洲']='101250301';  $arr['衡阳']='101250401';  $arr['郴州']='101250501';  $arr['常德']='101250601';  $arr['益阳']='101250700';  $arr['娄底']='101250801';  $arr['邵阳']='101250901';  $arr['岳阳']='101251001';  $arr['张家界']='101251101';  $arr['怀化']='101251201';  $arr['黔阳']='101251301';  $arr['永州']='101251401';  $arr['吉首']='101251501';  $arr['湘潭']='101250201';  $arr['南京']='101190101';  $arr['镇江']='101190301';  $arr['苏州']='101190401';  $arr['南通']='101190501';  $arr['扬州']='101190601';  $arr['宿迁']='101191301';  $arr['徐州']='101190801';  $arr['淮安']='101190901';  $arr['连云港']='101191001';  $arr['常州']='101191101';  $arr['泰州']='101191201';  $arr['无锡']='101190201';  $arr['盐城']='101190701';  $arr['哈尔滨']='101050101';  $arr['牡丹江']='101050301';  $arr['佳木斯']='101050401';  $arr['绥化']='101050501';  $arr['黑河']='101050601';  $arr['双鸭山']='101051301';  $arr['伊春']='101050801';  $arr['大庆']='101050901';  $arr['七台河']='101051002';  $arr['鸡西']='101051101';  $arr['鹤岗']='101051201';  $arr['齐齐哈尔']='101050201';  $arr['大兴安岭']='101050701';  $arr['长春']='101060101';  $arr['延吉']='101060301';  $arr['四平']='101060401';  $arr['白山']='101060901';  $arr['白城']='101060601';  $arr['辽源']='101060701';  $arr['松原']='101060801';  $arr['吉林']='101060201';  $arr['通化']='101060501';  $arr['沈阳']='101070101';  $arr['鞍山']='101070301';  $arr['抚顺']='101070401';  $arr['本溪']='101070501';  $arr['丹东']='101070601';  $arr['葫芦岛']='101071401';  $arr['营口']='101070801';  $arr['阜新']='101070901';  $arr['辽阳']='101071001';  $arr['铁岭']='101071101';  $arr['朝阳']='101071201';  $arr['盘锦']='101071301';  $arr['大连']='101070201';  $arr['锦州']='101070701';
     $tmp=$arr[''.$content];
     
     if($tmp)
       $content=$tmp;
     }

   $url='http://t.weather.sojson.com/api/weather/city/'.$content;
	$html = json_decode(file_get_contents($url));
     
$time =time();
$msgType ='text';
     
     if($html->status==200)
		$content ='您查询的城市：'.$html->cityInfo->city.' 天气：'.$html->data->forecast[0]->type.' 湿度: '.$html->data->shidu.' pm25: '.$html->data->pm25.' 空气质量：'.$html->data->quality;
     else
       $content ='没有这个城市的编码';
     
$template ="<xml>
    <ToUserName><![CDATA[%s]]></ToUserName>
    <FromUserName><![CDATA[%s]]></FromUserName>
    <CreateTime>%s</CreateTime>
    <MsgType><![CDATA[%s]]></MsgType>
    <Content><![CDATA[%s]]></Content>
</xml>";

$info = sprintf($template, $toUser, $fromUser, $time, $msgType, $content); 
echo $info;
}
    }