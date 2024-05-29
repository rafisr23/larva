@extends('frontend.layouts.app')

@section('content')
    <!--Page Header Start-->
    <section class="page-header">
        <div class="page-header-bg" style="background-image: {{ 'asset(images/backgrounds/page-header-bg.jpg)' }}">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ asset('user-index') }}">Beranda</a></li>
                    <li>Blog</li>
                </ul>
                <h2>Detail Blog</h2>
            </div>
        </div>
    </section>
    <!--Page Header End-->

    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{ asset('images/blog/blog-details-img-1.jpg') }}" alt="">
                            <div class="blog-details__date-box">
                                <p>26 aug</p>
                            </div>
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                <li><a href="blog-details.html"><i class="far fa-user-circle"></i> By admin</a></li>
                                <li><span>/</span></li>
                                <li><a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                </li>
                            </ul>
                            <h3 class="blog-details__title">How much does a website cost to build</h3>
                            <p class="blog-details__text-1">Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum. There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some injected or  words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrang hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                            <p class="blog-details__text-2">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type simen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                            <p class="blog-details__text-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into  unchanged.</p>
                        </div>
                        <div class="blog-details__bottom">
                            <p class="blog-details__tags">
                                <span>Tags</span>
                                <a href="#">Development</a>
                                <a href="#">Designing</a>
                            </p>
                            <div class="blog-details__social-list">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="blgo-details__pagenation-box">
                            <ul class="list-unstyled blog-details__pagenation">
                                <li>How much A website  <br> cost to build</li>
                                <li>We Design the Latest <br> trendy Designs</li>
                            </ul>
                        </div>
                        <div class="comment-one">
                            <h3 class="comment-one__title">2 Comments</h3>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="{{ asset('images/blog/comment-1-1.jpg') }}" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin Martin</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting unchanged. It was popularised in the sheets containing lorem ipsum is simply free text.</p>
                                    <a href="blog-details.html" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                            <div class="comment-one__single">
                                <div class="comment-one__image">
                                    <img src="{{ asset('images/blog/comment-1-1.jpg') }}" alt="">
                                </div>
                                <div class="comment-one__content">
                                    <h3>Kevin albert</h3>
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting unchanged. It was popularised in the sheets containing lorem ipsum is simply free text.</p>
                                    <a href="blog-details.html" class="thm-btn comment-one__btn">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="comment-form">
                            <h3 class="comment-form__title">Leave a Comment</h3>
                            <form action="" class="comment-one__form contact-form-validated" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Your name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email address" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <textarea name="message" placeholder="Write message"></textarea>
                                        </div>
                                        <button type="submit" class="thm-btn comment-form__btn">Submit a Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <form action="#" class="sidebar__search-form">
                                <input type="search" placeholder="Search here">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Latest Posts</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{ asset('images/blog/lp-1-1.jpg') }}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#" class="sidebar__post-content-meta"><i class="far fa-comments"></i>2 Comments</a>
                                            <a href="blog-details.html">experiences that connect us</a>
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{ asset('images/blog/lp-1-1.jpg') }}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#" class="sidebar__post-content-meta"><i class="far fa-comments"></i>2 Comments</a>
                                            <a href="blog-details.html">business advices for growth</a>
                                        </h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{ asset('images/blog/lp-1-1.jpg') }}" alt="">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#" class="sidebar__post-content-meta"><i class="far fa-comments"></i>2 Comments</a>
                                            <a href="blog-details.html">understanding of our customer</a>
                                        </h3>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Categories</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                <li><a href="blog-details.html">Web Development <span class="icon-arrow-right"></span></a></li>
                                <li><a href="blog-details.html">Social Marketing <span class="icon-arrow-right"></span></a></li>
                                <li><a href="blog-details.html">Technology <span class="icon-arrow-right"></span></a></li>
                                <li><a href="blog-details.html">Business & Finance <span class="icon-arrow-right"></span></a></li>
                                <li><a href="blog-details.html">Graphi Design <span class="icon-arrow-right"></span></a></li>
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__tags">
                            <h3 class="sidebar__title">Tags</h3>
                            <div class="sidebar__tags-list">
                                <a href="#">Development</a>
                                <a href="#">Designing</a>
                                <a href="#">Business</a>
                                <a href="#">Marketing</a>
                                <a href="#">technology</a>
                            </div>
                        </div>
                        <div class="sidebar__single sidebar__comments">
                            <h3 class="sidebar__title">comments</h3>
                            <ul class="sidebar__comments-list list-unstyled">
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A wordpress commenter on <br> launch new mobile app</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>John Doe on Template:</p>
                                        <h5>Comments</h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>A wordpress commenter on <br> launch new mobile app</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="sidebar__comments-icon">
                                        <i class="fas fa-comment"></i>
                                    </div>
                                    <div class="sidebar__comments-text-box">
                                        <p>John Doe on Template:</p>
                                        <h5>Comments</h5>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection