// Initialize app
var myApp = new Framework7({
    template7Pages: true,
    allowDuplicateUrls:true
});

// Export selectors engine
var $$ = Dom7;

// Add view
var mainView = myApp.addView('.view-main', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true
});


// 下拉刷新页面
var freshContent = $$('.pull-to-refresh-content');

// 添加'refresh'监听器
freshContent.on('refresh', function (e) {
    // 模拟2s的加载过程
    setTimeout(function () {
        // 加载完毕需要重置
        myApp.pullToRefreshDone();
    }, 2000);
});





var dataTpl = '{{> "dataTpl"}}';
Template7.registerPartial(
    'dataTpl',
    '<div class="list-block">' +
    '<ul>' +
    '{{#each data}}' +
    '<li class="item-content">' +
    '<div class="item-inner">' +
    '<div class="item-title">{{name}}</div>' +
    '<div class="item-after">{{value}}</div>' +
    '</div>' +
    '</li>' +
    '{{/each}}' +
    '</ul>' +
    '</div>'
);
var compDataTpl = Template7.compile(dataTpl);

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
                $$.post('datas.php', {
                    'datetime' : p.value[0]/1000
                }, function(data, status, xhr){
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
            p.changed = false;
        }
    });

});