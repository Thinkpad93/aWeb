#### wordpress 更换站点域名

执行下面的 SQL 语句

```shell
UPDATE wp_options SET option_value=replace(option_value,'http://老域名','http://新域名') WHERE option_name ='home' OR option_name='siteurl';

UPDATE wp_posts SET post_content=replace( post_content,'http://老域名','http://新域名');

UPDATE wp_posts SET guid = replace( guid, 'http://老域名', 'http://新域名');

```
