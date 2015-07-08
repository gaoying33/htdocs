<?php
// 本类由系统自动生成，仅供测试用途
        $rssfeed = array("http://news.baidu.com/n?cmd=1&class=technnews&tn=rss");  
   
   //设置编码为UTF-8 
         header('Content-Type:text/html;charset= UTF-8');      

            $i=0;
        
            $buff = ""; 
            $rss_str=""; 
            //打开rss地址，并读取，读取失败则中止 
            $fp = fopen($rssfeed[$i],"r") or die("can not open $rssfeed");  
            while ( !feof($fp) ) 
            { 
                $buff .= fgets($fp,4096); 
            } 
        //关闭文件打开 
            fclose($fp); 

            //建立一个 XML 解析器 
            $parser = xml_parser_create(); 
            //xml_parser_set_option -- 为指定 XML 解析进行选项设置 
            xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1); 
            //xml_parse_into_struct -- 将 XML 数据解析到数组$values中 
            xml_parse_into_struct($parser,$buff,$values,$idx); 
            //xml_parser_free -- 释放指定的 XML 解析器 
            xml_parser_free($parser); 
            
            $num =0;
            foreach ($values as $val) 
            { 
                 
                
                    $tag = $val["tag"]; 
                    $type = $val["type"]; 
                    $value = $val["value"]; 
                    //标签统一转为小写 
                    $tag = strtolower($tag); 

                    if ($tag == "item" && $type == "open"){ 
                        $is_item = 1; 
                    }else if ($tag == "item" && $type == "close") { 
                        //构造输出字符串 
                        $num = $num +1;
                        if ($num>5) {
                            break;
                        }
                        $rss_str .= "<li>
                        <a href='".$link."' target=_blank>".$title."</a>
                    </li>
                    "; 
                        $is_item = 0; 
                    } 
                    //仅读取item标签中的内容 
                    if($is_item==1){ 
                        if ($tag == "title") {$title = $value;}         
                        if ($tag == "link") {$link = $value;} 
                    } 
               
            } 
           //输出结果 
            echo $rss_str;