$('.wp-inner').fullpage({
change: function (e) {
console.log('change', e.next, e.cur);
$('.indicator li').removeClass('cur').eq(e.next).addClass('cur');
    $('.wp-inner .page').eq(e.next).find('div.box').each(function(i){
                        var anim=$(this).attr('data-anim');
                        console.log(anim);
                        $(this).removeClass(anim);
                        setTimeout(function(box){
                            box.addClass(anim);
                        },300,$(this));
                })
},
beforeChange: function (e) {
console.log('beforeChange', e.next, e.cur);
},
afterChange: function (e) {
console.log('afterChange', e.next, e.cur);
}
});