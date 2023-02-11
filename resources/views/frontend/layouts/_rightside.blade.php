<div class="social stac-app">
    <ul class="nav">
        <li><a href="{{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getPlayStore())) }}" title="Download Play Store"><i class="fa fa-android"></i></a></li>
        <li><a href="{{ get_setting(__('site.setting_.' . \App\Enum\SettingEnum::getAppStore())) }}" title="Download App Store"><i class="fa fa-apple"></i></a></li>
    </ul>
</div>
