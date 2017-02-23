$(function() {

    function formatUrl(url) {
        var murl = url.split('/');
        return murl[murl.length -1].split('.')[0].replace(/#/,"");
    };

    //获取页面的地址
    var url = window.location.href;
    url = formatUrl(url);

    //当前二级菜单变色
    $(".treeview-menu").find('a').each(function() {
        if (formatUrl($(this).attr('href')).split('.')[0]==url) {
            $(this).addClass("active");
            $(this).parents(".treeview-menu").show();
            
            //改变箭头颜色
            var $arrow = $(this).parents(".treeview-menu").prev().find("i");
            $arrow.css("color","#1caf9a");
            $arrow.removeClass("fa-caret-right").addClass("fa-caret-down")
        }
    })

    //一级菜单点击事件
    $(".treeview-item").click(function(e) {

        //实现上卷下拉效果
        if ($(this).next().is(":visible")) {
            //实现上卷效果
            $(this).next().slideUp("fast");
            //改变箭头方向
            $(this).children("i").removeClass("fa-caret-down").addClass("fa fa-caret-right");
        } else {
            //实现下拉效果
            $(".treeview-menu").slideUp("fast");
            $(".treeview-item").children("i").removeClass("fa-caret-down").addClass("fa-caret-right");
            $(this).next().slideDown("fast");
            $(this).children("i").removeClass("fa-caret-right").addClass("fa-caret-down");
        }
    })

    //侧边栏hover效果
    $(".treeview-menu").find('a').hover(
        function(e) {
            $(this).addClass('hover');
        },
        function(e) {
            $(this).removeClass('hover');
        }
    );
})
