# Juri
一个简单的 PHP 路由框架，已用在九尾狐工作室的 API 站上。

# 目录结构
* **/config**&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;# 配置文件目录  
    * **index.php**&emsp;&emsp;&emsp;# 主配置文件  
* **/model**&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;# 模板文件目录（目录结构见下文）  
    * ...
* **/project**&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;# 项目目录  
* **/require**&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;# 插件程序目录  
    * **index.php**&emsp;&emsp;&emsp;# Juri默认函数库（初始代码不可随便修改和删除！！）  
* **index.php**&emsp;&emsp;&emsp;&emsp;&emsp;# 程序入口（Juri核心程序）  
* **pseudo-static.txt**&emsp;&emsp;# 伪静态配置代码  

# 使用指南
* 设置伪静态（参见根目录下的`pseudo-static.txt`文件内容）。
* 在主配置文件config/index.php中配置好路由规则，如下：
```php
<?php
    class c {
        public static $ROUTER = [ // 路由规则配置
            '(*.)\.jwhgzs\.com' => [ // 格式：域名（正则） => 配置
                '/www', // 第一项为解析根目录（/project项目目录的子目录）
                'default' // 第二项为模板名称（/model模板目录的子目录名，无需加/）
            ],
            '(*.)\.jwh\.su' => [
                '/su'
                // 模板名称可不填，默认为default
            ]
        ];
        public static $CROSS_DOMAIN_CONTROL = true; // 是否开启Juri动态跨域设置（默认允许在上面的$ROUTER中指定的域名跨域）
    }
?>
```
* 模板目录结构：（页面最终渲染 = 公共部分头 + 内容 + 公共部分尾）  
* **/model**  
    * **/modelName**&emsp;&emsp;&emsp;# 名为你的模板名称  
        * **404.php**&emsp;&emsp;&emsp;# 404 页  
        * **head.php**&emsp;&emsp;# 公共部分头  
        * **tail.php**&emsp;&emsp;&emsp;# 公共部分尾  
# 默认路由规则
* 实际访问路径：站点的解析根目录 + 用户访问的 URI
* 访问文件夹不会返回 403 ，而是 404
* PHP 文件可省略后缀
