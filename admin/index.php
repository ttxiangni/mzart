<?php
// 引入配置文件
require_once './config.php';
// 检查 zt cookie 是否设置为 ok
if (!isset($_COOKIE["zt"]) || $_COOKIE["zt"] !== "ok") {
    // 如果未登录，重定向到登录页面
    header("Location: login.php");
    exit;
}
$v_host = $_SERVER['HTTP_REFERER']?:$url;
// 用户已登录，继续显示管理后台内容
include('head.php');
include('data.php');
?>
<head>
<style>
.layui-elem-field{border-color:#00bcd4;}.width{width:120px !important;text-align:center;}.long{width:300px !important;text-align:center;}.smt{width:75px !important;text-align:center;}.sm{width:50px !important;text-align:center;}.layui-textarea{min-height:60px;height:38px;}#configSave{margin-bottom:0;background-color:#00BCD4;color:#ffffff;height:39px;border-radius:2px 2px 0 0;width:80px;border-width:1px;border-style:solid;border-color:#00BCD4;}.layui-form-pane .layui-form-label{padding:8px 5px;}
    .layui-tab-title {display: flex;justify-content: center;}/*导航居中*/
    /* 基础样式 */
.layui-tab-title li{position:relative;cursor:pointer;transition:color 0.3s;padding:10px 20px;/* 调整内边距以适应动效 */
    color:#333;/* 默认字体颜色 */}/* 未选中状态的伪元素 */
.layui-tab-title li::after{content:'';position:absolute;left:0;bottom:0;/* 将边框放在文字下方 */
    width:0;height:2px;/* 边框高度 */
    background-color:#16baaa;/* 边框颜色 */
    transition:width 0.3s ease;z-index:-1;/* 确保伪元素在文字下方 */}/* 选中状态的伪元素 */
.layui-tab-title li.layui-this::after{width:100%;}/* 选中状态的字体颜色 */
.layui-tab-title li.layui-this{color:white;/* 选中时字体颜色为白色 */}
.layui-input-inline{position:relative;}.eye-icon{position:absolute;right:10px;top:50%;transform:translateY(-50%);cursor:pointer;}

.layui-form-pane .layui-form-label {
    width: 155px;
}
.layui-tab-content2 {
    padding: -12px 0
}
.layui-badge,.layui-badge-dot,.layui-badge-rim {
    position: relative;
    display: inline-block;
    padding: 0 6px;
    font-size: 12px;
    text-align: center;
    background-color: #ff0000;
    color: #fff;
    border-radius: 2px
}
	</style>
<body>
	<form class="layui-form layui-form-pane" name="configform" id="configform">
		<div class="layui-tab" overflow>
			<ul class="layui-tab-title">
			    <li class="layui-this">播放器说明</li>
			    <li class="">网站设置</li>
				<li class="">解析设置</li>
				<li class="">主题管理</li>
				<li class="">广告设置</li>
				<li class="">弹幕设置</li>
				<li class="">本地弹幕管理</li>
				<li class="">修改密码</li> <!-- 新增的选项卡 -->
			</ul>
			<div class="layui-tab-content">
                <!--首页-->
                <div class="layui-tab-item layui-show">
                   <blockquote class="layui-elem-quote" style="margin: 20px 0;">
                	欢迎使用2024版MizhiPlayer 觅知ART弹幕播放器
                    </blockquote>
                    <div class="layui-col-md4" style="padding-right: 10px;">
                        <table class="layui-table">
                            
                            <thead>
                            <tr><th colspan="2" scope="col">播放器简介</th></tr>
                            </thead>
                              <tr><td>播放器名称</td><td><span>MizhiPlayer弹幕ART播放器</span></td></tr>    
                              <tr><td>当前系统</td><td><span class="layui-badge">觅知弹幕ART播放器</span></td></tr>
                              <tr><td>播放器作者</td><td>觅知博客</td></tr>
                              <tr><td>联系觅知</td><td>QQ2319281411</td></tr>
                              <tr><td>当前版本</td><td><span class="layui-badge">V24.12.1</td></tr>
                              <tr><td>更新时间</td><td>2024-12-01</td></tr>
                              <tr><td>觅知博客</td><td><a  target='_blank' href="https://www.98dou.cn">觅知博客</a></td></tr>
                              <tr><td>更新地址</td><td><a  target='_blank' href="https://www.98dou.cn/4973.html">售后更新地址</a></td></tr>
                              </div>
                               <thead>
                               <tr><td> <span class="layui-badge">播放器首页</td><td><a target='_blank' href="<?php echo $MIZHI['title_url']."?url=" ?>">访问首页</a></td></tr>
                              </thead>
                             <tr><td><span class="layui-badge">官方播放器演示</td><td><a target='_blank' href="https://www.98dou.cn/4973.html">官方演示站点</a></td></tr>
                            
                             <tr><td> <span class="layui-badge">关于版本</td><td>V24.12.1</td></tr>
                            
                            </tbody>
                        </table>
                    </div>
                    <div class="layui-col-md8">
                        <table class="layui-table">
 
                
                
                            <thead>
                            <tr><th>帮助中心</th></tr>
                            </thead>
                            <tbody>
                           <tr><td style="color: red;">安装教程</th></tr>
                           <tr><td> 文章中有详细的安装教程。<a  target='_blank' href="https://www.98dou.cn/4973.html">https://www.98dou.cn/4973.html</a></th></tr>
                           <tr><td style="color: red;">声明：此播放器仅限交流学习使用，下载后请24小时内删除，请在遵守中华人民共和国法律法规的情况下使用本站源码，严禁使用觅知博客上的源码从事任何非法活动！</th></tr>
                          <tr><td>  购买此播放器之后请勿二次售卖及分享，播放器用于交流学习使用，本主题不添加授权就是因为让大家更方便学习，如发现分享及二次售卖者永久取消更新交流资格</th></tr>
                          
                
                            <tbody>
                            <thead>
                            <tr><th>运行环境检测：</th></tr>
                            </thead>
                            <tbody>
                            <tr><td>1. 适用操作系统 Linux:您当前:<font color="green"><?php $os = PHP_OS;if (stripos($os, 'linux') !== false) { echo "Operating System: " . $os . " - 正确";} else {echo "Operating System: " . $os . " - 错误";}?></font></td></tr>
                            <tr><td>2. 推荐使用PHP版本≥5.6以上8.0以下版本：您当前:<?php $phpVersion = PHP_VERSION; if (version_compare($phpVersion, '5.6.0', '>=') && version_compare($phpVersion, '8.0.0', '<')) {echo '<font color="green">' . $phpVersion . ' - 正确</font>';} else {echo '<font color="red">' . $phpVersion . ' - 错误</font>';}?></td></tr>
                            <tr><td>3. 主题文件读写权限755：当前:<?php if (is_writable('./')) { echo '<font color="green"> - 正确</font>'; } else { echo '<font color="black"> - 不支持</font>'; } ?></td></tr>
                            <tr><td>4. 主题具备可复制性，请勿传播</td></tr>
                            <tr><td>5. 非技术人员请勿私自修改主题核心文件</td></tr>

                           	
                            </tbody>
                        </table>
                    </div>
                                   
                <div class="layui-row">
	            <blockquote class="layui-elem-quote" style="margin: 20px 0;">
		        快捷入口： 
		        <a class="layui-btn layui-btn-primary theme" target='_blank' href="https://www.rainyun.com/MZMUIvip_">服务器推荐(觅知在用)</a>
	        	<a class="layui-btn layui-btn-primary theme" target='_blank' href="https://www.98dou.cn/4973.html">觅知ART弹幕播放器</a> 
		        <a class="layui-btn layui-btn-primary theme" target='_blank' href="https://www.98dou.cn/5009.html">觅知MUI弹幕播放器</a>
		        <a class="layui-btn layui-btn-primary theme" target='_blank' href="https://98dou.cn/4312.html">BILI弹幕播放器</a>	 
                <a class="layui-btn layui-btn-primary theme" target='_blank' href="https://www.98dou.cn/3815.html">MxPro主题</a>
				<a class="layui-btn layui-btn-primary theme" target='_blank' href="https://98dou.cn/4973.html">MXoneV10主题</a>
				<a class="layui-btn layui-btn-primary theme" target='_blank' href="https://www.98dou.cn/category/pingguocms/macmsplug">苹果cms支付插件</a>
				
            	</blockquote>
                </div>
                </div>
                <!--首页end-->

<div class="layui-tab-item" name="播放器设置">
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">基本设置</li>
            <li>播放器设置</li>
        </ul>
        <div class="layui-tab-content">
            <!-- 基本设置内容 -->
            <div class="layui-tab-item layui-show">
               <!-- <p>这里是基本设置的内容...</p>-->
  					<div class="layui-form-item">
						<label class="layui-form-label">播放器名称</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[title]" value="<?php echo $MIZHI['title'] ?>" size="30" class="layui-input upload-input" placeholder="网站播放器名称">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器名称如：MizhiPlayer觅知弹幕ART播放器</div>
					</div>		
					<div class="layui-form-item">
						<label class="layui-form-label">播放器介绍</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[keywords]" value="<?php echo $MIZHI['keywords'] ?>" size="30" class="layui-input upload-input" placeholder="播放器介绍">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器介绍如：觅知ART专业版可对接JSON解析弹幕播放器</div>
					</div>	
					<div class="layui-form-item">
						<label class="layui-form-label">链接地址</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[title_url]" value="<?php echo $MIZHI['title_url'] ?>" size="30" class="layui-input upload-input" placeholder="网站链接地址">
						</div>
						<div class="layui-form-mid layui-word-aux">网站链接地址如：https://www.98dou.cn</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">LOGO</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[logo]" value="<?php echo $MIZHI['logo'] ?>" size="30" class="layui-input upload-input" placeholder="图片地址">
						</div>
						<div class="layui-form-mid layui-word-aux">图片地址 例如：./img/logo.png</div>
					</div>

              </div><!-- 播放器设置内容 -->
            <div class="layui-tab-item">
					<div class="layui-form-item">
						<label class="layui-form-label">播放器主题颜色</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[color]" value="<?php echo $MIZHI['color'] ?>" size="30" class="layui-input upload-input" placeholder="颜色代码">
						</div>
						<div class="layui-form-mid layui-word-aux">颜色代码 例如：#ff0000</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">继续播等待时间</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[waittime]" value="<?php echo $MIZHI['waittime'] ?>" size="30" class="layui-input upload-input" placeholder="单位/秒">
						</div>
						<div class="layui-form-mid layui-word-aux">继续播放等待时间</div>
					</div>

					<div class="layui-form-item">
						<label class="layui-form-label">右键文字</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[right_text]" value="<?php echo $MIZHI['right_text'] ?>" size="30" class="layui-input upload-input" placeholder="播放器中右键文字">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器中右键显示文字</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">右键链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[right_link]" value="<?php echo $MIZHI['right_link'] ?>" size="30" class="layui-input upload-input" placeholder="https://www.98dou.cn">
						</div>
						<div class="layui-form-mid layui-word-aux">播放器右键跳转链接</div>
					</div>
                
                
                		<div class="layui-form-item">
						<label class="layui-form-label">URL空或失败提示</label>
						<div class="layui-input-block">
							<input type="radio" name="MIZHI[err_bg]" value="video" title="视频" <?php echo ($MIZHI['err_bg'] == "video") ? "checked" : ""; ?>>
                             <input type="radio" name="MIZHI[err_bg]" value="img" title="图片" <?php echo ($MIZHI['err_bg'] == "img") ? "checked" : ""; ?>>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">失败提示图片地址</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[err_bg_imgurl]" value="<?php echo $MIZHI['err_bg_imgurl'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">失败提示图片地址默认：./img/bg.jpg</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">失败提示视频地址</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[err_bg_vodurl]" value="<?php echo $MIZHI['err_bg_vodurl'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">失败视频地址</div>
					</div>
                
				<div class="layui-form-item">
						<label class="layui-form-label">右上角时间</label>
						<div class="layui-input-block">
							<input type="checkbox" name="MIZHI[showtime]" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" <?php $t = $MIZHI['showtime'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">视频缩略图</label>
						<div class="layui-input-block">
							<input type="checkbox" name="MIZHI[video_thumbnails]" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" <?php $t = $MIZHI['video_thumbnails'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">倍速开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="MIZHI[beisu]" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" <?php $t = $MIZHI['beisu'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>

        
    </div></div></div>
    <div class="layui-form-item center">
        <div class="layui-input-block">
            <input name="edit" type="hidden" value="1" />
            <button class="layui-btn" type="button" onclick="text()">保 存</button>
            <button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
        </div>
    </div>
</div>
<!-- 第1个播放器设置结束 -->
				<!--第1个播放器设置结束-->
				<!--第2个解析设置开始-->


					
					
					
<div class="layui-tab-item" name="解析设置">
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">官方接口设置</li>
            <li>专用接口设置(去插播)</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
               <!-- <p>这里是第一个TAB内容...</p>-->
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口一</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[api_ur_1]" value="<?php echo $MIZHI['api_ur_1'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">JSON解析接口1</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口二</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[api_xl_url]" value="<?php echo $MIZHI['api_xl_url'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">JSON解析接口2</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口三</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[api_ur_3]" value="<?php echo $MIZHI['api_ur_3'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">JSON解析接口3</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口四</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[api_ur_4]" value="<?php echo $MIZHI['api_ur_4'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">JSON解析接口4</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">JSON接口五</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[api_ur_5]" value="<?php echo $MIZHI['api_ur_5'] ?>" size="50" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">JSON解析接口5</div>
					</div>
			   </div>
			   
			   <div class="layui-tab-item">
			    <!-- <p>这里是第二个TAB内容...</p>-->
<!-- 合并所有api_zyurl_domain的值 -->
<?php
// 初始化一个空数组来存储所有的域名
$all_domains = [];

// 循环获取每个api_zyurl_domain的值
for ($i = 1; $i <= 5; $i++) {
    if (!empty($MIZHI["api_zyurl_domain_$i"])) {
        // 将每个非空的域名添加到数组中
        $all_domains[] = $MIZHI["api_zyurl_domain_$i"];
    }
}
// 使用'|'连接符将所有域名合并成一个字符串
$api_zyurl_domain_all = implode('|', $all_domains);
?>

                    <div class="layui-form-item">
                        <label class="layui-form-label">所有插播特征域名</label>
                        <div class="layui-input-inline long">
                            <!-- 添加一个隐藏的输入字段用于存储合并后的域名 -->
                            <input type="hidden" name="MIZHI[api_zyurl_domain_all]" id="api_zyurl_domain_all_hidden" value="<?php echo htmlspecialchars($api_zyurl_domain_all); ?>">
                            <input type="text" disabled value="<?php echo htmlspecialchars($api_zyurl_domain_all); ?>" size="50" class="layui-input upload-input" placeholder="所有插播特征域名" id="api_zyurl_domain_all_preview">
                        </div>
                        <div class="layui-form-mid layui-word-aux">此位置为预览:实时更新你下方所填特征域名，无需手动填写。如想全部资源站的m3u8走接口下面直接填【.com|.cn|.xyz】多个|隔开域名后缀。</div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">专用去插播接口一</label>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_1]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_1'] ?? ''); ?>" size="50" class="layui-input upload-input" placeholder="插播json接口地址">
                        </div>
                        <div class="layui-form-mid layui-word-aux">插播特征域名配置:</div>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_domain_1]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_domain_1'] ?? ''); ?>" size="50" class="layui-input upload-input domain-input" placeholder="插播特征域名">
                        </div>
                        <div class="layui-form-mid layui-word-aux">例如：123.com|456.com用|隔开，不需要加http|https和端口号</div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">专用去插播接口二</label>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_2]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_2'] ?? ''); ?>" size="50" class="layui-input upload-input" placeholder="插播json接口地址">
                        </div>
                        <div class="layui-form-mid layui-word-aux">插播特征域名配置:</div>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_domain_2]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_domain_2'] ?? ''); ?>" size="50" class="layui-input upload-input domain-input" placeholder="插播特征域名">
                        </div>
                        <div class="layui-form-mid layui-word-aux">例如：123.com|456.com用|隔开，不需要加http|https和端口号</div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">专用去插播接口三</label>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_3]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_3'] ?? ''); ?>" size="50" class="layui-input upload-input" placeholder="插播json接口地址">
                        </div>
                        <div class="layui-form-mid layui-word-aux">插播特征域名配置:</div>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_domain_3]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_domain_3'] ?? ''); ?>" size="50" class="layui-input upload-input domain-input" placeholder="插播特征域名">
                        </div>
                        <div class="layui-form-mid layui-word-aux">例如：123.com|456.com用|隔开，不需要加http|https和端口号</div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">专用去插播接口四</label>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_4]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_4'] ?? ''); ?>" size="50" class="layui-input upload-input" placeholder="插播json接口地址">
                        </div>
                        <div class="layui-form-mid layui-word-aux">插播特征域名配置:</div>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_domain_4]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_domain_4'] ?? ''); ?>" size="50" class="layui-input upload-input domain-input" placeholder="插播特征域名">
                        </div>
                        <div class="layui-form-mid layui-word-aux">例如：123.com|456.com用|隔开，不需要加http|https和端口号</div>
                    </div>
                    
                    <div class="layui-form-item">
                        <label class="layui-form-label">专用去插播接口五</label>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_5]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_5'] ?? ''); ?>" size="50" class="layui-input upload-input" placeholder="插播json接口地址">
                        </div>
                        <div class="layui-form-mid layui-word-aux">插播特征域名配置:</div>
                        <div class="layui-input-inline long">
                            <input type="text" name="MIZHI[api_zyurl_domain_5]" value="<?php echo htmlspecialchars($MIZHI['api_zyurl_domain_5'] ?? ''); ?>" size="50" class="layui-input upload-input domain-input" placeholder="插播特征域名">
                        </div>
                        <div class="layui-form-mid layui-word-aux">例如：123.com|456.com用|隔开，不需要加http|https和端口号</div>
                    </div>
                    
                    <!-- 第二个配置结束 -->
                    </div></div> </div>
                    
                    <div class="layui-form-item center">
                        <div class="layui-input-block">
                            <input name="edit" type="hidden" value="1" />
                            <button class="layui-btn" type="button" onclick="text()">保 存</button>
                            <button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
                    						</div>
                    					</div>
                    				</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // 页面加载时填充隐藏字段和预览字段
    updateApiZyurlDomainAll();

    // 监听每个域名输入字段的 input 事件
    document.querySelectorAll('.domain-input').forEach(function(input) {
        input.addEventListener('input', function() {
            updateApiZyurlDomainAll();
        });
    });

    function updateApiZyurlDomainAll() {
        // 动态获取所有单个域名字段的值
        var domains = [];
        for (var i = 1; i <= 5; i++) {
            var domainValue = document.querySelector('input[name="MIZHI[api_zyurl_domain_' + i + ']"]').value.trim();
            if (domainValue) {
                domains.push(domainValue);
            }
        }

        // 使用'|'连接符将所有域名合并成一个字符串
        var api_zyurl_domain_all = domains.join('|');

        // 更新隐藏字段的值
        document.getElementById('api_zyurl_domain_all_hidden').value = api_zyurl_domain_all;

        // 更新预览字段的值
        document.getElementById('api_zyurl_domain_all_preview').value = api_zyurl_domain_all;
    }
});
</script>
				<!--第2个解析设置结束-->
				<!--第3个 主题管理 开始-->
               <div class="layui-tab-item" name="主题管理">
					<div class="layui-form-item">
						<label class="layui-form-label">播放器内加载背景图</label>
						<div class="layui-input-inline">
							<input type="text" name="MIZHI[load_bg]" value="<?php echo $MIZHI['load_bg'] ?>" size="30" class="layui-input upload-input" placeholder="播放器内加载背景图"></div><div class="layui-form-mid layui-word-aux">播放器内加载背景图地址默认：./img/pic_bj.avif</div>
					</div>	
					<div class="layui-form-item">
						<label class="layui-form-label">失败自定义文字</label>
						<div class="layui-input-inline">
							<input type="text" name="MIZHI[errzdytext]" value="<?php echo $MIZHI['errzdytext'] ?>" size="999" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">失败自定义文字</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">失败自定义链接</label>
						<div class="layui-input-inline">
							<input type="text" name="MIZHI[errzdylink]" value="<?php echo $MIZHI['errzdylink'] ?>" size="999" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">失败自定义链接</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">允许空Referer</label>
						<div class="layui-input-block">
							<input type="checkbox" name="MIZHI[blank_referer]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $MIZHI['blank_referer'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">核心接口防盗链</label>
						<div class="layui-input-inline">
							<input type="text" name="MIZHI[fdhost]" value="<?php echo $MIZHI['fdhost'] ?>" size="30" class="layui-input upload-input" placeholder="www.98dou.cn|xxxx.com">
						</div>
						<div class="layui-form-mid layui-word-aux">此功能是核心接口防盗并未播放器防盗链，用|隔开，不需要加http|https和端口号</div>
					</div>
					<div class="layui-form-item center">
						<div class="layui-input-block">
							<input name="edit" type="hidden" value="1" />
							<button class="layui-btn" type="button" onclick="text()">保 存</button>
							<button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
						</div>
					</div>
				</div>				
				<!--第3个 主题管理 结束-->
				
				<!--第4个 广告设置 开始-->
				<div class="layui-tab-item" name="广告设置">
					<div class="layui-form-item">
						<label class="layui-form-label">暂停广告开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="MIZHI[ads][pause][state]" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" <?php $t = $MIZHI['ads']['pause']['state'];
																																				if ($t == "on") {
																																					echo "checked";
																																				} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">全局暂停图片</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[ads][pause][pic]" value="<?php echo $MIZHI['ads']['pause']['pic'] ?>" size="30" class="layui-input upload-input" placeholder="图片地址">
						</div><div class="layui-form-mid layui-word-aux">暂停图片地址默认：./img/loading.gif</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">暂停图片跳转链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[ads][pause][link]" value="<?php echo $MIZHI['ads']['pause']['link'] ?>" size="30" class="layui-input upload-input" placeholder="暂停图片跳转链接">
						</div><div class="layui-form-mid layui-word-aux">暂停图片跳转链接</div>
					</div>				    
				    
				<div class="layui-form-item">
						<label class="layui-form-label">跑马灯开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="MIZHI[pmdoff]" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" <?php $t = $MIZHI['pmdoff'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">跑马灯文字</label>
						<div class="layui-input-inline long">
							 <textarea name="MIZHI[pmdzdy]" class="layui-textarea" style="width: 300px; height: 50px;" placeholder="跑马灯文字代码"><?php echo htmlspecialchars($MIZHI['pmdzdy'], ENT_QUOTES, 'UTF-8'); ?></textarea>
						</div>
						<div class="layui-form-mid layui-word-aux">跑马灯文字代码，支持HTML</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">跑马灯位置</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[pmdtopweizhi]" value="<?php echo $MIZHI['pmdtopweizhi'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">跑马灯位置默认10%</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">跑马灯循环次数</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[pmdloopnum]" value="<?php echo $MIZHI['pmdloopnum'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">跑马灯循环次数默认：3</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">跑马灯速度</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[pmdspeed]" value="<?php echo $MIZHI['pmdspeed'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">跑马灯速度默认：8 太快了，容易看不到</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">友情提醒信息</label>
						<div class="layui-input-inline long">

							<textarea name="MIZHI[tsmsg]" class="layui-textarea" style="width: 300px; height: 50px;" placeholder="友情提醒信息"><?php echo htmlspecialchars($MIZHI['tsmsg'], ENT_QUOTES, 'UTF-8'); ?></textarea>
						</div>
						<div class="layui-form-mid layui-word-aux">开始播放时的提示信息,，只支持文字，[留空则关闭]</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">友情提醒出现时间</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[tstime]" value="<?php echo $MIZHI['tstime'] ?>" size="30" class="layui-input upload-input" placeholder="单位/毫秒">
						</div>
						<div class="layui-form-mid layui-word-aux">友情提醒显示时间，单位毫秒，1000毫秒等于1秒</div>
					</div>
				<div class="layui-form-item">
						<label class="layui-form-label">暂停播放悬浮一言开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="MIZHI[yiyanhitokoto]" lay-skin="switch" lay-filter="switchTest" lay-text="开|关" <?php $t = $MIZHI['yiyanhitokoto'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">视频暂停悬浮固定文本</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[content]" value="<?php echo $MIZHI['content'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">视频暂停悬浮固定文本内容</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">视频暂停悬浮文本二</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[content2]" value="<?php echo $MIZHI['content2'] ?>" size="30" class="layui-input upload-input" placeholder="">
						</div>
						<div class="layui-form-mid layui-word-aux">视频暂停悬浮固定文本内容2</div>
					</div>
					
					<div class="layui-form-item center">
						<div class="layui-input-block">
							<input name="edit" type="hidden" value="1" />
							<button class="layui-btn" type="button" onclick="text()">保 存</button>
							<button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
						</div>
					</div>
				</div>
<!--第4个 广告设置 结束-->
               <!--第5个 弹幕设置 开始-->
               <div class="layui-tab-item" name="弹幕设置"><!--5-->
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕开关</label>
						<div class="layui-input-block">
							<input type="checkbox" name="MIZHI[danmuon]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $MIZHI['danmuon'];
																																	if ($t == "on") {
																																		echo "checked";
																																	} ?>>
							<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
						</div>
					</div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">弹幕列表开关</label>
                        <div class="layui-input-block" style="display: flex; align-items: center;">
                            <input type="checkbox" name="MIZHI[dm_list_on]" lay-skin="switch" lay-filter="switchTest" lay-text="ON|OFF" <?php $t = $MIZHI['dm_list_on']; if ($t == "on") { echo "checked"; } ?>>
                            <div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>Off</em><i></i></div>
                            <div class="layui-form-mid layui-word-aux" style="margin-left: 10px;">弹幕列表开关，当使用远程弹幕库的时候建议关闭不然容易弹幕数据太多容易卡死</div>
                        </div>
                    </div>
                     <div class="layui-form-item">
                        <label class="layui-form-label">弹幕ID接口加密方式</label>
                        <div class="layui-input-block" style="display: flex; align-items: center;">
                            <input type="radio" name="MIZHI[dm_url_md5]" value="on" title="MD5方式" <?php echo ($MIZHI['dm_url_md5'] == "on") ? "checked" : ""; ?>>
                            <input type="radio" name="MIZHI[dm_url_md5]" value="off" title="URL方式" <?php echo ($MIZHI['dm_url_md5'] == "off") ? "checked" : ""; ?>>
                            <div class="layui-form-mid layui-word-aux" style="margin-left: 10px;">弹幕ID接口加密方式本地弹幕库默认MD5方式，如果是你的接口不支持MD5则使用URL方式 注意:不懂别乱填保持MD5方式即可</div>
                        </div>
                    </div>
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕库接口地址</label>
						<div class="layui-input-inline">
							<input type="text" name="MIZHI[danmuku]" value="<?php echo $MIZHI['danmuku'] ?>" size="30" class="layui-input upload-input" placeholder="默认./dmku/">
						</div>
						<div class="layui-form-mid">接口地址参数</div>
							<div class="layui-input-inline">
							<input type="text" name="MIZHI[dm_url_canshu]" value="<?php echo $MIZHI['dm_url_canshu'] ?>" size="30" class="layui-input upload-input" placeholder="默认?ac=dm&id=或者?url=">
						</div>
						
						<div class="layui-form-mid layui-word-aux">【本地弹幕库地址./dmku/接口参数?ac=dm&id=】【URL弹幕地址参数?url=或者?ac=dm&url=】默认./dmku/参数?ac=dm&id= 注意;需要和上面的弹幕ID接口加密方式配合 不懂别乱填!!！</div>
					</div>

<!--					<div class="layui-form-item">
						<label class="layui-form-label">B站弹幕AID</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[bilibili]" value="<?php echo $MIZHI['bilibili'] ?>" size="30" class="layui-input upload-input" placeholder="引用B站弹幕AID号">
						</div>
						<div class="layui-form-mid layui-word-aux">建议留空bili播放页源码搜索aid=45520296</div>
					</div>	-->
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕发送间隔提示</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[sendtime]" value="<?php echo $MIZHI['sendtime'] ?>" size="30" class="layui-input upload-input" placeholder="单位/秒">
						</div>
						<div class="layui-form-mid layui-word-aux">指的是发送时间只能在设置时间后才能重新发送新弹幕</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕礼仪链接</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[dmrule]" value="<?php echo $MIZHI['dmrule'] ?>" size="30" class="layui-input upload-input" placeholder="链接地址">
						</div>
						<div class="layui-form-mid layui-word-aux">弹幕框右边按钮链接默认：./dmku/dm_rule.html</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">弹幕关键字禁用</label>
						<div class="layui-input-inline long">
							<input type="text" name="MIZHI[pbgjz]" value="<?php echo $MIZHI['pbgjz'] ?>" size="30" class="layui-input upload-input" placeholder="输入关键字以" ,"隔开">
						</div>
						<div class="layui-form-mid layui-word-aux">输入关键字以","隔开</div>
					</div>					
					
					
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">弹幕滚动速度</label>
                            <div class="layui-input-inline" style="width: 100px;">
                                <input type="number" name="MIZHI[dm_speed]" placeholder="" autocomplete="off" class="layui-input" min="0" step="1" value="<?php echo htmlspecialchars($MIZHI['dm_speed']); ?>" lay-affix="number">
                            </div><div class="layui-form-mid layui-word-aux">弹幕的播放速度设置，数字越大越慢 默认8</div>
                            </div></div>

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">弹幕字体大小</label>
                            <div class="layui-input-inline" style="width: 100px;">
                                <input type="number" name="MIZHI[dm_fontSize]" placeholder="" autocomplete="off" class="layui-input" min="0" step="1" value="<?php echo htmlspecialchars($MIZHI['dm_fontSize']); ?>" lay-affix="number">
                            </div><div class="layui-form-mid layui-word-aux">弹幕字体大小：数字越大字体越大，默认25</div>
                            </div></div>	

                   <div class="layui-form-item">
                      <div class="layui-inline">
                        <label class="layui-form-label">弹幕显示范围(必填)</label>
                        <div class="layui-form-mid">弹幕间距</div>
                        <div class="layui-input-inline" style="width: 100px;">
                          <input type="number" name="MIZHI[dm_margin_1]" placeholder="弹幕间距" autocomplete="off" class="layui-input" min="0" step="1" value="<?php echo isset($MIZHI['dm_margin_1']) ? $MIZHI['dm_margin_1'] : ''; ?>" lay-affix="number">
                        </div>
                        <div class="layui-form-mid">显示百分比</div>
                        <div class="layui-input-inline" style="width: 100px;">
                          <input type="text" name="MIZHI[dm_margin_2]" placeholder="弹幕显示百分比" autocomplete="off" class="layui-input" value="<?php echo isset($MIZHI['dm_margin_2']) ? $MIZHI['dm_margin_2'] : ''; ?>" id="price_max_input" lay-affix="number">
                        </div>
                        <div class="layui-form-mid layui-word-aux">弹幕间距-弹幕屏幕百分比%，弹幕初始显示范围，[10-75%就是1/4屏幕][10-25%就是3/4屏幕][10-50%就是半屏] [10-100%就是满屏幕]</div>
                      </div></div>


					
					<div class="layui-form-item center">
						<div class="layui-input-block">
							<input name="edit" type="hidden" value="1" />
							<button class="layui-btn" type="button" onclick="text()">保 存</button>
							<button class="layui-btn layui-btn-warm" type="reset" onclick="reset1()">还 原</button>
						</div>
					</div>
				</div>
                <!--第5个 弹幕设置 结束-->
				<!--第6个 弹幕管理 开始-->
				<div class="layui-tab-item" name="本地弹幕管理">
					<div class="layui-tab" overflow>
						<ul class="layui-tab-title">
							<li class="layui-this">本地弹幕列表</li>
							<li class="">举报列表</li>
							<button class="layui-btn layui-btn-normal" id="installButton" onclick="window.open('../dmku/install/');">安装本地弹幕库</button>
						</ul>
						<div class="layui-tab-content">
							<div class="layui-tab-item layui-show" name="弹幕列表">
								<div class="chu" style="margin-top:30px">
									<div class="demoTable layui-form-item">
										<div class="layui-inline">
											<label class="layui-form-label">搜索</label>
											<div class="layui-input-inline">
												<input class="layui-input" id="textdemo" placeholder="请输入弹幕id或弹幕关键字">
											</div>
											<button class="layui-btn" lay-submit="search_submits" type="button" lay-filter="reloadlst_submit">搜索</button>
										</div>
									</div>
								</div>
								<table class="layui-hide" id="dmlist" lay-filter="dmlist">
								</table>
							</div>

							<div class="layui-tab-item" name="举报列表">
								<table class="layui-hide" id="dmreport" lay-filter="report">
								</table>
							</div>

						</div>
					</div>
				</div><!--第6个 弹幕管理 结束-->
<!-- 新增的修改密码表单开始 -->
                <div class="layui-tab-item" name="修改密码">
                    <form class="layui-form" id="change-password-form">
                        <div class="layui-form-item">
                            <label class="layui-form-label">旧密码</label>
                            <div class="layui-input-inline">
                                <input type="password" name="old_password" placeholder="请输入旧密码" autocomplete="off" class="layui-input" id="old_password">
                                <i class="layui-icon layui-icon-password eye-icon" id="toggle-old-password" onclick="togglePasswordVisibility('old_password', this)"></i>
                            </div><div class="layui-form-mid layui-word-aux">输入旧密码，进入服务器查看配置文件查看旧密码</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">新密码</label>
                            <div class="layui-input-inline">
                                <input type="password" name="new_password" placeholder="请输入新密码" autocomplete="off" class="layui-input" id="new_password">
                                <i class="layui-icon layui-icon-password eye-icon" id="toggle-new-password" onclick="togglePasswordVisibility('new_password', this)"></i>
                            </div><div class="layui-form-mid layui-word-aux">输入新密码，新密码最少需要5个字符</div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">确认新密码</label>
                            <div class="layui-input-inline">
                                <input type="password" name="confirm_password" placeholder="请再次输入新密码" autocomplete="off" class="layui-input" id="confirm_password">
                                <i class="layui-icon layui-icon-password eye-icon" id="toggle-confirm-password" onclick="togglePasswordVisibility('confirm_password', this)"></i>
                            </div><div class="layui-form-mid layui-word-aux">确认新密码，新密码最少需要5个字符</div>
                        </div>
                        <div class="layui-form-item center">
                            <div class="layui-input-block">
                                <button class="layui-btn" type="button" id="change-password-btn">修 改</button>
                                <button class="layui-btn layui-btn-warm" type="reset" id="reset-password-btn">重 置</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- 新增的修改密码表单结束 -->
			</div>
		</div>
	</form>
<!--弹幕列表-->	
	<script type="text/html" id="listbar">
		<a class="layui-btn layui-btn-xs" lay-event="dmedit">编辑</a>
		<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
	</script>
	<script type="text/html" id="reportbar">
		<a class="layui-btn layui-btn-xs" lay-event="edit">误报</a>
		<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
	</script>

	<script type="text/template" id="bondTemplateList">
		<div class="layui-card-body" style="padding: 15px;">
        <form class="layui-form" lay-filter="component-form-group" id="submits" onsubmit="return false">
            <div class="layui-row layui-col-space10 layui-form-item">
                <input type="hidden" name="cid" value="{{ d[4] }}">
                <div class="layui-col-lg5">
                    <label class="layui-form-label">弹幕ID：</label>
                    <div class="layui-input-block">
                        <input type="text" name="id" placeholder="请输入名称" autocomplete="off"
                               lay-verify="required" class="layui-input"
                               value="{{ d[0]?d[0]:'' }}" {{# if(d[0]){ }}disabled{{# } }}>
                    </div>
                </div>
                <div class="layui-col-lg5">
                    <label class="layui-form-label">颜色：</label>
  						<div class="layui-input-block">
							<div class="layui-input-inline" style="width: 120px;">
								<input type="text" name="color" placeholder="请选择颜色" class="layui-input" id="test-form-input" value="{{ d[3]?d[3]:'' }}">
							</div>
						<div class="layui-inline" style="left: -11px;">
						<div id="test-form"></div>
					</div>
				</div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">弹幕内容</label>
                    <div class="layui-input-block">
                    <textarea name="text" placeholder="请输入内容" class="layui-textarea"
                              lay-verify="required">
                        {{ d[5] ? d[5]:'' }}
                    </textarea>
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="bond_sumbit">立即提交</button>
                </div>
            </div>
        </form>
    </div>
</script>			
				
				
				
		</div>
		</div>
	</form>

    <script>
        $(document).ready(function () {
            // 初始化 Layui
            layui.use(['element'], function(){
                var element = layui.element;

                // 处理 AJAX 请求
                $.ajax({
                    url: './api.php', // 请替换为实际的 API 端点
                    dataType: 'json',
                    data: {},
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader("If-Modified-Since", "0");
                        xhr.setRequestHeader("Cache-Control", "no-cache");
                    },
                    success: function (response) {
                        // 在这里处理 AJAX 响应
                        console.log(response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus, errorThrown);
                    }
                });
            });
        });
    </script>

<!-- 颜色选择器初始化脚本 -->
<script>
layui.use(['form', 'colorpicker'], function(){
	var form = layui.form,
		colorpicker = layui.colorpicker;
	
	// 初始化颜色选择器
	colorpicker.render({
		elem: '#test-form-input-color',
		color: '#ff0000', // 默认颜色
		predefined: true, // 是否启用预定义颜色
		done: function(color){
			$('#test-form-input-color').val(color); // 设置输入框的颜色值
		}
	});
});
</script>

</div>
</div>
</form>
<script>
  layui.use('layer', function(){
    var layer = layui.layer;

    $('#installButton').hover(
      function() {
        layer.tips('初次使用点击按钮去安装弹幕库', this, {
          tips: [2, '#ff5722'], // 1表示箭头在上方，#3595CC 是提示框的背景色
          time: 8000 // 提示框显示的时间，单位为毫秒
        });
      },
      function() {
        layer.closeAll('tips'); // 鼠标移开时关闭提示框
      }
    );
  });
</script>

<script type="text/javascript" src="/admin/js/tablistening.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/admin/js/adminpass.js" type="text/javascript" charset="utf-8"></script>
</body>
</head>
</html>