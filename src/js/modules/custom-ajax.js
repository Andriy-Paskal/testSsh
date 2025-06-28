export function customAjax() {
    jQuery(document).ready(function ($) {
        let flagClick = true;
        $('.tutor__post-likes').each(function () {
            let $button = $(this);
            let postId = $button.data('post-id');
            let cookieKey = 'liked_post_' + postId;

            if (document.cookie.indexOf(cookieKey + '=1') !== -1) {
                $button.addClass('liked');
            }

            $button.on('click', function () {
                if (document.cookie.indexOf(cookieKey + '=1') !== -1) {
                    return;
                }
                if(flagClick){
                    $.ajax({
                        url: themeVars.ajaxUrl,
                        method: 'POST',
                        data: {
                            action: 'post_like',
                            post_id: postId
                        },
                        success: function (response) {
                            flagClick = true;
                            if (response.success) {
                                $button.addClass('liked');
                                $button.find('span').text(number_format(response.data.likes));
                                document.cookie = cookieKey + '=1; path=/; max-age=' + (60 * 60 * 24 * 365);
                            } else {
                                $button.removeClass('liked');
                                console.log('Error: ' + response.data);
                            }
                        }
                    });

                }

                flagClick = false;
            });
        });

        function number_format(number, decimals = 0, dec_point = '.', thousands_sep = ',') {
            number = Number(number).toFixed(decimals);
            const parts = number.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
            return parts.join(dec_point);
        }
    })
};