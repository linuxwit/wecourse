###db install
CREATE SCHEMA `wecourse` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;


db:

ALTER TABLE `wecourse`.`mp_account` 
CHANGE COLUMN `subscribecontext` `subscribecontent` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ,
CHANGE COLUMN `nomatchcontext` `nomatchcontent` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL ;


if(strpos($_SERVER["HTTP_USER_AGENT"],"MicroMessenger"))
    echo "Welcome to wechat word";
else
    echo "http/1.1 401 Unauthorized";


    ,
    "repositories": [{
        "type": "composer",
        "url": "http://pkg.phpcomposer.com/repo/packagist/"
    }, {
        "packagist": false
    }

流程：
 1.注册帐号，生成一个URL和一个token,绑定公众号
 绑定公众号：
   1:选择帐号类型，填写名称，还有相应的KEY,提示用户在微信后台绑定帐号
   