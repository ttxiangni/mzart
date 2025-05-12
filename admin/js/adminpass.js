document.addEventListener('DOMContentLoaded', function() {
        layui.use(['form', 'element', 'layer'], function() {
            var form = layui.form,
                element = layui.element,
                layer = layui.layer;

            // 修改密码函数
            function changePassword() {
                var oldPassword = document.getElementsByName('old_password')[0].value,
                    newPassword = document.getElementsByName('new_password')[0].value,
                    confirmPassword = document.getElementsByName('confirm_password')[0].value;

                // 前端验证
                if (!oldPassword) {
                    layer.msg('旧密码不能为空！', { icon: 2 });
                    return;
                }
                if (!newPassword) {
                    layer.msg('新密码不能为空！', { icon: 2 });
                    return;
                }
                if (newPassword.length < 5) {
                    layer.msg('密码必须至少5位字符', { icon: 2 });
                    return;
                }
                if (newPassword !== confirmPassword) {
                    layer.msg('新密码与确认密码不一致！', { icon: 2 });
                    return;
                }

                // 弹窗确认
                layer.confirm('确定要修改密码吗？', {
                    title: '密码修改确认',
                    icon: 3, // 警告图标
                    btn: ['确定', '取消'] // 按钮
                }, function(index) {
                    // 发送AJAX请求到后端处理脚本
                    fetch('process_change_password.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                        body: new URLSearchParams({
                            old_password: oldPassword,
                            new_password: newPassword
                        })
                    }).then(response => response.json())
                      .then(data => {
                          if (data.success) {
                              layer.msg('密码修改成功！', { icon: 1 }, function() {
                                  location.reload(); // 刷新页面
                              });
                          } else {
                              layer.msg('密码修改失败：' + data.message, { icon: 2 });
                          }
                      })
                      .catch(error => console.error('Error:', error));
                    layer.close(index);
                });
            }

            // 绑定按钮点击事件
            document.getElementById('change-password-btn').addEventListener('click', changePassword);

            // 绑定重置按钮点击事件
            document.getElementById('reset-password-btn').addEventListener('click', function() {
                layer.confirm('确定要重置表单吗？', {
                    title: '表单重置确认',
                    icon: 3, // 警告图标
                    btn: ['确定', '取消'] // 按钮
                }, function(index) {
                    var formElement = document.getElementById('change-password-form');
                    if (formElement) {
                        formElement.reset();
                    }
                    layer.close(index);
                });
            });

            // 初始化表单验证
            form.render();
        });
    });
    
/*<!-- 切换密码可见性 -->*/
function togglePasswordVisibility(inputId, icon) {
        var input = document.getElementById(inputId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('layui-icon-password');
            icon.classList.add('layui-icon-password-hide');
        } else {
            input.type = 'password';
            icon.classList.remove('layui-icon-password-hide');
            icon.classList.add('layui-icon-password');
        }
    }