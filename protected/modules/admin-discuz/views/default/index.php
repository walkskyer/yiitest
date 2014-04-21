<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>管理中心</title>
    <?php $assetsUrl = $this->module->assetsUrl; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link media="all" type="text/css" href="<?php echo $assetsUrl; ?>/css/admincp.css" rel="stylesheet">
    <script src="<?php echo $assetsUrl; ?>/js/common.js" type="text/javascript"></script>
</head>
<body style="margin: 0px" scroll="no">
<table cellpadding="0" cellspacing="0" width="100%" height="100%">
    <tr>
        <td colspan="2" height="90">
            <div class="mainhd">
                <div class="logo">Administrator's Control Panel</div>
                <div class="uinfo">
                    <p>username</p>
                    <p class="btnlink">
                        <?php echo l('网站首页', '/', array('target' => "_blank")); ?>
                    </p>
                </div>
                <div class="navbg"></div>
                <div class="nav">
                    <ul id="topmenu">
                        <li><em><a href="javascript:;" id="header_index" hidefocus="true"
                                   onClick="toggleMenu('index', '<?php echo url('admin/default/info') ?>');">网站管理</a></em>
                        </li>
                        <li>
                            <em>
                                <a href="javascript:;" id="header_field1" hidefocus="true"
                                   onClick="toggleMenu('field1', '<?php echo url('admin/field1/admin') ?>');">field1管理</a>
                            </em>
                        </li>
                        <li>
                            <em>
                                <a href="javascript:;" id="header_field2" hidefocus="true"
                                   onClick="toggleMenu('field2', '<?php echo url('admin/field2/admin') ?>');">field2</a>
                            </em>
                        </li>
                        <li>
                            <em>
                                <a href="javascript:;" id="header_field3" hidefocus="true"
                                   onClick="toggleMenu('field3', '<?php echo url('/admin/field3/admin') ?>');">field3管理</a>
                            </em>
                        </li>
                        <li>
                            <em>
                                <a href="javascript:;" id="header_field4" hidefocus="true"
                                   onClick="toggleMenu('field4', '<?php echo url('/admin/field4/admin') ?>');">field4管理</a>
                            </em>
                        </li>
                        <li>
                            <em>
                                <a href="javascript:;" id="header_user" hidefocus="true"
                                   onClick="toggleMenu('user', '<?php echo url('/admin/user') ?>');">用户</a>
                            </em>
                        </li>
                    </ul>
                    <div class="currentloca">
                        <p id="admincpnav"></p>
                        <span id="msg"></span>
                    </div>
                    <div class="navbd"></div>
                    <div class="sitemapbtn">

                        <span id="add2custom"></span>
                        <a href="###" id="cpmap" onClick="showMap();return false;">
                            <img src="<?php echo $assetsUrl; ?>/images/btn_map.gif" title="后台导航" width="72"
                                 height="18"/>
                        </a>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td valign="top" width="160" class="menutd">
            <div id="leftmenu" class="menu">
                <?php
                function ul($list, $attributes = '')
                {
                    return _list('ul', $list, $attributes);
                }

                function _list($type = 'ul', $list, $attributes = '', $depth = 0)
                {
                    // If an array wasn't submitted there's nothing to do...
                    if (!is_array($list)) {
                        return $list;
                    }
                    // Set the indentation based on the depth
                    $out = str_repeat(' ', $depth);
                    // Cycle through the list elements.  If an array is
                    // encountered we will recursively call _list()

                    static $_last_list_item = '';
                    foreach ($list as $key => $val) {
                        $_last_list_item = $key;
                        $out .= str_repeat(' ', $depth + 2) . '<li>';
                        if (!is_array($val)) {
                            $out .= $val;
                        } else {
                            $out .= $_last_list_item . "\n" . _list($type, $val, '', $depth + 4) . str_repeat(' ', $depth + 2);
                        }
                        $out .= "</li>\n";
                    }
                    // Set the indentation for the closing tag and apply it
                    return CHtml::tag($type, $attributes, $out);
                }

                $attributes_anchor = array('hidefocus' => "true", 'target' => "main");
                echo ul(array(
                    l('网站设置', url('admin/setting'), $attributes_anchor),
                    l('广告管理', url('admin/ad/index'), $attributes_anchor),
                    l('链接(菜单)', url('admin/link/index/link'), $attributes_anchor),
                ), array('id' => 'menu_index', 'style' => 'display: none'));

                echo ul(array(
                    l('field1管理', url('admin/field1/admin'), $attributes_anchor),
                    l('新建field1', url('admin/field1/create'), $attributes_anchor),
                ), array('id' => 'menu_field1', 'style' => 'display: none'));

                echo ul(array(
                    l('发布field2', url('admin/field2/create'), $attributes_anchor),
                    l('field2管理', url('admin/field2/admin'), $attributes_anchor),
                    l('field2分类', url('admin/articleCategory/admin'), $attributes_anchor),
                ), array('id' => 'menu_field2', 'style' => 'display: none'));

                echo ul(array(
                    l('添加field3', url('admin/field3/create'), $attributes_anchor),
                    l('field3管理', url('admin/field3/admin'), $attributes_anchor),
                    l('field3分类', url('admin/field3Category/admin'), $attributes_anchor),
                ), array('id' => 'menu_field3', 'style' => 'display: none'));

                echo ul(array(
                    l('添加field4', url('admin/field4/create'), $attributes_anchor),
                    l('field4管理', url('admin/field4/admin'), $attributes_anchor),
                    l('field4管理', url('admin/consult/admin'), $attributes_anchor),
                ), array('id' => 'menu_field4', 'style' => 'display: none'));

                echo ul(array(
                ), array('id' => 'menu_user', 'style' => 'display: none'));
                ?>
            </div>
        </td>
        <td valign="top" width="100%" class="mask" id="mainframes">
            <iframe src="<?php echo url('admin/default/info') ?>" id="main" name="main" onload="mainFrame(0)"
                    width="100%" height="100%" frameborder="0" scrolling="yes"
                    style="overflow: visible;display:"></iframe>
        </td>
    </tr>
</table>
<div class="custombar" id="custombarpanel">
    &nbsp;
    <span id="custombar"></span>
    <span id="custombar_add"></span>
</div>
<div id="scrolllink" style="display: none">
        <span onClick="menuScroll(1)">
            <img src="<?php echo $assetsUrl; ?>/images/scrollu.gif"/>
        </span>
        <span onClick="menuScroll(2)">
            <img src="<?php echo $assetsUrl; ?>/images/scrolld.gif"/>
        </span>
</div>
<div class="copyright">
    <p>Powered by<a href="#" target="_blank">CMS</a></p>

    <p>&copy; 2011-2013,<a href="#" target="_blank">Author</a></p>
</div>
<div id="cpmap_menu" class="custom" style="display: none; background: #ffffff">
    <div class="cmain" id="cmain"></div>
    <div class="cfixbd"></div>
</div>
<script type="text/JavaScript">
var headers = new Array('index', 'field1', 'field2', 'field3', 'field4', 'user');
var admincpfilename = 'admincp.php';
var menukey = '', custombarcurrent = 0;
function toggleMenu(key, url) {
    /*if(key == 'index' && url == 'home') {
     if(BROWSER.ie) {
     doane(event);
     }
     parent.location.href = admincpfilename + '?frames=yes';
     return false;
     }*/

    menukey = key;
    for (var k in headers) {
        if ($('menu_' + headers[k])) {
            $('menu_' + headers[k]).style.display = headers[k] == key ? '' : 'none';
        }
    }
    var lis = $('topmenu').getElementsByTagName('li');
    for (var i = 0; i < lis.length; i++) {
        if (lis[i].className == 'navon') lis[i].className = '';
    }
    $('header_' + key).parentNode.parentNode.className = 'navon';
    if (url) {
        parent.mainFrame(0);
        //parent.main.location = admincpfilename + '?action=' + url;
        //Page redirect
        //alert(url);
        parent.main.location = url;
        var hrefs = $('menu_' + key).getElementsByTagName('a');
        for (var j = 0; j < hrefs.length; j++) {
            hrefs[j].className = hrefs[j].href.substr(hrefs[j].href.indexOf(admincpfilename + '?action=') + 19) == url ? 'tabon' : (hrefs[j].className == 'tabon' ? '' : hrefs[j].className);
        }
    }
    setMenuScroll();
    return false;
}
function setMenuScroll() {
    var obj = $('menu_' + menukey);
    var scrollh = document.body.offsetHeight - 160;
    obj.style.overflow = 'visible';
    obj.style.height = '';
    $('scrolllink').style.display = 'none';
    if (obj.offsetHeight + 150 > document.body.offsetHeight && scrollh > 0) {
        obj.style.overflow = 'hidden';
        obj.style.height = scrollh + 'px';
        $('scrolllink').style.display = '';
    }
    custombar_resize();
}
function menuScroll(op, e) {
    var obj = $('menu_' + menukey);
    var scrollh = document.body.offsetHeight - 160;
    if (op == 1) {
        obj.scrollTop = obj.scrollTop - scrollh;
    } else if (op == 2) {
        obj.scrollTop = obj.scrollTop + scrollh;
    } else if (op == 3) {
        if (!e) e = window.event;
        if (e.wheelDelta <= 0 || e.detail > 0) {
            obj.scrollTop = obj.scrollTop + 20;
        } else {
            obj.scrollTop = obj.scrollTop - 20;
        }
    }
}
function initCpMenus(menuContainerid) {
    var key = '';
    var hrefs = $(menuContainerid).getElementsByTagName('a');
    for (var i = 0; i < hrefs.length; i++) {
        if (menuContainerid == 'leftmenu' && !key && 'action=home'.indexOf(hrefs[i].href.substr(hrefs[i].href.indexOf(admincpfilename + '?action=') + 12)) != -1) {
            key = hrefs[i].parentNode.parentNode.id.substr(5);
            hrefs[i].className = 'tabon';
        }
        if (!hrefs[i].getAttribute('ajaxtarget')) hrefs[i].onclick = function () {

            if (menuContainerid != 'custommenu') {
                var lis = $(menuContainerid).getElementsByTagName('a');
                for (var k = 0; k < lis.length; k++) {

                    if (lis[k].className != 'menulink') lis[k].className = '';
                }
                if (this.className == '') this.className = menuContainerid == 'leftmenu' ? 'tabon' : 'bold';
            }
            if (menuContainerid != 'leftmenu') {
                var hk, currentkey;
                var leftmenus = $('leftmenu').getElementsByTagName('a');
                for (var j = 0; j < leftmenus.length; j++) {
                    hk = leftmenus[j].parentNode.parentNode.id.substr(5);
                    if (this.href.indexOf(leftmenus[j].href) != -1) {
                        leftmenus[j].className = 'tabon';
                        if (hk != 'index') currentkey = hk;
                    } else {
                        leftmenus[j].className = '';
                    }
                }
                if (currentkey) toggleMenu(currentkey);
                hideMenu();
            }
        }
    }
    return key;
}
var header_key = initCpMenus('leftmenu');
toggleMenu(header_key ? header_key : 'index');
function initCpMap() {
    var ul, hrefs, s;
    s = '<ul class="cnote"><li><img src="<?php echo $assetsUrl;?>/images/btn_map.gif" /></li><li>按 “ ESC ” 键展开 / 关闭此菜单</li></ul><table class="cmlist" id="mapmenu"><tr>';

    for (var k in headers) {
        if (headers[k] != 'index' && headers[k] != 'uc') {
            s += '<td valign="top"><ul class="cmblock"><li><h4>' + $('header_' + headers[k]).innerHTML + '</h4></li>';
            ul = $('menu_' + headers[k]);
            hrefs = ul.getElementsByTagName('a');
            for (var i = 0; i < hrefs.length; i++) {
                s += '<li><a href="' + hrefs[i].href + '" target="' + hrefs[i].target + '" k="' + headers[k] + '">' + hrefs[i].innerHTML + '</a></li>';
            }
            s += '</ul></td>';
        }
    }
    s += '</tr></table>';
    return s;
}
$('cmain').innerHTML = initCpMap();
initCpMenus('mapmenu');
var cmcache = false;
function showMap() {
    showMenu({'ctrlid': 'cpmap', 'evt': 'click', 'duration': 3, 'pos': '00'});
    if (!cmcache) ajaxget(admincpfilename + '?action=misc&operation=custommenu&' + Math.random(), 'custommenu', '');
}
function resetEscAndF5(e) {
    e = e ? e : window.event;
    actualCode = e.keyCode ? e.keyCode : e.charCode;
    if (actualCode == 27) {
        if ($('cpmap_menu').style.display == 'none') {
            showMap();
        } else {
            hideMenu();
        }
    }
    if (actualCode == 116 && parent.main) {
        if (custombarcurrent) {
            parent.$('main_' + custombarcurrent).contentWindow.location.reload();
        } else {
            parent.main.location.reload();
        }
        if (document.all) {
            e.keyCode = 0;
            e.returnValue = false;
        } else {
            e.cancelBubble = true;
            e.preventDefault();
        }
    }
}
function uc_left_menu(uc_menu_data) {
    var leftmenu = $('menu_uc');
    leftmenu.innerHTML = '';
    var html_str = '';
    for (var i = 0; i < uc_menu_data.length; i += 2) {
        html_str += '<li><a href="' + uc_menu_data[(i + 1)] + '" hidefocus="true" onclick="uc_left_switch(this)" target="main">' + uc_menu_data[i] + '</a></li>';
    }
    leftmenu.innerHTML = html_str;
    toggleMenu('uc', '');
    $('admincpnav').innerHTML = 'UCenter';
}
var uc_left_last = null;
function uc_left_switch(obj) {
    if (uc_left_last) {
        uc_left_last.className = '';
    }
    obj.className = 'tabon';
    uc_left_last = obj;
}


function mainFrame(id, src) {
    var setFrame = !id ? 'main' : 'main_' + id, obj = $('mainframes').getElementsByTagName('IFRAME'), exists = 0, src = !src ? '' : src;
    for (i = 0; i < obj.length; i++) {
        if (obj[i].name == setFrame) {
            exists = 1;
        }
        obj[i].style.display = 'none';
    }
    if (!exists) {
        if (BROWSER.ie) {
            frame = document.createElement('<iframe name="' + setFrame + '" id="' + setFrame + '"></iframe>');
        } else {
            frame = document.createElement('iframe');
            frame.name = setFrame;
            frame.id = setFrame;
        }
        frame.width = '100%';
        frame.height = '100%';
        frame.frameBorder = 0;
        frame.scrolling = 'yes';
        frame.style.overflow = 'visible';
        frame.style.display = 'none';
        if (src) {
            frame.src = src;
        }
        $('mainframes').appendChild(frame);
    }
    if (id) {
        custombar_set(id);
    }
    $(setFrame).style.display = '';
    if (!src && custombarcurrent) {
        $('custombar_' + custombarcurrent).className = '';
        custombarcurrent = 0;
    }
}

function custombar_update(deleteid) {
    var extra = !deleteid ? '' : '&deleteid=' + deleteid;
    if (deleteid && $('main_' + deleteid)) {
        $('mainframes').removeChild($('main_' + deleteid));
        if (deleteid == custombarcurrent) {
            mainFrame(0);
        }
    }
    ajaxget(admincpfilename + '?action=misc&operation=custombar' + extra, 'custombar', '', '', '', function () {
        custombar_resize();
    });
}
function custombar_resize() {
    custombarfixw = document.body.offsetWidth - 180;
    $('custombarpanel').style.width = custombarfixw + 'px';
}
function custombar_scroll(op, e) {
    var obj = $('custombarpanel');
    var step = 40;
    if (op == 1) {
        obj.scrollLeft = obj.scrollLeft - step;
    } else if (op == 2) {
        obj.scrollLeft = obj.scrollLeft + step;
    } else if (op == 3) {
        if (!e) e = window.event;
        if (e.wheelDelta <= 0 || e.detail > 0) {
            obj.scrollLeft = obj.scrollLeft + step;
        } else {
            obj.scrollLeft = obj.scrollLeft - step;
        }
    }
}
function custombar_set(id) {
    var currentobj = $('custombar_' + custombarcurrent), obj = $('custombar_' + id);
    if (currentobj == obj) {
        obj.className = 'current';
        return;
    }
    if (currentobj) {
        currentobj.className = '';
    }
    obj.className = 'current';
    custombarcurrent = id;
}

custombar_update();
_attachEvent(document.documentElement, 'keydown', resetEscAndF5);
_attachEvent(window, 'resize', setMenuScroll, document);
if (BROWSER.ie) {
    $('leftmenu').onmousewheel = function (e) {
        menuScroll(3, e)
    };
    $('custombarpanel').onmousewheel = function (e) {
        custombar_scroll(3, e)
    };
} else {
    $('leftmenu').addEventListener("DOMMouseScroll", function (e) {
        menuScroll(3, e)
    }, false);
    $('custombarpanel').addEventListener("DOMMouseScroll", function (e) {
        custombar_scroll(3, e)
    }, false);
}
</script>
</body>
</html>