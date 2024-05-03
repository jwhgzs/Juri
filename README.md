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
* 设置伪静态（参见根目录下的 `pseudo-static.txt` 文件内容）。
* 在主配置文件 `config/index.php` 中配置好路由规则，如下：
```php
<?php
    class c {
        public static $ROUTER = [ // 路由规则配置
            'jwhgzs.com' => [ // 格式：域名 => 配置
                '/www/$', // 第 0 项为解析目标，Juri 将会在 $ 的位置填上用户提供的路径。以 /project 为根路径
                'default' // 第 1 项为模板名称（ /model 模板名称）
            ],
            '*.jwh.su' => [
                '/shortUrl',
                // 模板名称可不填，不填则默认为 default
                '/path/to/*' => [ // 可嵌套一层来处理子目录。支持通配符 * 。
                    '/sw?full_path=$', // 注意嵌套设置中的解析目标也是以 /project 为根路径
                    'default'
                ]
            ]
        ];
    }
?>
```
* 模板目录结构：（页面最终渲染 = 模板头 + 内容 + 模板尾）  
* **/model**  
    * **/modelName**&emsp;&emsp;&emsp;# 名为你的模板名称  
        * **404.php**&emsp;&emsp;&emsp;# 404 页  
        * **head.php**&emsp;&emsp;# 模板头  
        * **tail.php**&emsp;&emsp;&emsp;# 模板尾  
# 其他
* 访问文件夹不会返回 403 ，而是 404
* PHP 文件可省略后缀
* Juri 对所有表示路径的字符串都进行了一定程度的格式化
