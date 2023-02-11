
        <!-- FAQ and Download Section Start -->
        <section class="section pt--70 pb--20">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 pb--60">
                        <!-- Download Block Start -->
                        <div class="download--block" data-scroll-reveal="group">
                            <div class="img">
                                <img src="{{ app()->getLocale() == 'en' ? get_image(__('site.images_.' . \App\Enum\ImageEnum::getWhyChooseUsEn())) : get_image(__('site.images_.' . \App\Enum\ImageEnum::getWhyChooseUsAr()))}}" alt="Download">
                            </div>


                        </div>
                        <!-- Download Block End -->
                    </div>
                    <div class="col-md-5 pb--60">
                        <!-- FAQ Items Start -->
                        <div class="faq--items" id="faqItems" data-scroll-reveal="group">
                            <div class="title pb--20">
                                <h2 class="h2 fw--600">{{__('site.why choose us')}}</h2>
                            </div>

                            <!-- FAQ Item Start -->
                            <div class="faq--item style--1 panel">
                                <div class="title">
                                    <h3 class="h6 fw--700 text-darker">
                                        <a href="#faqItem01" data-parent="#faqItems" data-toggle="collapse"
                                            class="collapsed">
                                            <span>{{__('site.our mission')}}</span>
                                        </a>
                                    </h3>
                                </div>

                                <div id="faqItem01" class="content collapse">
                                    <div class="content--inner">
                                        <p>
                                            {{ app()->getLocale() == 'en' ? get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getOurMission())) : get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getOurMissionAr()))}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="faq--item style--1 panel">
                                <div class="title">
                                    <h3 class="h6 fw--700 text-darker">
                                        <a href="#faqItem02" data-parent="#faqItems" data-toggle="collapse"
                                            class="collapsed">
                                            <span>{{__('site.our vision')}}</span>
                                        </a>
                                    </h3>
                                </div>

                                <div id="faqItem02" class="content collapse">
                                    <div class="content--inner">
                                        <p>
                                            {{ app()->getLocale() == 'en' ? get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getOurVision())) : get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getOurVisionAr()))}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="faq--item style--1 panel">
                                <div class="title">
                                    <h3 class="h6 fw--700 text-darker">
                                        <a href="#faqItem03" data-parent="#faqItems" data-toggle="collapse"
                                            class="collapsed">
                                            <span>{{__('site.our goals')}}</span>
                                        </a>
                                    </h3>
                                </div>

                                <div id="faqItem03" class="content collapse">
                                    <div class="content--inner">
                                        <p>
                                            {{ app()->getLocale() == 'en' ? get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getOurGoals())) : get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getOurGoalsAr()))}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->
                        </div>
                        <!-- FAQ Items End -->
                    </div>


                </div>
            </div>
        </section>
        <!-- FAQ and Download Section End -->
