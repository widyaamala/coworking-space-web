<div class="row">
    <div class="mx-auto col-md-4 mb-1">
        {!! HTML::icon_link(route('social.redirect',['provider' => 'google']), 'fa fa-google', 'Google', array('class' => 'btn btn-block btn-social btn-google')) !!}
    </div>
    <div class="mx-auto col-md-4 mb-1">
        {!! HTML::icon_link(route('social.redirect',['provider' => 'facebook']), 'fa fa-facebook', 'Facebook', array('class' => 'btn btn-block btn-social btn-facebook')) !!}
    </div>
    <div class="mx-auto col-md-4 mb-1">
        {!! HTML::icon_link(route('social.redirect',['provider' => 'twitter']), 'fa fa-twitter', 'Twitter', array('class' => 'btn btn-block btn-social btn-twitter')) !!}
    </div>
</div>
