<p align="center"><h1>Cell Blog</h1></p>

## 功能

## 截图

## 安装
下载
```
git clone https://github.com/Lruihao/cell-blog.git
```

进入站点
```
cd cell-blog
```

生成.env
```shell
cp .env.example .env
```

编辑.env环境配置
```shell
APP_URL=http://localhost #使用本地文件系统存储文件时，必须填写正确地址
APP_DEBUG=false #关闭调试
DB_HOST= #数据库地址
DB_PORT=3306 #数据库端口
DB_DATABASE= #数据库名称
DB_USERNAME= #数据库用户
DB_PASSWORD= #数据库密码
```

打开`app\Providers\AppServiceProvider.php`,注释`SystemController:load` 防止后续步骤报错
```
    public function boot()
    {
        Schema::defaultStringLength(191);
        //SystemController::load();
    }
```

安装项目依赖
```shell
composer install
```

生成key
```
php artisan key:generate
```

运行数据迁移和后台数据填充

> `php artisan admin:install`已包含数据迁移命令`php artisan migrate`  
`G:\cell-blog\app\Admin directory already exists !`无需理会，继续执行剩下命令即可。

```
php artisan admin:install

php artisan admin:import media-manager

php artisan db:seed
```

默认下使用了本地文件系统，创建storage目录在public的软链接
```
php artisan storage:link
```

打开`app\Providers\AppServiceProvider.php`,取消注释`SystemController:load`
```
    public function boot()
    {
        Schema::defaultStringLength(191);
        SystemController::load();
    }
```

将项目根目录指向入口public目录