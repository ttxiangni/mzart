<?php
error_reporting(0);
//视频跨域
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: x-requested-with,content-type');
header('Access-Control-Allow-Methods: GET, POST');
require $_SERVER["DOCUMENT_ROOT"] . "/admin/data.php";
isset($_GET['ac']) ? $ac=htmlspecialchars(urldecode(trim($_GET['ac']))) : "";
isset($_GET['wd']) ? $wd=htmlspecialchars(urldecode(trim($_GET['wd']))) : "";
isset($_GET['ids']) ? $ids=htmlspecialchars(urldecode(trim($_GET['ids']))) : "";
isset($_GET['url']) ? $url=htmlspecialchars(urldecode(trim($_GET['url']))) : "";
if($ac=='list'){
    $cmsapi = $MIZHI['cmsapi'];
    $cmsids = $ids;
    $id = explode('/',$ids)[0];
    $sid = explode('/',$ids)[1]-1;
    if($sid<0){
        $sid = 0;
    }
    $nid = explode('/',$ids)[2]-1;
    if(!empty($id)){
        $data = get_url($cmsapi.'&ids='.$id);
    }else{
        $data = get_url($cmsapi.'&url='.$url);//URL搜索需要API支持URL查找。苹果可在Provide.php接口增加URL筛选如：if (!empty($this->_param['url'])) {$where['vod_play_url'] = ['like', '%' . $this->_param['url'] . '%'];}
    }
    $arr = json_decode($data, true);
    if($arr['list'][0]!=''){
        $vod_name = $arr['list'][0]['vod_name'];
        $vod_director = $arr['list'][0]['vod_director'];
        $vod_actor = $arr['list'][0]['vod_actor'];
        $vod_year = $arr['list'][0]['vod_year'];
        $type_name = $arr['list'][0]['type_name'];
        $vod_area = $arr['list'][0]['vod_area'];
        $vod_pic = ser_url($arr['list'][0]['vod_pic']);
        $vod_remarks = $arr['list'][0]['vod_remarks'];
        $vod_content = $arr['list'][0]['vod_content'];
        $vod_id = $arr['list'][0]['vod_id'];
        $bfq = explode("$$$",$arr['list'][0]['vod_play_from']);
        $v = $bfq[0];
        $purl = explode('$$$',$arr['list'][0]['vod_play_url']);
        $i=0;
        foreach ($bfq as $v){
            if($v!="no"){
                $vurl=explode("#",$purl[$i]);
                $ii=0;
                $hh='';
                foreach ($vurl as $v1){
                    $sd=$i+1;
                    $nd=$ii+1;
                    $jt=explode("$",$v1);
                    preg_match("/\/\/[^\s]*/",$url,$url1);
                    preg_match("/\/\/[^\s]*/",$jt[1],$url2);
                    if($nid==$ii&&$sid==$i||strpos($url2[0],$url1[0])!==false){
                        $style='color: #61f6ff;';//#fb7299
                        $active=' active';
                        $vod_part=$jt[0];
                        $class=' class="MIZHI-this"';
                        $show=' MIZHI-show';
                    }else{
                        $style='';
                        $active='';
                    }
                    $hh .= '<a style="cursor:pointer;' . $style . '" onclick="javascript:MIZHI.video.next(\'./?url=' . $jt[1] . '&ids=' . $vod_id . '/' . $sd . '/' . $nd . '/\')" class="box-item album-title' . $active . '" title="' . $vod_name . ' ' . $jt[0] . '">' . $jt[0] . '</a>'; 
                    $ii++;
                }
                $from.='<a href="javascript:"'.$class.'>'.$v.'</a>';
                $list.='<div class="MIZHI-selset-list anthology-content'.$show.'">'.$hh.'</div>';
                $class='';
                $show='';
                $i++;
            }
        }
        $json = [
            'code' => 200,
            'html' => '<div class="video-list-cl"><a style="color:#ffffff;cursor:pointer;" onclick="javascript:MIZHI.VodList.Off()" title="点击关闭">✖</a></div><div class="normal-title-wrap"><div class="pic-text-item"><a><div class="cover"><img class="bj" src="' . $vod_pic . '" /></div><div class="anthology-title-wrap"><div class="title">' . $vod_name . '</div><div class="subtitle">' . $vod_year . ' ' . $type_name . ' ' . $vod_area . '</div><div class="subtitle" style="max-height: 36px;">导演：' . $vod_director . '</div><div class="subtitle">主演：' . $vod_actor . '</div></div></a></div><div class="title-info">' . $vod_content . '</div></div><div class="scroll-area" id="listBox"><a class="component-title">选集:<span style="font-size:12px">(' . $vod_remarks . ')</span></a><div class="MIZHI-from-select"><a href="javascript:MIZHI.VodList.Tab()">切换片源</a><div class="MIZHI-list">' . $from . '</div></div>' . $list . '</div></div>',
            'title' => $vod_name,
            'part' => $vod_part,
            'vod_pic' => "$vod_pic",
            'vod_actor' => $vod_actor,
            'vod_year' => $vod_year,
            'type_name' => $type_name,
            'vod_area' => $vod_area,
            'vod_content' => "$vod_content",
        ];
    }else{
        $json = [
            'code' => 404,
            'msg' => '没有找到该视频相关资源',
            'title' => $MIZHI['title'],
            'ids' => $ids,
            'from' => $url,
        ];
    }
}else {
    unset(
    $MIZHI['api_ur_1'],
    $MIZHI['api_xl_url'],
    $MIZHI['api_ur_3'],
    $MIZHI['api_ur_4'],
    $MIZHI['api_ur_5'],
    $MIZHI['live_api'], 
    $MIZHI['api_zyurl_1'],
    $MIZHI['api_zyurl_2'],
    $MIZHI['api_zyurl_3'],
    $MIZHI['api_zyurl_4'],
    $MIZHI['api_zyurl_5']

        
    );
    $json = [
        'code' => 200,
        'data' => $MIZHI
    ];
}
die(json_encode($json));
function get_url($url){
    $headerArray =array("Content-type:application/json;");
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
    $output = curl_exec($ch);
    curl_close($ch);
    // $output = json_decode($output,true);
    return $output;
}
function ser_url($url=''){
    global $MIZHI;
    if (substr($url, 0, 4) == "mac:") {
        $url = str_replace('mac:', 'http:', $url);
    } elseif (substr($url, 0, 2) == "//") {
        $url = str_replace('//', 'http://', $url);
    } elseif (substr($url, 0, 7) == "/upload" || substr($url, 0, 7) == "upload/") {
        $url = $MIZHI['cmsimg'].$url;
    } 
    return $url;
}

?>