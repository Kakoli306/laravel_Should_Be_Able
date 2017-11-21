@extends('frontEnd.layouts.master')

@section('title')
    Product Details
@endsection


@section('content')
    <div class="container">
        <div class="women_main">
            <!-- start content -->
            <div class="row single">
                <div class="col-md-9">
                    <div class="single_left">
                        <div class="grid images_3_of_2">
                            <ul id="etalage">
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_thumb_image" src="{{ asset($productById->product_image)}}" class="img-responsive" />
                                        <img class="etalage_source_image" src="{{ asset($productById->product_image) }}" class="img-responsive" title="" />
                                    </a>
                                </li>
                                <li>
                                    <img class="etalage_thumb_image" src="{{ asset($productById->product_image) }}" class="img-responsive" />
                                    <img class="etalage_source_image" src="{{ asset($productById->product_image) }}" class="img-responsive" title="" />
                                </li>
                                <li>
                                    <img class="etalage_thumb_image" src="{{ asset($productById->product_image) }}" class="img-responsive"  />
                                    <img class="etalage_source_image" src="{{ asset($productById->product_image) }}"class="img-responsive"  />
                                </li>
                                <li>
                                    <img class="etalage_thumb_image" src="{{ asset($productById->product_image) }}" class="img-responsive"  />
                                    <img class="etalage_source_image" src="{{ asset($productById->product_image) }}"class="img-responsive"  />
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="desc1 span_3_of_2">
                            <h3>{{$productById->product_name}}</h3>
                            <p>BDT. {{ $productById->product_price}} </p>
                            <div class="det_nav">
                                <h4>related styles :</h4>
                                <ul>
                                    <li><a href="#"><img src="{{ asset('public/frontEnd/') }}/images/w6.jpg" class="img-responsive" alt=""/></a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontEnd/') }}/images/w8.jpg" class="img-responsive" alt=""/></a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontEnd/') }}/images/w4.jpg" class="img-responsive" alt=""/></a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontEnd/') }}/images/w9.jpg" class="img-responsive" alt=""/></a></li>
                                </ul>
                            </div>
                            <div class="det_nav1">
                                <h4>Select a size :</h4>
                                <div class=" sky-form col col-4">
                                    <ul>
                                        <li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>L</label></li>
                                        <li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>S</label></li>
                                        <li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>M</label></li>
                                        <li><label class="checkbox"><input type="checkbox" name="checkbox"><i></i>XL</label></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn_form">
                                <form action="{{url('add-to-cart/')}}" method="POST" class="form-inline">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <input type="number" value="1" min="1" name="product_quantity" class="form-control"/>
                                    </div>

                                    <input type=hidden name="product_id" value="{{ $productById->id }}">

                                    <div class="form-group">
                                        <input type="submit" name="btn" class="btn btn-success" value="Add to Cart"/>
                                    </div>
                                </form>

                            </div>
                            <a href="#"><span>login to save in wishlist </span></a>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="single-bottom1">
                        <h6>Details</h6>
                        <p class="prod-desc">{{$productById->product_short_description}}</p>
                        <p class="prod-desc">{{$productById->product_long_description}}</p>
                    </div>
                    <div class="single-bottom2">
                        <h6>Related Products</h6>
                        @foreach($productsByCategoryId as $productByCategoryId)
                            <div class="product">
                                <div class="product-desc">
                                    <div class="product-img">
                                        <img src="{{asset($productByCategoryId->product_image)}}" class="img-responsive " alt=""/>
                                    </div>
                                    <div class="prod1-desc">
                                        <h5><a class="product_link" href="{{url('product-details/'.$productByCategoryId.'/'.$productByCategoryId->product_name)}}"></a></h5>
                                        <p class="product_descr">{{$productByCategoryId->product_short_description}}  </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="product_price">
                                    <span class="price-access">BDT.{{$productByCategoryId->product_price}}</span>
                                    <button class="button1"><span>Add to cart</span></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                        <div class="product">
                            <div class="product-desc">
                                <div class="product-img">
                                    <img src="{{ asset('public/frontEnd/') }}/images/pic2.jpg" class="img-responsive " alt=""/>
                                </div>
                                <div class="prod1-desc">
                                    <h5><a class="product_link" href="#">Excepteur sint</a></h5>
                                    <p class="product_descr"> Vivamus ante lorem, eleifend nec interdum non, ullamcorper et arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="w_sidebar">
                        <div class="w_nav1">
                            <h4>All</h4>
                            <ul>
                                <li><a href="women.html">women</a></li>
                                <li><a href="#">new arrivals</a></li>
                                <li><a href="#">trends</a></li>
                                <li><a href="#">boys</a></li>
                                <li><a href="#">girls</a></li>
                                <li><a href="#">sale</a></li>
                            </ul>
                        </div>
                        <h3>filter by</h3>
                        <section  class="sky-form">
                            <h4>catogories</h4>
                            <div class="row1 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>kurtas</label>
                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>kutis</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>churidar kurta</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>salwar</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>printed sari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion sari</label>
                                </div>
                            </div>
                        </section>
                        <section  class="sky-form">
                            <h4>brand</h4>
                            <div class="row1 scroll-pane">
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>shree</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                                </div>
                                <div class="col col-4">
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>vishud</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>amari</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>shree</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>shree</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Anouk</label>
                                    <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>biba</label>
                                </div>
                            </div>
                        </section>
                        <section class="sky-form">
                            <h4>colour</h4>
                            <ul class="w_nav2">
                                <li><a class="color1" href="#"></a></li>
                                <li><a class="color2" href="#"></a></li>
                                <li><a class="color3" href="#"></a></li>
                                <li><a class="color4" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                                <li><a class="color12" href="#"></a></li>
                                <li><a class="color13" href="#"></a></li>
                                <li><a class="color14" href="#"></a></li>
                                <li><a class="color15" href="#"></a></li>
                                <li><a class="color5" href="#"></a></li>
                                <li><a class="color6" href="#"></a></li>
                                <li><a class="color7" href="#"></a></li>
                                <li><a class="color8" href="#"></a></li>
                                <li><a class="color9" href="#"></a></li>
                                <li><a class="color10" href="#"></a></li>
                            </ul>
                        </section>
                        <section class="sky-form">
                            <h4>discount</h4>
                            <div class="row1 scroll-pane">
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>
                                </div>
                                <div class="col col-4">
                                    <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>
                                    <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- end content -->
        </div>
    </div>

@endsection

