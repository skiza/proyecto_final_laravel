@section('scripts')
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100493248-1', 'auto');
  ga('send', 'pageview');

</script>
@endsection

<footer class="fitandup_footer">

    <div class="fitandup_footer__social">
        <a href="https://www.facebook.com/profile.php?id=100017915927659" title="Facebook" target="_blank">
            <i class="fa fa-facebook" aria-hidden="true" aria-label="Facebook Icon"></i>
        </a>
        <a href="https://twitter.com/Fitandup" title="Twitter" target="_blank">
            <i class="fa fa-twitter" aria-hidden="false" aria-label="Twitter Icon"></i>
        </a>
    </div>

    <p>Tel: <a href="tel:+34123456789" >+34 123 45 67 89</a> | <a href='mailto:Fitandup@gmail.com'>Fitandup@gmail.com</a></p>

    <p>Copyright 2017 &copy; <strong>Fit&Up</strong> | <a href="http://crisnaci-ciprian87.c9users.io/" title="INICIO"><i class="material-icons">home</i></a> | <a href="{{ nt_route('legal-'.user_lang()) }}" title="AVISO LEGAL">{{ trans('web.legal') }}</a> | <a href="{{ route('contact-'.user_lang()) }}">{{ trans('web.contact') }}</a> | {{ trans('web.dev_team') }}</p>
</footer>