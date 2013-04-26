<?php
class RSS {
  function index(){

      //Query web info
      $queryWebInfo = "SELECT
                        subdomain_slogan,
                        subdomain_description
                       FROM
                        subdomain
                       ORDER BY
                        subdomain_id ASC";

      $webInfo = $GLOBALS['UNDbObject']->query($queryWebInfo);
      $page = 1;
      //Query content
      $queryItemInfo = "SELECT * FROM content LEFT JOIN subdomain ON content.content_owner = subdomain.subdomain_id ORDER BY content_id DESC LIMIT 0,".$GLOBALS['UNConfig']['SysInfo']['feedLimit'];

      $itemInfo = $GLOBALS['UNDbObject']->query($queryItemInfo);
    //var_dump($itemInfo);
    $url = "http://".$_SERVER['SERVER_NAME'];
    $currentUrl = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


    loadClass('RSS2Writer');

      $lu_date = ($result['content_lu_date'])?$result['content_lu_date']:date("Y-m-d H:m:s");
    //1. Instantiate new RSS2Writer, passing the title, description and link
    //--------------------------------
    $rss = new RSS2Writer(
      $webInfo[0]['subdomain_slogan'], 	//Feed Title
      $webInfo[0]['subdomain_description'], //Feed Description
      $url, //Feed Link
      6, //indent
      false, //Use CDATA
      $lu_date
      );


    //2. Add items to the rss feed channel, passing the title, description and link
    //--------------------------------
    foreach($itemInfo as $item){

        $result['content'] = unserialize($item['content_content']);
        unset($item['content_content']);

      if($result['content']['Offer_PercentageSaved'] == 0){
        $saved = '';
      }else{
        $saved = '<span style="font-size:1.1em;font-weight:bold;vertical-align:bottom;padding-left:5px;color:#990000">
                    Get "'.$result['content']['Offer_PercentageSaved'].'"% OFF
                  </span>';
      }


      if($item['content_owner']!=1){
        $innerURL = "http://".$item["subdomain_name"].".".str_replace("www.","",$_SERVER['HTTP_HOST'])."/".$item["content_title_seo"];
      }else{
        $innerURL = "http://".$_SERVER['HTTP_HOST']."/".$item["content_title_seo"];
      }

      if ($result['content']['MediumImage']['URL']) {
      $description = '<span style="float:left; padding-right:5px; padding-bottom:5px;">
                        <a href="'.linkOut($item['content_asin'],'page').'">
                          <img src="'.$result['content']['MediumImage']['URL'].'" border="0"/>
                        </a>
                      </span>';
      }
      $description .= '<strong>Product Description: </strong><br />
                      '.$result['content']['EditorialReviews'][0]['Content'].'
                      .<br /><br />';
                      if(count($result["content"]["Feature"])>0){
                        $description .= '<strong>Product Feature: </strong><br />';
                        foreach($result["content"]["Feature"] as $feature){
                          $description .= ' - '.$feature.'<br />';
                        }
                        $description .= '<br /><br />';
                      }
      $description .= '<a rel="nofollow" href="'.linkOut($item['content_asin'],'page').'">
                        <b>Click Here</b>
                      </a>to see more reviews about:
                      <a href="'.$innerURL.'">
                        '.$result['content']['Title'].'
                      </a>.
                      <br /><br />
                      <div align="center" style="width:100%;">
                      <p style="color:red;">'.$saved.'</p>
                      <a rel="nofollow" href="'.linkOut($item['content_asin'],'page').'">
                      <img title="Read more product details." alt="Read more product details." src="http://'.$_SERVER['HTTP_HOST'].'/themes/'.$GLOBALS['UNConfig']['SysInfo']['theme'].'/images/amazon-order.png" width="211" height="49">
                      </a></div>
                      <br /><br />';

      //Example Item
      $rss->addItem($result['content']['Title'], $description, $innerURL);
      //Add categories to the item
      $rss->addCategory($item["subdomain_keyword"]);
      //$rss->addCategory($item['content_id']);
      //$rss->addCategory($result['content']['Title']);
      //Optional Elements
      if($item['content_owner']!=1){
        $rss->addElement('author', "http://".$item["subdomain_name"].".".str_replace("www.","",$_SERVER['HTTP_HOST']));
      }else{
        $rss->addElement('author', "http://".str_replace("www.","",$_SERVER['HTTP_HOST']));
      }
     $rss->addElement('pubDate', $item['content_lu_date']);
    }

    //3. Output the RSS Feed
    //--------------------------------
    //$rss->writeToFile('rss.xml');		//write the xml output to file
    header( "content-type: text/xml; charset=utf-8" );
    echo $rss->getXML();				//send the xml output to the user/browser (interpreted as an rss feed)
  }
}
?>