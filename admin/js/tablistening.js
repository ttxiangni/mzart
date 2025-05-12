$(document).ready(function () {
    // 初始化 Layui 并使用 element 模块
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

        // 监听Tab切换事件
        element.on('tab(layui-tab)', function(data) {
            // 移除所有li的layui-this类
            var lis = document.querySelectorAll('.layui-tab-title li');
            lis.forEach(function(li) {
                li.classList.remove('layui-this');
            });

            // 给当前选中的li添加layui-this类
            data.elem.classList.add('layui-this');
        });

        // 初始化第一个选项卡的选中状态
        document.querySelector('.layui-tab-title li').classList.add('layui-this');
    });
});