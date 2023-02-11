<div class="social stac-social">
    <ul class="nav">
        <li><a href="{{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getFacebook())) }}"><i class="fa fa-facebook"></i></a></li>
        <li><a href="{{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getTwitter())) }}"><i class="fa fa-twitter"></i></a></li>
        <li><a href="{{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getGoogle())) }}"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="{{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getWebsite())) }}"><i class="fa fa-rss"></i></a></li>
    </ul>
</div>
