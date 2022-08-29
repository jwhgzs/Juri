# Juri
一个简单的PHP的路由框架，已用在九尾狐工作室官网（第8版）上。

# 目录结构
|—— /config // 配置文件目录  
&emsp;&emsp;|—— index.php // 主配置文件  
|—— /model // 模板文件目录  
&emsp;&emsp;|—— ...（模板目录结构见下文）  
|—— /project // 项目目录  
|—— /require // 插件程序目录  
&emsp;&emsp;|—— index.php // Juri默认函数库（不可随便修改、删除！！）  
|—— index.php // 程序入口（Juri核心程序）  

# 使用指南
* 设置伪静态。
```ini
location ~ {
  try_files 一个不可能存在的文件 index.php?__url=$uri&$args;
}
```
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
* 模板目录结构（两公共部分之前即为各页面内容）  
|—— /model  
&emsp;&emsp;|—— /你的模板名称  
&emsp;&emsp;&emsp;&emsp;|—— 404.php // 404页  
&emsp;&emsp;&emsp;&emsp;|—— head.php // 公共部分头  
&emsp;&emsp;&emsp;&emsp;|—— tail.php // 公共部分尾  
# 默认路由规则
* 实际访问路径：站点的解析根目录+用户访问的uri
* 访问文件夹不会返回403，而是404
* php文件可省略后缀
