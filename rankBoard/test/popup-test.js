window.LoginPopupNoFullHtml = '<div class="login-popup" id="J_LoginPopup" data-stat="click=etao.etao_fc.tb_member">'+
        '<h2>立即登录</h2><span class="close-login-btn J_CloseLoginBtn" title="关闭">关闭</span>'+
        '<ul class="login-type" id="J_LoginType">'+ 
            '<li><a hidefocus="true"  class="current" id="J_TaobaoMember" data-stat="etao.etao_fc.tb_member" href="#J_TaobaoMember">淘宝会员</a></li>'+ 
            '<li><a hidefocus="true" class="current" id="J_AlipayMember" data-stat="etao.etao_fc.zfb_member" href="#J_AlipayMember" style="visibility:hidden;">支付宝会员</a></li>'+ 
        '</ul>'+
        '<script>'+ 
        '(function() {'+
            "var redirect_url = 'http://demo.etao.net/component/demo/loginPopup/';"+
            "var taobaoIframeSrc = 'https://login.taobao.com/member/login.jhtml?style=miniall&css_style=etao&full_redirect=false&default_long_login=1&from=etao&tpl_redirect_url=' + encodeURIComponent('http://login.etao.com/loginmid.html?redirect_url=' + encodeURIComponent(redirect_url));"+
            "var target = 'https://login.taobao.com/member/alipay_sign_dispatcher.jhtml?tg=' + encodeURIComponent('http://login.etao.com/loginmid.html?login_type=alipay&redirect_url=' + encodeURIComponent(redirect_url));"+
            "var alipayIframeSrc = 'https://auth.alipay.com/login/etao.htm?goto=' + encodeURIComponent('https://auth.alipay.com/login/taobao_trust_login.htm?target=' + encodeURIComponent(target));"+
            
            "var iframe = document.createElement('iframe');"+
                "iframe.setAttribute('scrolling', 'no');"+
                "iframe.setAttribute('frameBorder', '0');"+
                "iframe.setAttribute('allowTransparency', 'true');"+
                "iframe.setAttribute('border', '0');"+
                "iframe.style.overflow = 'hidden';"+
                "iframe.width = '342';"+
                "iframe.height = '310';"+
		"iframe.src = taobaoIframeSrc;"+

           "var loginpopup = document.getElementById('J_LoginPopup');"+ 
               "loginpopup.appendChild(iframe);"+

           "var S = KISSY, D = KISSY.DOM, E = S.Event, loginTypes = S.query('#J_LoginType a');"+
               "if (!loginTypes.length) return;"+

            "KISSY.ChangeIframeSrc = function (redirect_url, type) {"+
                "redirect_url = redirect_url;"+
                "var taobaoNode = S.one('#J_TaobaoMember'),"+
                    "alipayNode = S.one('#J_AlipayMember');"+

                "if (type == 'taobao') {"+
                    "iframe.src = taobaoIframeSrc;"+
                    "if (!taobaoNode.hasClass('current')) {"+
                        "taobaoNode.addClass('current');"+
                    "}"+ 
                    "if (alipayNode.hasClass('current')) {"+
                        "alipayNode.removeClass('current');"+
                    "}"+
                "} else {"+
                   "iframe.src = alipayIframeSrc;"+
                    "if (taobaoNode.hasClass('current')) {"+
                        "taobaoNode.removeClass('current');"+
                    "}"+ 
                    "if (!alipayNode.hasClass('current')) {"+
                        "alipayNode.addClass('current');"+
                    "}"+
                "}"+    
            "};"+

           "E.on(loginTypes, 'click', function(e) {"+
               "e.preventDefault();"+
               "S.each(loginTypes, function(logintype) {"+
                   "D.removeClass(logintype, 'current');"+
               "});"+
               "D.addClass(this, 'current');"+

               "if (this.id == 'J_TaobaoMember') {"+
                   "iframe.src = taobaoIframeSrc;"+
               "} else {"+
                   "iframe.src = alipayIframeSrc;"+
               "}"+
           "});"+
        "})();"+
        '</script>'+ 
'</div>';