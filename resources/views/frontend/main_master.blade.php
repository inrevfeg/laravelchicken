<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biolife - Organic Food</title>
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/slick.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/assets/css/main-color.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="biolife-body">
    
    <!-- Preloader -->
    <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>

<!-- ============================================== HEADER ============================================== -->

@include('frontend.body.header')

<!-- ============================================== HEADER : END ============================================== -->
@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')


      <!-- Modal -->
      {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" id="closeModel" aria-label="Close">
                <span aria-hidden="true"></span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                  <div class="tab-content quickview-big-img">
                    <div id="pro-1" class="tab-pane fade show active">
                      <img src="" id="pimage" alt="">
                    </div>
      
                  </div>
                  <div class="quickview-wrap mt-15">
                    <div class="quickview-slide-active nav nav-style-6">
                      <a class="active" data-bs-toggle="tab" href="#pro-1">
                        <img src="" alt="" id="">
                      </a>
          
                    </div>
                  </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                  <div class="product-details-content quickview-content">
             
                    <h3><strong id="productname"></strong></h3>
            
                    <p id="pshort"></p>
                    <div class="pro-details-price">
                      <span class="new-price">₹ <span id="pprice"></span></span>
                      <span class="old-price">₹ <span id="oldprice"></span></span>
                    </div>
               
                    <input type="hidden" id="qty" name="qty" min="1" value="">
                    <div class="pro-details-quality">
                      <span>Available Quantity: <strong id="avaibquaty"></strong></span>
                    </div>
                    <div class="product-details-meta">
                      <ul>
                        <li>
                          <span>Categories:</span>
                          <a><span id="pcategory"></span></a>
                        </li>
                        <li>
                          <span>Tag: </span>
                          <a><span id="ptags"></span></a>
                        </li>
                      </ul>
                    </div>
                    <div class="pro-details-action-wrap">
                      <div class="pro-details-add-to-cart">
                        <input type="hidden" id="product_id">
                       
                        <button type="submit" class="btn btn-flat btn-dark" title="Add to Cart" onclick="addToCart()" >Add To Cart</button>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      <!-- Modal end -->

<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- All JS is here
Quickview Popup-->
 <div id="biolife-quickview-block" class="biolife-quickview-block">
    <div class="quickview-container">
        <a href="#" class="btn-close-quickview" data-object="open-quickview-block"><span class="biolife-icon icon-close-menu"></span></a>
        <div class="biolife-quickview-inner">
            <div class="media">
                <ul class="biolife-carousel quickview-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".quickview-nav"}'>
                    <li><img src="{{asset('frontend/assets/images/details-product/detail_01.jpg')}}" alt="" width="500" height="500"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/detail_02.jpg')}}" alt="" width="500" height="500"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/detail_03.jpg')}}" alt="" width="500" height="500"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/detail_04.jpg')}}" alt="" width="500" height="500"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/detail_05.jpg')}}" alt="" width="500" height="500"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/detail_06.jpg')}}" alt="" width="500" height="500"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/detail_07.jpg')}}" alt="" width="500" height="500"></li>
                </ul>
                <ul class="biolife-carousel quickview-nav" data-slick='{"arrows":true,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":3,"slidesToScroll":1,"asNavFor":".quickview-for"}'>
                    <li><img src="{{asset('frontend/assets/images/details-product/thumb_01.jpg')}}" alt="" width="88" height="88"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/thumb_02.jpg')}}" alt="" width="88" height="88"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/thumb_03.jpg')}}" alt="" width="88" height="88"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/thumb_04.jpg')}}" alt="" width="88" height="88"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/thumb_05.jpg')}}" alt="" width="88" height="88"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/thumb_06.jpg')}}" alt="" width="88" height="88"></li>
                    <li><img src="{{asset('frontend/assets/images/details-product/thumb_07.jpg')}}" alt="" width="88" height="88"></li>
                </ul>
            </div>
            <div class="product-attribute">
                <h4 class="title"><a href="#" class="pr-name">National Fresh Fruit</a></h4>
                <div class="rating">
                    <p class="star-rating"><span class="width-80percent"></span></p>
                </div>

                <div class="price price-contain">
                    <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                    <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                </div>
                <p class="excerpt">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel maximus lacus. Duis ut mauris eget justo dictum tempus sed vel tellus.</p>
                <div class="from-cart">
                    <div class="qty-input">
                        <input type="text" name="qty12554" value="1" data-max_value="20" data-min_value="1" data-step="1">
                        <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                        <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    </div>
                    <div class="buttons">
                        <a href="#" class="btn add-to-cart-btn btn-bold">add to cart</a>
                    </div>
                </div>

                <div class="product-meta">
                    <div class="product-atts">
                        <div class="product-atts-item">
                            <b class="meta-title">Categories:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">Milk & Cream</a></li>
                                <li><a href="#" class="meta-link">Fresh Meat</a></li>
                                <li><a href="#" class="meta-link">Fresh Fruit</a></li>
                            </ul>
                        </div>
                        <div class="product-atts-item">
                            <b class="meta-title">Tags:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">food theme</a></li>
                                <li><a href="#" class="meta-link">organic food</a></li>
                                <li><a href="#" class="meta-link">organic theme</a></li>
                            </ul>
                        </div>
                        <div class="product-atts-item">
                            <b class="meta-title">Brand:</b>
                            <ul class="meta-list">
                                <li><a href="#" class="meta-link">Fresh Fruit</a></li>
                            </ul>
                        </div>
                    </div>
                    <span class="sku">SKU: N/A</span>
                    <div class="biolife-social inline add-title">
                        <span class="fr-title">Share:</span>
                        <ul class="socials">
                            <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scroll Top Button -->
<a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>
<script src="{{asset('frontend/assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/biolife.framework.js')}}"></script>
<script src="{{asset('frontend/assets/js/functions.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script>
   @if(Session::has('message'))
   var type = "{{ Session::get('alert-type','info') }}"
   switch(type){
      case 'info':
      toastr.info(" {{ Session::get('message') }} ");
      break;
      case 'success':
      toastr.success(" {{ Session::get('message') }} ");
      break;
      case 'warning':
      toastr.warning(" {{ Session::get('message') }} ");
      break;
      case 'error':
      toastr.error(" {{ Session::get('message') }} ");
      break; 
   }
   @endif 
  </script>
  
  <!--  //////////////// =========== End Js ================= ////  -->


    <script type="text/javascript">
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

  
        // function productView(id){
        //     // alert(id)
        //     $.ajax({
        //         type: 'GET',
        //         url: '/product/view/modal/'+id,
        //         dataType:'json',
        //         success:function(data){
        //             console.log(data)
        //             $('#productname').text(data.product.product_name);
        //             $('#pshort').text(data.product.short_description);
        //             $('#avaibquaty').text(data.product.current_stock);
        //             $('#pimage').attr('src','/'+data.product.product_image);
        //             // $('#pimages').attr('src','/'+data.product.product_image);
        //             $('#pcategory').text(data.product.category.category_name);
        //             $('#ptags').text(data.product.tags);
        //             $('#product_id').val(id);
        //             $('#qty').val(1);


        //             // Product Price 
        //             if (data.product.product_discount == 0.00) {
        //                 $('#pprice').text('');
        //                 $('#oldprice').text('');
        //                 $('#pprice').text(data.product.product_price);


        //             }else{
        //                 $('#pprice').text(data.product.product_discount);
        //                 $('#oldprice').text(data.product.product_price);

        //             } // end prodcut price 
        //         }
        //     })
        
        // }
        // function addToBuyNow(id){
        //     // alert(id)
        //     $.ajax({
        //         type: 'GET',
        //         url: '/product/buynow/'+id,
        //         dataType:'json',
        //         success:function(data){
        //         }
        //     })
        
        // }

        // function addToCart(){
        // var product_name = $('#productname').text();
        // var id = $('#product_id').val();
        // // var color = $('#color option:selected').text();
        // // var size = $('#size option:selected').text();
        // var quantity = $('#qty').val();
        // $.ajax({
        //     type: "POST",
        //     dataType: 'json',
        //     data:{
        //           quantity:quantity, product_name:product_name
        //     },
        //     url: "/cart/data/store/"+id,
        //     success:function(data){
        //         miniCart()
        //         $('#closeModel').click();
        //         // console.log(data)
        //         //  Start Message 
        //          const Toast = Swal.mixin({
        //               toast: true,
        //               position: 'top-end',
        //               icon: 'success',
        //               showConfirmButton: false,
        //               timer: 3000
        //             })
        //         if ($.isEmptyObject(data.error)) {
        //             Toast.fire({
        //                 type: 'success',
        //                 title: data.success
        //             })

        //         }else{
        //             Toast.fire({
        //                 type: 'error',
        //                 title: data.error
        //             })

        //         }

        //             // End Message
                    
        //         }
        //     })
        // }
    function addToCartsimple(id){
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/simplecart/data/store/"+id,
            success:function(data){
                miniCart()
                $('#closeModel').click();
                // console.log(data)
                //  Start Message 
                 const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })

                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })

                }

                // End Message
                
            }
        })
    }
</script>
<script type="text/javascript">
    function miniCart(){
     $.ajax({
         type: 'GET',
         url: '/product/mini/cart',
         dataType:'json',
         success:function(response){
            //  alert(response);

             $('span[id="cartSubTotal"]').text(response.cartTotal);
             $('#cartQty').text(response.cartQty);
            //  $('#cartQty').text(response.carts.rowId);
             var miniCart = ""

             $.each(response.carts, function(key,value){

              miniCart +=  `<li>
                  <div class="minicart-item">
                      <div class="thumb">
                          <a href="#"><img src="/${value.image}" width="90" height="90" alt="National Fresh"></a>
                      </div>
                      <div class="left-info">
                          <div class="product-title"><a href="#" class="product-name">${value.name}</a></div>
                          <div class="price">
                              <ins><span class="price-amount"><span class="currencySymbol">£</span>${value.price}</span></ins>
                          </div>
                          <div class="qty">
                              <label for="cart[id123][qty]">Qty:</label>
                              <span>${value.qty}</span>
                              <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="1" disabled>
                          </div>
                          <div>              
                            <button type="button" class="btn-danger btn-sm" id="${value.id}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </div>
                      </div>
                  </div>
              </li>`    
     });
             
             $('#miniCart').html(miniCart);
         }
     })

  }
    miniCart();
  // mini cart remove Start 
 function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }
 //  end mini cart remove 
</script>
<!--  /// Start Add Wishlist Page  //// -->

 <script type="text/javascript">
    
  function addToWishList(product_id){
      $.ajax({
          type: "POST",
          dataType: 'json',
          url: "/add-to-wishlist/"+product_id,
          success:function(data){
               // Start Message 
              //  alert(data.wishlist_count);
            //  $('span[id="wishlist_count"]').text(data.wishlist_count);
            $('span[id="wishlist_count"]').text(data.wishlistQty);

               const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
          }
      })
  }
  </script> 
  <!--  /// End Add Wishlist Page  ////   -->
    <script type="text/javascript">
     function wishlist(){
        $.ajax({
            type: 'GET',
            url: '/get-wishlist-product',
            dataType:'json',
            success:function(response){
              $('span[id="wishlist_count"]').text(response.wishlistQty);
                var rows = ""
                $.each(response.wishlist, function(key,value){ 
                          rows += `<tr>
                      <td class="product-thumbnail" data-title="Product Name">
                            <a class="prd-thumb" href="#">
                                <figure><img width="113" height="113" src="/${value.product.productImage}" alt="shipping cart"></figure>
                            </a>
                            <a class="prd-name" href="#">${value.product.productName}</a>
                            
                        </td>
                      <td class="product-price-cart"><span class="amount">₹  
                        ${value.product.productDiscount == 0.00
                                      ? `${value.product.productPrice}`
                                      :
                                      `${value.product.productDiscount}` 
             
                                    }</span></td>
                      <td class="product-remove">
                        <button type="button" class="btn add-to-cart-btn btn-danger" id="${value.product.id}" onclick="addToCartsimple(this.id)">add to cart</button>
                        <button type="button" id="${value.id}" class="btn btn-danger" onclick="wishlistRemove(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                      </td>
                     
                  </tr>`

                       });
                
                $('#wishlist').html(rows);
            }
        })
     }
   
 wishlist();
//   Wishlist remove Start 
 function wishlistRemove(id){
         $.ajax({
             type: 'GET',
             url: '/user/wishlist-remove/'+id,
             dataType:'json',
             success:function(data){
             wishlist();
              // Start Message 
                 const Toast = Swal.mixin({
                       toast: true,
                       position: 'top-end',
                       
                       showConfirmButton: false,
                       timer: 3000
                     })
                 if ($.isEmptyObject(data.error)) {
                     Toast.fire({
                         type: 'success',
                         icon: 'success',
                         title: data.success
                     })
                 }else{
                     Toast.fire({
                         type: 'error',
                         icon: 'error',
                         title: data.error
                     })
                 }
                 // End Message 
             }
         });
     }
  // End Wishlist remove   
 </script> 
  <script type="text/javascript">
    function cart(){
      $.ajax({
          type: 'GET',
          url: '/user/get-cart-product',
          dataType:'json',
          success:function(response){
             $('span[id="cartSubTotal"]').text(response.cartTotal);
             var rowss = ""
             
             $('#cartQty').text(response.cartQty);
              var rows = ""
              $.each(response.carts, function(key,value){

                  rows += `<tr class="cart_item">
                                    <td class="product-thumbnail" data-title="Product Name">
                                        <a class="prd-thumb" href="#">
                                            <figure><img width="113" height="113" src="/${value.image}" alt="shipping cart"></figure>
                                        </a>
                                        <a class="prd-name" href="#">${value.name}</a>
                                        
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">₹</span>${value.price}</span></ins>
                                        </div>
                                    </td>
                                  
                                    <td>
                                        ${value.qty > 1
                                        ? `<button type="button" class="btn btn-danger btn-sm" id="${value.id}" onclick="cartDecrement(this.id)" >-</button> `
                                        : `<button type="button" class="btn btn-danger btn-sm" disabled >-</button> `
                                        }
                                        <input type="text" name="qty12554" value="${value.qty}" data-max_value="50" data-min_value="1" style="width:20%;"  disabled>
                                    <button type="button" class="btn btn-success btn-sm" id="${value.id}" onclick="cartIncrement(this.id)" >+</button>                            
                                    </td> 
                                    <td class="product-subtotal" data-title="Total">
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">₹</span>${value.total}</span></ins>
                                        </div>
                                    </td>
                                    <td>
                                    <div class="action">
                                        <button type="button" class="btn-danger btn-sm" id="${value.id}" onclick="cartRemove(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </div>
                                    </td>
                                </tr>`
              });
                          
              $('#cartPage').html(rows);

              rowss += `<div class="subtotal-line">
                                <b class="stt-name">Subtotal <span class="sub">(2ittems)</span></b>
                                <span class="stt-price">₹${response.cartTotal}</span>
                            </div>`
                $('#cartTotal').html(rowss);
            }
        })
    }
cart();
///  Cart  remove Start 
function cartRemove(rowId){
     $.ajax({
         type: 'GET',
         url: '/cart-remove/'+rowId,
         dataType:'json',
         success:function(data){
            cart();
            miniCart();
          // Start Message 
             const Toast = Swal.mixin({
                   toast: true,
                   position: 'top-end',
                   
                   showConfirmButton: false,
                   timer: 3000
                 })
             if ($.isEmptyObject(data.error)) {
                 Toast.fire({
                     type: 'success',
                     icon: 'success',
                     title: data.success
                 })
             }else{
                 Toast.fire({
                     type: 'error',
                     icon: 'error',
                     title: data.error
                 })
             }
             // End Message 
         }
     });
 }
// End Cart  remove 
 // -------- CART INCREMENT --------//
 function cartIncrement(id){
  // alert(rowId)
        $.ajax({
            type:'GET',
            url: "/cart-increment/"+id,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
            }
        });
    }
 // ---------- END CART INCREMENT -----///
  // -------- CART Decrement  --------//
  function cartDecrement(id){
        $.ajax({
            type:'GET',
            url: "/cart-decrement/"+id,
            dataType:'json',
            success:function(data){
                cart();
                miniCart();
            }
        });
    }
 // ---------- END CART Decrement -----///

</script>
</body>
</html>