<div class="row">
    <div class="col-12 mb-0 text-center">
        {!! HTML::icon_link(route('social.redirect',['provider' => 'google']), 'fa fa-google', '', array('class' => 'btn btn-social-icon btn-lg rounded-circle mb-1 btn-google')) !!}
        {!! HTML::icon_link(route('social.redirect',['provider' => 'facebook']), 'fa fa-facebook', '', array('class' => 'btn btn-social-icon btn-lg rounded-circle mb-1 btn-facebook')) !!}
        {!! HTML::icon_link(route('social.redirect',['provider' => 'twitter']), 'fa fa-twitter', '', array('class' => 'btn btn-social-icon btn-lg rounded-circle mb-1 btn-twitter')) !!}
    </div>
</div>
