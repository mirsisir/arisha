@extends('layouts.web.web_base')
@section('content')
    <style>
        h3 {
            color: green;
            font-weight: bold;

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
                                    <h2>{{__('Haupt Reinigung')}}</h2>
                                </div>
                                <div class="post-media"><img src="{{asset('assets/images/blog/img2.jpg')}}" alt="">
                                    <h4 class="mt-3 text-justify">{{__('Wir bieten Ihnen umfassende Handwerkerdienstleistungen mit höchster Qualität. Wenn Sie bequeme Hilfe bei Ihrer Renovierung benötigen, sind wir genau die Richtigen für Sie! Wir freuen uns, Sie unterstützen zu können!')}}</h4>

                                    <div class="post-entry">
                                        <h3>{{__('Qualität & Liebe zum Detail')}}</h3>

                                        <p class="lead">{{__('Ihre Zufriedenheit steht für uns an erster Stelle. Daher erledigen unsere geschulten und versicherten Reinigungskräfte ihre Aufgaben stets zuverlässig und mit großer Sorgfalt. Überzeugen Sie sich gerne selbst! ')}}</p>

                                    </div>

                                    <div class="post-entry">
                                        <h3>{{__('Unsere Reinigungsleistungen')}}</h3>

                                        <p class="lead">{{__('Wir bieten Ihnen vielfältige Reinigungsdienstleistungen und gehen gerne auf Ihre individuellen Erwartungen ein. Bei einem ersten Treffen können wir gemeinsam besprechen was Ihnen bei der Reinigung besonders wichtig ist.')}}</p>

                                    </div>


                                    <div class="post-entry">
                                        <h3>{{__('In unserer allgemeinen Grundreinigung sind die folgenden Reinigungsleistungen enthalten:')}}</h3>



                                        <ul class="lead-point mt-15">
                                            <li><i class="ion-android-done"></i>{{__('Oberflächenreinigung (Schränke, Tische, Regale, Küchenflächen)')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Nassreinigung der Böden')}}</li>


                                            <li><i class="ion-android-done"></i>{{__('Zusätzlich in der Küche: Kühlschrankreinigung von außen,')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Wechsel der Mülltüten')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Mülleimer Säubern')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Zusätzlich im Bad: Wascharmaturen, WC, Badewanne, Dusche, Spiegel und Fliesen, Wechsel der Handtücher')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Fenster- und Türenreinigung')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Absaugen von Polstermöbeln und Fußmatten')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Bettwäsche neu beziehen')}}</li>
                                        </ul>
                                    </div>
                                    <div class="post-entry">
                                        <h3>{{__('F.We use the utensils provided by you, such as vacuum cleaners and cleaning agents, for cleaning. The necessary means are:')}}</h3>



                                        <ul class="lead-point mt-15">
                                            <li><i class="ion-android-done"></i>{{__('vacuum cleaner')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Wet mop')}}</li>

                                            <li><i class="ion-android-done"></i>{{__('Descaling spray')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Kitchen roll')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Glass cleaner')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Dust wiper')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('WC cleaner')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Lapen etc.')}}</li>

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
                                    <li><a href="{{route('home_cleaning',app()->getLocale())}}">{{__('Reinigung Services')}}</a></li>
                                    <li><a href="{{route('office_cleaning',app()->getLocale())}}">{{__('Umzug & Transport')}}</a></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                    <hr>

                </div>
            </section>


        </div>
    </div>
@endsection
