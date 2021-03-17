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
                                    <h2>{{__('Umzugsservice')}}</h2>
                                </div>
                                <div class="post-media"><img src="{{asset('assets/images/moving.jpg')}}" alt="">
                                    <h4 class="mt-3 text-justify">{{__('ARISHA SERVICE  ist ein umfassender und professioneller Dienstleister, der Umzugsservice, Möbeltransport  Kurierservice in Berlin anbietet.Günstige Preise mit Top-Qualität. Lösung für private Haushalte und Büro- und Geschäftskunden.')}}</h4>
                                    <h4 class="mt-3 text-justify">{{__('Anfangs ein Start-Up-Unternehmen mit professionellen Dienstleistungen, jetzt ein umfangreicher Betrieb mit erweiterten Angeboten, welche Ihnen das Leben erleichtern und ermöglichen sollen sich auf das Wesentliche zu konzentrieren.  Nach dem erfolgreichen Start unseres bisherigen Angebots mit einzigartiger Qualität und einem sehr guten Feedback unserer Kunden, fügen wir nun den Umzugsservice/Relocation-Service unserer Leistung hinzu.')}}</h4>

                                    <div class="post-entry">
                                        <h3>{{__('In unserer allgemeinen Grundreinigung sind die folgenden Reinigungsleistungen enthalten:')}}</h3>


                                    </div>

                                    <div class="post-entry">

                                        <h3>{{__('Umzug / Moving / Möbeltaxi / Umzugshelfer / Umzug Firma / Zuverlässiger Umzugsservice in Berlin :')}}</h3>

                                        {{--                                       <p class="lead">{{__('Wir verlegen Böden und Fliesen aller Art, wie zum Beispiel Parkett oder Laminat. Gerne verrichten wir auch besondere Aufgaben wie Küchenwände kacheln.')}}</p>--}}
                                        <h4 class="mt-3 text-justify">{{__('Haben Sie einen neuen Wohnort und Sorgen, wie Sie Ihr gesamtes Hab und Gut von A nach B bringen sollen?')}}</h4>
                                        <h4 class="mt-3 text-justify">{{__('Kein Problem, das ARISHA VERVICE Team ist für Sie da und erledigt alles in einer strukturierten Arbeitsweise. Vom alten Wohnort - in Ihr neues Heim / Büro . Unser professionelles Service-Team kümmert sich um wirklich alles.')}}</h4>
                                        <h4 class="mt-3 text-justify">{{__('Seit unserer Gründung sind wir zu einer Anlaufstelle gewachsen, die sich für alle Ihre Wünsche in den Bereichen der häuslichen Pflege, der Büro pflege und die Verbesserung Ihrer Bedürfnisse einsetzt.Unterstützt werden wir dabei von einem Team, welches aus gut ausgebildeten und qualifizierten Fachleuten besteht und mit welchem wir einen hochwertigen Umzug Service in und außerhalb Berlins anbieten.')}}</h4>

                                    </div>


                                    <div class="post-entry">

                                        <h3>{{__('Büroumzug / Relocation / Mobeltransport / Kurier Transport in Berlin :')}}</h3>
                                        <h4 class="mt-3 text-justify">{{__('Sie möchten neue Möbel kaufen oder Räumlichkeiten gebracht werden und sind selber nicht in der Lage, diese selbst zu transportieren oder haben keine Möglichkeit dazu?')}}</h4>
                                        <h4 class="mt-3 text-justify">{{__('Unser Team ist auch dieser Aufgabe gewachsen und sorgt dafür, dass Ihre Waren sicher vom Standort  bis zu Ihnen nach Büro / Hause kommen?')}}</h4>

                                    </div>
                                    <div class="post-entry">

                                        <h3>{{__('Sperrmüll entsorgen / Bulky waste / Recycling in Berlin :')}}</h3>
                                        <h4 class="mt-3 text-justify">{{__('Was wird überhaupt als Sperrmüll bezeichnet? Sperrmüll sind Abfälle aus privaten Haushalten, die aufgrund ihrer Sperrigkeit nicht mit dem Hausmüll eingesammelt werden können. Zum Sperrmüll gehören zum Beispiel Fernsehgeräte, Schränke, Betten, Kommoden, Sofas, Liegen, Klimageräte, Kühl-/Gefriergeräte, Spülmaschinen, Tische, Stühle, elektrische Heizkörper, Regalteile, Matratzen. Auch Teppiche, Kinderwagen, Rasenmäher und Fahrräder ETC sind dem Sperrmüll zuzuordnen')}}</h4>
                                        <h4 class="mt-3 text-justify">{{__('Sperrmüll entsorgen schafft Freiraum in Ihrem Haus und Hof und Platz für neue Sachen. Sperrmüll wird jedoch nicht einfach an die Straße gestellt. Es wird auf Bestellung abgeholt oder im Sammelcontainer entsorgt. Zu einem mit Ihnen vereinbarten Termin holen wir Ihren Sperrmüll ab. Stellen Sie Ihren eigenen Sperrmüll nicht zu fremden Sperrmüll-Sammlungen, sondern fordern Sie immer eine eigene Sperrmüllsammlung an. Wiederverwertbare Abfälle aus Sperrmüll wie Papier, Holz, Metalle, etc. werden aussortiert und erneut dem Wertstoffkreislauf zugeführt. Nicht verwertbare Abfallreste werden direkt in Energie umgewandelt.')}}</h4>

                                    </div>
                                    <div class="post-entry">

                                        <h3>{{__('Haushaltsauflösungen / Wohnungsauflösungen /Keller Entsorgen :')}}</h3>
                                        <h4 class="mt-3 text-justify">{{__('Haushaltsauflösungen und Wohnungsauflösungen sind wir Ihnen auch behilflich. Wir übernehmen die gesamte Logistik und Sie sparen Zeit und Geld. Unser Service beinhaltet auch die Demontage großer und sperriger Möbel.')}}</h4>
                                        <h4 class="mt-3 text-justify">{{__('Wir holen alles ab, was Sie loswerden wollen und machen es für Sie komfortabel und so stressfrei wie möglich.Wir entsorgen für Sie auch Sondermüll, wie Batterien, Farbreste, Mineralöle, Energiesparlampen, Medikamente und Chemikalien. Die Stoffe gefährden die Umwelt und müssen gesondert gesammelt und entsorgt werden. Chemikalien bzw. chemische Abfälle werden ordnungsgemäß verpackt und den entsprechenden Endbeseitigungsanlagen zugeführt.')}}</h4>
                                        <h4 class="mt-3 text-justify">{{__('Eine komplette Haushaltsauflösung, eine Messie-Wohnung; Entrümpelung eines Kellers, diskrete Entsorgung vom bestimmten Müll und zusätzlich danach noch eine Grundreinigung – wir erledigen alles und arbeiten dabei schnell, zuverlässig und diskret')}}</h4>
                                        <h3 class="mt-3 text-justify">{{__('Wir sind auch für Sie da, Zögern Sie nicht, uns zu kontaktieren, sofern Sie Fragen zu einem Pauschalpreis oder Ferntransport für Ihren Umzug haben oder senden Sie uns eine E-Mail! Wir melden uns umgehend bei Ihnen mit einem unschlagbaren Angebot.')}}</h3>

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
            </section>
                    </div>
                </div>





@endsection
