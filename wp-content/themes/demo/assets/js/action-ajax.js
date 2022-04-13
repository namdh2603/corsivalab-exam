jQuery(document).ready(function ($) {
    $('body').on('click', '.btn-load-more', function () {
        var _this = $(this);
        var _section = _this.parents('.section');
        var _paged = $(this).attr('data-paged');
        var _posts_per_page = $(this).attr('data-posts_per_page');
        var _post_type = $(this).attr('data-post_type');
        var _data_cat = $(this).attr('data-cat');
        var _data_cat_id = $(this).attr('data-cat-id');
        $('.content-wrapper').addClass('loading-ajax');
        $.ajax({
            type: 'POST',
            url: _domainUrl + '/wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
                action: 'load_more_posts',
                _paged: _paged,
                _posts_per_page: _posts_per_page,
                _post_type: _post_type,
                _data_cat: _data_cat,
                _data_cat_id: _data_cat_id
            },
            success: function (res) {
                if (res != 'Nothing to Show') {
                    $('.content-wrapper').removeClass('loading-ajax');
                    console.log(res);
                    _section.find('.row-posts-list').append(res);
                } else {
                    alert(res);
                    $('.content-wrapper').removeClass('loading-ajax');
                }
            }
        });
        $.ajax({
            type: 'POST',
            url: _domainUrl + '/wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
                action: 'update_load_more_button',
                _paged: _paged,
                _posts_per_page: _posts_per_page,
                _post_type: _post_type,
                _data_cat: _data_cat,
                _data_cat_id: _data_cat_id
            },
            success: function (res) {
                if (res != 'Nothing to Show') {
                    $('.content-wrapper').removeClass('loading-ajax');
                    $('.group-btn-load-more').html('').append(res);
                } else {
                    $('.group-btn-load-more').find('.btn-load-more').remove();
                    $('.content-wrapper').removeClass('loading-ajax');
                }
            }
        })
    });
    $('body').on('click', '.show-item-director', function () {
        var _this = $(this);
        var _id = $(this).attr('data-id');
        var _post_type = $(this).attr('data-post_type');
        $('.content-wrapper').addClass('loading-ajax');
        $.ajax({
            type: 'POST',
            url: _domainUrl + '/wp-admin/admin-ajax.php',
            dataType: 'html',
            data: {
                action: 'quick_view_director',
                id: _id,
                post_type: _post_type
            },
            success: function (res) {
                if (res != 'Nothing to Show') {
                    $('.content-wrapper').removeClass('loading-ajax');
                    $('.modal-director .modal-body').html('').html(res);
                    $('.modal-director').modal('show');
                } else {
                    alert(res);
                    $('.content-wrapper').removeClass('loading-ajax');
                }
            }
        })
    });
 
   
    var video_highlights = $('.js-class-highlights.owl-carousel');
    var video_arr = $('.js-class-highlights.videos.owl-carousel .owl-item')
    video_highlights.owlCarousel();

    // Listen to owl events:
    video_highlights.on('translated.owl.carousel', function(event) {
       video_arr.each(function() {          
            //hide all video and stop it.
            $(this).find('video').trigger('pause');
            $(this).find('video').addClass('d-none');
            //hide btn play
            $(this).find('.play-btn').addClass('d-none');

           //check if active show btn play
           if( $(this).hasClass('active') && $(this).find('video').length ) {
                $(this).find('.play-btn').removeClass('d-none');
           } ;
       })
    });
    //play btn action
    video_arr.click( function(){
		//check if is active and has video 
        if( $(this).hasClass('active') && $(this).find('video').length ) {
            if( $(this).find('.play-btn').hasClass('d-none') ) {
                $(this).find('video').addClass('d-none');
                $(this).find('video').trigger('pause');
                $(this).find('.play-btn').removeClass('d-none');
            } else {
                $(this).find('video').removeClass('d-none');
                $(this).find('video').trigger('play');
                $(this).find('.play-btn').addClass('d-none');
            }
        };
    })
    
});