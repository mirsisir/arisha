@extends('layouts.web.web_base')
@section('content')
    <style>
        h3 {
            background-color: green;
            color: white;
            padding: 5px;
            padding-left: 15px;
            border-radius: 2%;
        }

        .green {
            color: green;
        }

    </style>
    <div class="card ">
        <div class="card-body">
            <section class="padding ptb-xs-40 pt-0">
                <div class="container ">
                    <div class="row">
                        <!-- Post Bar -->
                        <div class="col-lg-9 blog-post-hr post-section mt-0">
                            <div class="blog-post mb-30 ">
                                <div class="post-header">
                                    <h2>{{__('Handwerker Services')}}</h2>
                                </div>
                                <div class="post-media"><img src="{{asset('assets/images/construction.jpg')}}" alt="">
                                    <h4 class="mt-3 text-justify">{{__('Wir bieten Ihnen umfassende Handwerkerdienstleistungen mit höchster Qualität. Wenn Sie bequeme Hilfe bei Ihrer Renovierung benötigen, sind wir genau die Richtigen für Sie! Wir freuen uns, Sie unterstützen zu können!')}}</h4>

                                    <div class="post-entry">
                                        <h3>{{__('Unsere Dienstleistungen auf einen Blick')}}</h3>

                                        <p class="lead">{{__('Malerarbeiten')}}</p>
                                        <p class="lead">{{__('Wir übernehmen Innen- und Außenmalerarbeiten ganz nach Ihren Wünschen und mit hoher Qualität.')}}</p>

                                        <ul class="lead-point mt-15">
                                            <li><i class="ion-android-done"></i>{{__('Langjährige Erfahrung')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Höchste Qualität')}}</li>
                                            <li>
                                                <i class="ion-android-done"></i>{{__('Individuelle und flexible Auftragsgestaltung')}}
                                            </li>
                                            <li><i class="ion-android-done"></i>{{__('Zuverlässigkeit')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Kostengünstigkeit')}}</li>
                                        </ul>
                                    </div>

                                    <div class="post-entry">
                                        <h3>{{__('Boden- und Fliesenlegen:')}}</h3>

                                        <p class="lead">{{__('Wir verlegen Böden und Fliesen aller Art, wie zum Beispiel Parkett oder Laminat. Gerne verrichten wir auch besondere Aufgaben wie Küchenwände kacheln.')}}</p>
                                        <ul class="lead-point mt-15">
                                            <li><i class="ion-android-done"></i>{{__('Langjährige Erfahrung')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Höchste Qualität')}}</li>
                                            <li>
                                                <i class="ion-android-done"></i>{{__('Individuelle und flexible Auftragsgestaltung')}}
                                            </li>
                                            <li><i class="ion-android-done"></i>{{__('Zuverlässigkeit')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Kostengünstigkeit')}}</li>
                                        </ul>
                                    </div>

                                    <div class="post-entry">
                                        <h3>{{__('Sonstige Renovierungs- und Ausbauarbeiten:')}}</h3>

                                        <p class="lead">{{__('Wir helfen Ihnen bei allen Renovierungs- und Ausbauarbeiten für Ihr Zuhause – sei es Abrissarbeiten oder Tapezieren.')}}</p>

                                        <ul class="lead-point mt-15">
                                            <li><i class="ion-android-done"></i>{{__('Langjährige Erfahrung')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Höchste Qualität')}}</li>
                                            <li>
                                                <i class="ion-android-done"></i>{{__('IIndividuelle und flexible Auftragsgestaltung')}}
                                            </li>
                                            <li><i class="ion-android-done"></i>{{__('Zuverlässigkeit')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Kostengünstigkeit')}}</li>
                                        </ul>
                                    </div>

                                </div>


                            </div>
                            <!-- End Post Bar -->
                            <!-- Sidebar -->
                            <!-- End Sidebar -->
                        </div>
                        <div class="col-lg-3">
                            <div class="sidebar-widget">
                                <div class="widget-search pt-15">
                                </div>
                            </div>
                            <div class="sidebar-widget">
                                <h4>Categories</h4>

                                <ul class="categories">
                                    <li><a href="{{route('craftsman_services',app()->getLocale())}}">{{__('Handwerker Services')}}</a></li>
                                    <li><a href="{{route('home_cleaning',app()->getLocale())}}">{{__('Haupt Reinigung')}}</a></li>
                                    <li><a href="{{route('office_cleaning',app()->getLocale())}}">{{__('Büro Reinigung')}}</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                    <hr>
                    <h3>{{__('These skills set us apart')}}</h3>
                    <br>

                    <p class="lead green">{{__('Arisha Service l Craftsman Services in Berlin - your painter, tiler & craftsman for sanitation & drywall construction in Berlin')}}</p>
                    <p class="text-justify">{{__('As craftsmen in Berlin, we offer you a range of services that we carry out in excellent quality. We are your tiler, your experts for plumbing and drywall construction in Berlin. The Arisha Service team is your reliable partner when it comes to renovations. We support you with the installation of partition walls or with the installation of wall cladding, lay tiles in the bathroom, kitchen and vestibule and carry out work in the sanitary area in Berlin for you.
Call us for craftsman services in Berlin - as your painter or tiler, we will come to you without obligation and advise you personally on all your concerns.')}}</p>

                    <p class="lead green">{{__('Craftsman services in Berlin - extensive range of drywall construction in Berlin')}}</p>
                    <p class="text-justify">{{__('Whether demolishing dry stone walls or putting up new partition walls - we are there for your concerns. A lot can be achieved with drywall in modern housing. As your partner for drywall construction in Berlin, we put up partition walls and take care of their sound and heat insulation. We lower ceilings and make wall coverings. Take advantage of our specialist knowledge and get personal advice on drywall construction. Precise work of high quality and with high-quality materials is a matter of course for us.')}}</p>

                    <p class="lead green">{{__('Our offer as a painter in Berlin')}}</p>
                    <p class="text-justify">{{__('We carry out painting work indoors and outdoors reliably and precisely. As a painter in Berlin, you can expect high quality services from us. The Arisha Service team has years of experience and a high level of reliability. We design each order individually according to the wishes of our customer. Upon request, we will carry out all cleaning work for you after the renovation has been completed.')}}</p>

                    <p class="lead green">{{__('Craftsman Services - your reliable tiler in Berlin')}}</p>
                    <p class="text-justify">{{__('Our experienced team of tilers will lay tiles as well as all kinds of floors.
Would you like beautiful parquet or hard-wearing laminate for your apartment? As craftsmen in Berlin, we are quickly at your service. We tile kitchen walls, bathroom walls and floors as well as areas in the anteroom or other living areas. As a tiler in Berlin, you can rely on us for years of experience for high quality. We respond individually and flexibly to your wishes and fulfill your orders reliably and cost-effectively.')}}</p>

                    <p class="lead green">{{__('Experts for plumbing in Berlin')}}</p>
                    <p class="text-justify">{{__('Do you have to do any work in the sanitary area? Would you like to freshen up your bathroom and need reliable plumbing services in Berlin?
Then give us a call. We visit you on site without obligation and get an idea of the situation. We are happy to answer all of your questions. You will receive a clearly understandable and inexpensive offer for our plumbing services in Berlin. We only use high-quality materials for your order and carry out all work precisely. Our experienced team works reliably and inexpensively.')}}</p>

                    <p class="lead green">{{__('Your craftsman in Berlin')}}</p>
                    <p class="text-justify">{{__('As your partner for renovations, we offer you personal advice on various craftsman services in Berlin. Get valuable information and tips for implementation in a non-binding discussion on site. As your craftsman in Berlin, we will visit you in your company or at home to advise you personally. With a lot of experience and specialist knowledge, we respond to your requirements and make suggestions for implementation. You will receive a clearly structured offer for all work.')}}</p>

                    <p class="text-justify">{{__('Call us and let your craftsman and painter in Berlin advise you - we will be happy to take time for your concerns!')}}</p>

                </div>
            </section>


        </div>
    </div>
@endsection
