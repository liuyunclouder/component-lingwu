/**
 * ��¼������
 */
KISSY.add('component/loginPopup', function() {
    var S = KISSY, D = S.DOM, E = S.Event;
    var LoginPopup = function() {
        var config = {
                redirect_url: window.location.href,
                triggers: '.J_CheckLogin',
                loginType: 'taobao',
                isRedirectToA: true, //��¼���Ƿ�ֱ����ת��a���ӵ�href����
                mask: true,
                isCheckLongOrTrueLogin: false //��¼���жϱ�׼�Ƿ���Ϊ����¼Ҳ����Ҫ���������㣨���� ����¼ �� ������¼�� Ĭ�ϵ�¼��ָ������¼ ����������¼
            }, 

            init = function(cfg) {
                config = S.merge(config, cfg);                     
                E.delegate(document, 'click', config.triggers, clickHandler);
            },

            //��֤�Ƿ�������¼
            checkTrueLogin = function() {
                var login = S.Cookie.get('login') == 'true',
                    aNick = S.Cookie.get('a_nk'), // ֧�����û��ǳƣ�Session ����Ч
                    nick = S.Cookie.get('_nk_'); // �û��ǳƣ�Session ����Ч
                    return login && nick || login && aNick;
            },

            //��֤�Ƿ��¼����������¼��
            checkLongOrTrueLogin = function () {
                var trackNick = S.Cookie.get('tracknick');//��һ�ε�¼���û���
                    ck1 = S.Cookie.get('ck1'); // ����¼��־ 
                    return checkTrueLogin() || trackNick && ck1;
            },

            //������֤ ���󸡳���
            clickHandler = function(e) {
                if (checkTrueLogin()) return; 
                if (config.isCheckLongOrTrueLogin && checkLongOrTrueLogin()) return; 
                e.preventDefault();
                var redirect = (config.isRedirectToA) ? e.currentTarget.href : config.redirect_url;
                var full_redirect, secs = S.all('.sel');
                for(var i=0; i<secs.length; i++) {
                	if(!!secs[i].checked) {
                		full_redirect = (secs[i].value === 'true');
                		break;
                	}
                }
                showLoginPopup({redirect_url: redirect, full_redirect: full_redirect});
            },

            //showLoginPopup��ʾ������
            /*cfg = {
             *    redirect_url: window.location.href, //��¼��ɺ���ת�ĵ�ַ
             *    loginType: '', //Ĭ���״�չ���ĸ�tab  ��ѡֵΪ taobao alipay Ĭ��Ϊalipay   
	         *    mask: true
             * }
             */
            showLoginPopup = function (cfg) {
                config = S.merge(config, cfg);                     
				if (window.loginFormPopup) {
                    //�����¼�������Ѿ���ʼ��һ�� �����ٴγ�ʼ�� ֻ��ı�iframe��src��ֵ
                    KISSY.ChangeIframeSrc(config.redirect_url, config.loginType);
                    window.loginFormPopup.show();
					S.Stat.pv("#J_LoginPopup"); 
                    window.loginFormPopup.center();
                } else {
                    var host = (window.location.href.indexOf('i.daily.etao.net') === -1) ? 'i.etao.com' : 'i.daily.etao.net',
						scriptUrl = 'http://' + host + '/templates/loginpopup.php?logintype=' + config.loginType + '&redirect_url=' + encodeURIComponent(config.redirect_url);
						// scriptUrl = 'http://localhost/myetao/template/login/loginpopup.php?logintype=' + config.loginType + '&redirect_url=' + encodeURIComponent(config.redirect_url);

                    KISSY.use("overlay", function (S, Overlay) {
                        S.getScript(scriptUrl, function () {
                            var loginFormPopup = new Overlay({
                                width:342,
                                height: 378,//iframe����ʵĸ߶���400
                                mask: config.mask,
                                zIndex: 10001
                            });
                            loginFormPopup.render();
                            if(!config.full_redirect) {
                            	loginFormPopup.get("contentEl").html(window.LoginPopupNoFullHtml, true);
                            } else {
                            	loginFormPopup.get("contentEl").html(window.LoginPopupHtml, true);
                            }
                            loginFormPopup.center();
                            loginFormPopup.show();
                            window.loginFormPopup = loginFormPopup;
                            var closeLoginBtn = S.all('.J_CloseLoginBtn');
                            if (!closeLoginBtn.length) return;
                            closeLoginBtn.on('click', function() {
                                loginFormPopup.hide();
                            });
                            S.Stat.init("#J_LoginPopup");
                        });
                    });
                }
            };
        return {
            init: init,
            showLoginPopup: showLoginPopup,
            checkTrueLogin: checkTrueLogin,
            checkLongOrTrueLogin: checkLongOrTrueLogin
        };
    };
    KISSY.LoginPopup = LoginPopup;
});
