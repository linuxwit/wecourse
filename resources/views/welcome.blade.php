<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no"/>
        <link href='/assets/css/app.min.css' rel='stylesheet' type='text/css'/>
        <link href='/assets/css/welcome.css' rel='stylesheet' type='text/css'/>
    </head>
    <body ng-app="qoa" ng-controller="AppCtrl">
        <div layout="column" layout-fill>
            <md-toolbar>
            <div class="md-toolbar-tools">
                <span>QOA</span>
                <!-- fill up the space between left and right area -->
                <span flex></span>
                <md-button>
                申请加入
                </md-button>
            </div>
            </md-toolbar>
            <md-content >
            <div layout="column">
                <section layout="row" layout="column" layout-align="center center">
                    QOA 让企业更专注商务


                </section>
                <section layout="row" layout="column" layout-align="center center">
                    <form name="userForm" novalidate >
                        <md-input-container>
                        <label>公司</label>
                        <input md-maxlength="30" required name="company" ng-model="user.company">
                        <div ng-messages="userForm.company.$error" multiple>
                            <div ng-message="required">别忘记了公司名称哟.</div>
                            <div ng-message="md-maxlength">公司名称太长了吧.</div>
                        </div>
                        </md-input-container>
                        <div layout layout-sm="column">
                            <md-input-container flex>
                            <label>邮箱</label>
                            <input type="email" name="email" ng-model="user.email" placeholder="请输入常用邮箱" required>
                            <div ng-messages="userForm.email.$error" ng-if="userForm.email.$dirty">
                                <div ng-message="required">这个太重要了，不能不填.</div>
                                <div ng-message="email">这个邮箱电脑他不懂.</div>
                            </div>
                            </md-input-container>
                            <md-input-container flex>
                            <md-button class="md-raised md-warn">提交</md-button>
                            </md-input-container>
                        </div>
                    </form>
                </section>
                <section id="intro">

                </section>
            </div>

             <form name="myForm">
    <input type="text" ng-model="field" name="myField" required minlength="5" />
   <div ng-messages="myForm.myField.$error">
     <div ng-message="required">You did not enter a field</div>
      <div ng-message="minlength">The value entered is too short</div>
   </div>
 </form>
            </md-content>
        </div>
        <script src="/assets/js/vendor.min.js"></script>
        <script src="/assets/js/welcome.js"></script>
    </body>
</html>