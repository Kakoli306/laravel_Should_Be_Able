<div class="header_bg">
    <div class="container">
        <div class="header">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('public/frontEnd/images/logo.png') }}" alt=""/> </a>
            </div>
            <!-- start header_right -->
            <div class="header_right">
                <div class="create_btn">
                    <a class="arrow"  href="registration.html">create account <img src="{{ asset('public/frontEnd/images/right_arrow.png') }}" alt=""/>  </a>
                </div>
                <ul class="icon1 sub-icon1 profile_img">
                    <li><a class="active-icon c2" href="{{url('/show-cart')}}" title="show-Cart"> </a>
                        <ul class="sub-icon1 list">
                            <li><h3>shopping cart empty</h3><a href=""></a></li>
                            <li><p>if items in your wishlit are missing, <a href="">login to your account</a> to view them</p></li>
                        </ul>
                    </li>
                </ul>
                <ul class="icon1 sub-icon1 profile_img">
                    <li><a class="active-icon c1" href="#"> </a>
                        <ul class="sub-icon1 list">
                            <li><h3>wishlist empty</h3><a href=""></a></li>
                            <li><p>if items in your wishlit are missing, <a href="">login to your account</a> to view them</p></li>
                        </ul>
                    </li>
                </ul>
                <div class="search">
                    <form>
                        <input type="text" value="" placeholder="search...">
                        <input type="submit" value="">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!-- start header menu -->
            <ul class="megamenu skyblue">
                <li><a class="color1" href="{{url('/')}}">Home</a></li>
               @foreach($allPublishedCategories as $allPublishedCategory)
                <li><a class="color1" href="{{url('category-view/'.$allPublishedCategory->id)}}">{{$allPublishedCategory->category_name }}</a></li>
                @endforeach

                <li><a class="color10" href="contact.html">Contact</a>
                    <div class="megapanel">
                        <div class="row">
                            <div class="col3">
                                <div class="h_nav">
                                    <h4>contact us</h4>
                                </div>
                                 <form class="contact">
                                    <label for="name">Name</label>
                                    <input id="name" type="text"/>
                                    <label for="email">E-mail</label>
                                    <input id="email" type="text"/>
                                    <label for="message">Message</label>
                                    <textarea rows="8" id="message"></textarea>
                                    <input type="submit" value="Send"/>
                                </form>
                            </div>
                            <div class="col3">
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
