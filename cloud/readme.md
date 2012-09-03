
# Cloud

��������������ṩ������ʾ���ء�dom�ṹ�Զ��塢��λ��select�ڵ������ԡ�

---


## ģ������

 - seajs
 - jquery
 - position


## ����˵��

* `element` {element} 

    ҳ��dom�ڵ㣬ֻ����

* `template` {string}

    ����������ģ�壬��'&lt;div class="myoverlay">&lt;/div>'��ֻ����

* `zIndex` {string|number}

    �����z-index���ԡ�

* `width` {string|number}

    ������(px)��

* `height` {string|number}

    ����߶�(px)��

* `id` {string}

    ����ĳ�ʼ�� id ��

* `className` {string}

    ����ĳ�ʼ�� className ��

* `style` {object}

    ����ĳ�ʼ�� style ����

* `parentNode` {element}

    ����ĸ�Ԫ�أ�Ĭ��Ϊdocument.body��ֻ����

* `align` {object}

    ��λ��������������롣���Ķ�λԭ��ɲ���arale.position�����pin������


        {
            selfXY: [0, 0],     
            baseElement: Position.VIEWPORT,     
            baseXY: [0, 0]      
        }




## ����˵��

* `render()` 

    ���ɸ����dom�ṹ����ʽ�������ĵ�����

* `show()` 

    ��ʾ���㣬��һ�ε���ʱ�����render()������

* `hide()` 

    ���ظ��㡣

* `get(key)` 

    �������ֵ��

* `set(key, value)` 

    ��ֻ�����Զ�����ͨ��set�����޸ģ��������̷�ӳ�������ϡ�


## ���ʵ��

1. ֱ��ʹ�ã�

        var overlay = new Overlay({
            template: '<div class="overlay"></div>',
            width: 500,
            height: 200,
            zIndex: 99,
            style: 'border:1px solid red;color:green;',
            parentNode: '#c',
            align: {
                selfXY: ['-100%', 0],
                baseElement: '#a',
                baseXY: [0, 0]
            }
        });
        overlay.show();
        overlay.set('style', {
            backgroundColor: 'red',
            border: '1px solid green'
        });
        overlay.set('width', 500);
        overlay.set('className', 'myclass');

2. �̳�ʹ�ã�

        var Overlay = require('overlay');
        var Dialog = Overlay.extend({
            attrs: {
                trigger: null,
                triggerType: 'click',
                comfirmElement: null,
                cancelElement: null,
                closeElement: null,
                hasMask: false,
                onComfirm: function() {},
                onClose: function() {}
            },
            setup: function() {
                
            },
            parseElement: function() {
                
            },
            delegateEvents: function() {
                
            }
        });

3. Mask �����ʹ�ã�

        var mask = require('mask');
        mask.show();
        //mask.hide();

    �ı�Ĭ�����ã�

        mask.set({ backgroundColor:'red', opacity:0.5 }).show();


## ��������

��ӭ����
[GitHub Issue](https://github.com/alipay/arale/issues/new)
���ύ������
