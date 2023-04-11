
    $(document).ready(function () {
        
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $("#send-btn").click(function() {
            var value = $("#sender").val();
            var msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ value +'</p></div></div>';
            $(".form").append(msg);
            $("#sender").val('');
            $.ajax({
              url:'/chat-process',
              data:{sender:value},
              type:'POST',
              success:function(data) {
                console.log(data);
                $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ data +'</p></div></div>';
                $(".form").append($replay);
                    // scroll bar akan otomatis kebawah mengikuti chat
                $(".form").scrollTop($(".form")[0].scrollHeight);
              }
            });
            
          });


        // $("#send-btn").on("click", function(){
        //     var value = $("#sender").val();
        //     var msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ value +'</p></div></div>';
        //     $(".form").append(msg);
        //     $("#sender").val('');
            
        //     // start ajax code
        //     $.ajax({
        //         type: 'POST',
        //         url: '/chat-procces',
        //         data: {sender:value},
        //         success: function(response){
        //             console.log(response);

        //             // $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
        //             // $(".form").append($replay);
        //             // // scroll bar akan otomatis kebawah mengikuti chat
        //             // $(".form").scrollTop($(".form")[0].scrollHeight);
        //         }
        //     });
        // });
        loadcart();
        loadwishlist();
        function loadcart(){
            $.ajax({
                method: "GET",
                url: "/load-cart-count",
                success: function (response) {
                    $('.cart-count').html('')
                    $('.cart-count').html(response.count)
                }
            });
    
        }
        function loadwishlist(){
            $.ajax({
                method: "GET",
                url: "/load-wishlist-count",
                success: function (response) {
                    $('.wishlist-count').html('')
                    $('.wishlist-count').html(response.count)
                }
            });
    
        }
        
        

        //$('.increment-btn').click(function (e) { 
        $(document).on('click','.increment-btn', function (e) {
            e.preventDefault();
            
            var incr = $(this).closest('.menu_data').find('.qty-input').val();
            var value = parseInt(incr, 10);
            value = isNaN(value) ? 0 : value;
            if (value => 0) {
                value++;
                $(this).closest('.menu_data').find('.qty-input').val(value);
            }
        });

        //$('.decrement-btn').click(function (e) { 
        $(document).on('click','.decrement-btn', function (e) {
            e.preventDefault();
            
            var decr = $(this).closest('.menu_data').find('.qty-input').val();
            var value = parseInt(decr, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.menu_data').find('.qty-input').val(value);
            }
        });

        $('.addcart').click(function (e) { 
            e.preventDefault();
            var menu_id = $(this).closest('.menu_data').find('.menu_id').val();
            var menu_qty = $(this).closest('.menu_data').find('.qty-input').val();

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'menu_id' : menu_id,
                    'menu_qty' : menu_qty,
                },
                success: function (response) {
                    loadcart()
                    swal(response.status)
                }
            });
        });

        $('.addwish').click(function (e) { 
            e.preventDefault();

            var menu_id = $(this).closest('.menu_data').find('.menu_id').val();

            $.ajax({
                method: "POST",
                url: "/add-to-wishlist",
                data: {
                    'menu_id' : menu_id,
                },
                success: function (response) {
                    loadwishlist()
                    swal(response.status)
                }
            });
        });

        //$('.delete-cart').click(function (e) { 
        $(document).on('click','.delete-cart', function (e) {
            
            e.preventDefault();
            var menu_id = $(this).closest('.menu_data').find('.menu_id').val();
            
            $.ajax({
                method: "POST",
                url: "delete-cart-item",
                data: {
                    'menu_id' : menu_id
                },
                success: function (response) {
                    //window.location.reload();
                    loadcart()
                    $('.cartitem').load(location.href + ' .cartitem')
                    swal("", response.status , "Success")
                }
            });
        });
        //$('.delete-wishlist').click(function (e) { 
        $(document).on('click','.delete-wishlist', function (e) {
            e.preventDefault();

       
            var menu_id = $(this).closest('.menu_data').find('.menu_id').val();
            
            $.ajax({
                method: "POST",
                url: "delete-wishlist-item",
                data: {
                    'menu_id' : menu_id
                },
                success: function (response) {
                   // window.location.reload();
                    
                    loadwishlist()
                    $('.wishitem').load(location.href + ' .wishitem')
                    swal("", response.status , "Success")
                }
            });
        });
        //$('.change-btn').click(function (e) { 
        $(document).on('click','.change-btn', function (e) {
            e.preventDefault();

            var menu_id = $(this).closest('.menu_data').find('.menu_id').val();
            var qty = $(this).closest('.menu_data').find('.qty-input').val();
            data = {
                'menu_id' : menu_id,
                'menu_qty' : qty,
            }
            $.ajax({
                method: "POST",
                url: "update-cart",
                data: data,
                success: function (response) {
                    
                    $('.cartitem').load(location.href + ' .cartitem');
                    //window.location.reload();
                }
            });
        });
        
    });
    (function() {
        'use strict';
    
        var tinyslider = function() {
            var el = document.querySelectorAll('.testimonial-slider');
    
            if (el.length > 0) {
                var slider = tns({
                    container: '.testimonial-slider',
                    items: 1,
                    axis: "horizontal",
                    controlsContainer: "#testimonial-nav",
                    swipeAngle: false,
                    speed: 700,
                    nav: true,
                    controls: true,
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 3500,
                    autoplayButtonOutput: false
                });
            }
        };
        tinyslider();
    
        
    
    
        var sitePlusMinus = function() {
    
            var value,
                quantity = document.getElementsByClassName('quantity-container');
    
            function createBindings(quantityContainer) {
              var quantityAmount = quantityContainer.getElementsByClassName('quantity-amount')[0];
              var increase = quantityContainer.getElementsByClassName('increase')[0];
              var decrease = quantityContainer.getElementsByClassName('decrease')[0];
              increase.addEventListener('click', function (e) { increaseValue(e, quantityAmount); });
              decrease.addEventListener('click', function (e) { decreaseValue(e, quantityAmount); });
            }
    
            function init() {
                for (var i = 0; i < quantity.length; i++ ) {
                            createBindings(quantity[i]);
                }
            };
    
            function increaseValue(event, quantityAmount) {
                value = parseInt(quantityAmount.value, 10);
    
                console.log(quantityAmount, quantityAmount.value);
    
                value = isNaN(value) ? 0 : value;
                value++;
                quantityAmount.value = value;
            }
    
            function decreaseValue(event, quantityAmount) {
                value = parseInt(quantityAmount.value, 10);
    
                value = isNaN(value) ? 0 : value;
                if (value > 0) value--;
    
                quantityAmount.value = value;
            }
            
            init();
            
        };
        sitePlusMinus();
    
    
    })()
    