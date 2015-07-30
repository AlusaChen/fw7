// Initialize app
var myApp = new Framework7({
    template7Pages: true,
    //pushState:true,
    hideToolbarOnPageScroll:true,
    allowDuplicateUrls:true
});

// Export selectors engine
var $$ = Dom7;

// Add view
var mainView = myApp.addView('.view-main', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true
});


/*======================================================
 ************   模板   ************
 ======================================================*/
var summaryTpl = $$('#summary-template').html();
var compSummaryTpl = Template7.compile(summaryTpl);

var dataTpl = $$('#detail-template').html();
var compDataTpl = Template7.compile(dataTpl);

var dataTpl2 = $$('#detail-template2').html();
var compDataTpl2 = Template7.compile(dataTpl2);

var loadingTml = '<p style="text-align:center;"><span class="preloader"></span></p>';

/*======================================================
 ************   首页   ************
 ======================================================*/
// 下拉刷新页面
var freshContent = $$('.pull-to-refresh-content');
// 添加'refresh'监听器
freshContent.on('refresh', function (e) {
    // 模拟1s的加载过程
    setTimeout(function () {
        // 加载完毕需要重置
        get_summary({}, myApp.pullToRefreshDone);
    }, 500);
});

function get_summary(params, callback) {
    $$('#total-box').html(loadingTml);
    $$('#summary-box').html(loadingTml);
    $$.post('datas.php?type=all', params, function(data, status, xhr){
        if(status == 200)
        {
            var ret = JSON.parse(data);
            var _html = compSummaryTpl({
                data : ret.detail
            });
            $$('#summary-box').html(_html);

            var _total_html = compDataTpl({
                data : ret.total
            });
            $$('#total-box').html(_total_html);
        }
        else
        {
            myApp.alert('数据获取失败', '提示');
        }
        if(callback) callback();
    });
}
myApp.onPageInit('index', function(page){
    get_summary();
}).trigger();




/*======================================================
 ************   详细页面   ************
 ======================================================*/

//获取详细数据页面
function get_detail(params)  {
    $$.post('datas.php?type=detail&game=', params, function(data, status, xhr){
        if(status == 200)
        {
            var ret = JSON.parse(data);
            var baseData = compDataTpl({
                data: ret.base
            });
            $$('#tab1').html(baseData);

            var liucunData = compDataTpl({
                data: ret.remain
            });
            $$('#tab2').html(liucunData);
        }
        else
        {
            myApp.alert('数据获取失败', '提示');
        }
    });
}

myApp.onPageInit('detail', function(page){
    myApp.calendar({
        monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
        input: '.calendar-default',
        onChange: function(p, values, displayValues){
            p.changed = true;
        },
        onClose: function(p){
            if(p.changed)
            {
                p.changed = false;
                var params = {
                    datetime : p.value[0]/1000
                };
                get_detail(params);
            }
        }
    });

});




/*======================================================
 ************   详细页面2   ************
 ======================================================*/
function get_detail2(params)  {
    $$.post('datas.php?type=detail2&game=', params, function(data, status, xhr){
        if(status == 200)
        {
            var ret = JSON.parse(data);
            var baseData = compDataTpl2({
                data: ret.base
            });
            $$('#tab1').html(baseData);

            var liucunData = compDataTpl2({
                data: ret.remain
            });
            $$('#tab2').html(liucunData);
        }
        else
        {
            myApp.alert('数据获取失败', '提示');
        }
    });
}
myApp.onPageInit('detail2', function(page){
    console.log('detail2');
    myApp.calendar({
        multiple:true,
        monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
        input: '.calendar-default',
        onChange: function(p, values, displayValues){
            p.changed = true;
        },
        onClose: function(p){
            if(p.changed)
            {
                p.changed = false;

                if(p.value.length > 2 || p.value.length < 1)
                {
                    myApp.alert('请选择一个或者两个日期', '提示');
                    return false;
                }
                var params = {
                    stime : p.value[0]/1000,
                    etime : p.value[1]/1000
                };
                get_detail2(params);
            }
        }
    });

});
