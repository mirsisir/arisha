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
                                    <h2>{{__('Büro Reinigung')}}</h2>
                                </div>
                                <div class="post-media"><img src="{{asset('assets/images/blog/img2.jpg')}}" alt="">
                                    <h4 class="mt-3 text-justify">{{__('Beginnen Sie Ihren Arbeitstag mit einem sauberen und betriebsbereiten Büroplatz. Gerne kommen wir auch außerhalb Ihrer Bürozeiten, damit Ihre Arbeitsabläufe ungestört bleiben.')}}</h4>

                                    <div class="post-entry">
                                        <h3>{{__('In unserer allgemeinen Grundreinigung sind die folgenden Reinigungsleistungen enthalten:')}}</h3>

                                        <ul class="lead-point mt-15">
                                            <li><i class="ion-android-done"></i>{{__('Oberflächenreinigung (Schränke, Tische, Regale, Küchenflächen)')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Staubsaugen')}}</li>
                                            <li>
                                                <i class="ion-android-done"></i>{{__('Nassreinigung der Böden')}}
                                            </li>
                                            <li><i class="ion-android-done"></i>{{__('Zusätzlich in der Küche: Kühlschrankreinigung von außen, Wechsel der Mülltüten')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Zusätzlich im Bad: Wascharmaturen, WC, Spiegel und Fliesen, Wechsel der Handtücher')}}</li>
                                        </ul>
                                    </div>

                                    <div class="post-entry">

                                        <h3>{{__('Für die Reinigung verwenden wir die von Ihnen zur Verfügung gestellten Utensilien wie z.B. Staubsauger und Reinigungsmittel. Die notwendigen Mittel sind: ')}}</h3>

{{--                                       <p class="lead">{{__('Wir verlegen Böden und Fliesen aller Art, wie zum Beispiel Parkett oder Laminat. Gerne verrichten wir auch besondere Aufgaben wie Küchenwände kacheln.')}}</p>--}}
                                        <ul class="lead-point mt-15">
                                            <li><i class="ion-android-done"></i>{{__('Staubsauger')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Nasswischer')}}</li>
                                            <li>
                                                <i class="ion-android-done"></i>{{__('Entkalkungsspray')}}
                                            </li>
                                            <li><i class="ion-android-done"></i>{{__('Küchenrolle')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Glasreiniger')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Staubwischer')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('WC Reiniger')}}</li>
                                            <li><i class="ion-android-done"></i>{{__('Und Lapen.')}}</li>
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
                                <div class="widget-search pt-5">
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
                    <h3>{{__('Putzhilfe für Gebäudereinigung in Berlin – exakte Sauberkeit mit Arisha Service l Putzkraft für Büroreinigung in Berlin & mehr')}}</h3>
                    <br>


                    <p class="text-justify">{{__('Für die Büroreinigung in Berlin verfügen wir über umfangreiche Erfahrung und ein bestens geschultes Team. Ihre Putzhilfe in Berlin stellt sich auf individuelle Wünsche genau ein und erledigt exakt die Aufgaben, die Sie auslagern möchten.')}}</p>

                    <p class="lead green">{{__('Als Ihre Reinigungskraft in Berlin stören wir Sie nicht bei Besprechungen oder während der Arbeit am Computer:')}}</p>
                    <p class="text-justify">{{__('Arisha Service kommt außerhalb der Bürozeiten und übernimmt sämtliche Reinigungsleistungen in Ihren Räumlichkeiten. Rufen Sie uns an und sichern Sie sich uns als Ihre Reinigungskraft in Berlin.')}}</p>

                    <p class="lead green">{{__('Ein sauberer Büroplatz ist die Grundlage für konzentrierte Arbeit – buchen Sie uns als Putzkraft in Berlin')}}</p>
                    <p class="text-justify">{{__('Wünschen Sie sich professionelle Raumpflege fürs Büro, so stellen wir Ihnen eine Putzkraft in Berlin oder ein ganzes Reinigungsteam zur Verfügung. Bei unseren Leistungen richten wir uns ganz nach Ihren Anforderungen. Selbstverständlich möchten wir Sie nicht während Ihrer Arbeit stören und laufende Aufgaben unterbrechen. Daher bieten wir Ihnen unsere Dienste außerhalb der Bürozeiten an. Wenn Ihr Team wieder am Arbeitsplatz sitzt, ist alles clean, ordentlich und bereit für eine konzentrierte Tätigkeit.
Rufen Sie uns an und vereinbaren Sie eine unverbindliche Erstberatung vor Ort.')}}</p>

                    <p class="lead green">{{__('Craftsman Services - your reliable tiler in Berlin')}}</p>
                    <p class="text-justify">{{__('Our experienced team of tilers will lay tiles as well as all kinds of floors.
Would you like beautiful parquet or hard-wearing laminate for your apartment? As craftsmen in Berlin, we are quickly at your service. We tile kitchen walls, bathroom walls and floors as well as areas in the anteroom or other living areas. As a tiler in Berlin, you can rely on us for years of experience for high quality. We respond individually and flexibly to your wishes and fulfill your orders reliably and cost-effectively.')}}</p>

                    <p class="lead green">{{__('Bestens geschulte Reinigungskraft in Berlin')}}</p>
                    <p class="text-justify">{{__('Das ganze Team von Arisha Service ist für die Gebäudereinigung in Berlin hervorragend geschult. Unsere Mitarbeiterinnen und Mitarbeiter kennen die Wirkung von Reinigungsmitteln verschiedener Art sowie die Bedürfnisse unterschiedlicher Oberflächen und Bodenbeläge. Als Ihre Putzkraft in Berlin verwenden wir diverse Reinigungsgeräte und schwingen den Besen an schwer zugänglichen Stellen. Für jeden Auftrag erfolgt eine individuelle Einschulung. Wir gehen mit Ihnen durch, welche Reinigungsleistungen Sie sich von Ihrer Putzhilfe in Berlin erwarten, und instruieren unser Personal entsprechend.')}}</p>

                    <p class="lead green">{{__('Individuelle Betreuung bei der Gebäudereinigung in Berlin')}}</p>
                    <p class="text-justify">{{__('Bei der Büroreinigung in Berlin ist es uns wichtig, dass Sie mit unseren Leistungen voll und ganz zufrieden sind. Zu unserem Service gehören eine motivierte und bestens ausgebildete Reinigungskraft für Berlin, persönliche Beratung, zuverlässige Verfügbarkeit und präzise Putzleistungen. Bei einem ersten, unverbindlichen Gespräch besuchen wir Sie vor Ort und gehen Ihre Wünsche durch. Wir stellen die richtigen Fragen, sodass sichergestellt ist, dass unsere Leistungen jeden von Ihnen gewünschten Bereich abdecken. Selbstverständlich sind Anpassungen jederzeit möglich.')}}</p>

                    <p class="text-justify">{{__('Sie erhalten danach ein Angebot über für die Gebäudereinigung in Berlin, ob für ein einmaliges Cleaning oder für die laufende Gebäudereinigung: ganz nach Ihren Wünschen. Sie können sich von nun an über eine zuverlässige und engagierte Putzhilfe in Berlin freuen.')}}</p>

                    <p class="lead green">{{__('Unsere Leistungen als Putzhilfe in Berlin')}}</p>
                    <p class="text-justify">{{__('Als Reinigungskraft in Berlin zählt die Oberflächenreinigung, etwa von Schränken, Regalen, Küchenflächen und der Tische, zur Grundreinigung. Wir übernehmen bei der Büroreinigung in Berlin das Staubsaugen sowie die Nassreinigung von Böden. Wünschen Sie spezielle Reinigung für die Küche, so bieten wir die Kühlschrankreinigung und das Wechseln von Mülltüten an. Als Ihre Putzkraft in Berlin säubern wir Armaturen, Spiegel und Fliesen im Bad, wir reinigen das WC und wechseln die Handtücher.')}}</p>
                    <p class="text-justify">{{__('Haben Sie Fragen zu unseren Leistungen? Rufen Sie uns an, wir beraten Sie telefonisch oder besuchen Sie vor Ort!')}}</p>
                </div>
            </section>


        </div>
    </div>
@endsection
