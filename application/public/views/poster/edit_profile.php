<!DOCTYPE html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"><!--<![endif]-->

<head>
<meta charset='utf-8'>
<meta content="authenticity_token" name="csrf-param" />
<meta content="iuRXUwumyEZKGQm4bz0SXDfdFRvyqJKPy63MB4kkY3k=" name="csrf-token" />
<meta content='namYgiL3asVc9iHG4UAOdt_d8AUWtRuQfJTjVjm6Grk' name='google-site-verification'>
<title>Free Classifieds in Ghana - Tonaton.com</title>
<link href='/favicon.ico' rel='shortcut icon' type='image/x-icon'>
<link href='http://tonaton.com/opensearch?locale=en' rel='search' title='tonaton.com' type='application/opensearchdescription+xml'>
<link href="/assets/desktop/application-244f37c0325015f01ccacb99646a9e24.css" media="screen" rel="stylesheet" type="text/css" />
<link href="/assets/desktop/sites/tonaton/site-477be7e70a607ba31107ea48ce721250.css" media="screen" rel="stylesheet" type="text/css" />

<script>
  var UserTimings = {};

  function TrackTiming(category, variable, opt_label) {
    this.category = category;
    this.variable = variable;
    this.label = opt_label ? opt_label : undefined;
    this.startTime = window.performance ? performance.timing.navigationStart : undefined;
    this.endTime;
    this.sampleRate = 1;
    this.maxTime = 60 * 60; // Set a maximum time of 1 hour to avoid bad data
    return this;
  }

  TrackTiming.prototype.end = function() {
    this.endTime = new Date().getTime();
    return this;
  }

  TrackTiming.prototype.send = function() {
    if (this.startTime) {
      var timeSpent = (this.endTime - this.startTime);
      if (window._gaq && timeSpent > 0 && timeSpent < this.maxTime) {
        _gaq.push(['_trackTiming', this.category, this.variable, timeSpent, this.label, this.sampleRate]);
      }
    }
    return this;
  }
</script>

<script>
  document.documentElement.className += " js";
  document.createElement("time");
  var KvData = {};
</script>

</head>
<body class='users users users-settings'>
<noscript>
<div class='warning-wrapper'>
<div class='warning inner-box-compact wrap'>
<h3>Tonaton.com uses a lot of JavaScript.</h3>
<p>If you can't enable it in your browser, you're probably going to have a better experience on our <a href='http://m.tonaton.com'>mobile version</a>.</p>
</div>
</div>
</noscript>

<div id='site-head'>
<div class='fill'>
<div class='wrap'>
<div class='row'>
<div class='col' id='site-logo'>
<a href="/en">Tonaton.com</a>
</div>
<ul class='col h-stack flat' id='site-nav'>
<li><a href="/en/ads-in-ghana"><span>All Ads</span></a></li>
<li><a href="/en/help"><span>Help & Support</span></a></li>
</ul>
<div class='polar'>
<ul class='h-stack flat col invisible' id='site-nav-aux'>
<li><a href="/en/users/log_in"><span>Log in</span></a></li>
</ul>
<a class='col btn post btn-bold' href='/en/post_ad' id='post-free-ad'>
<span>
<strong>Post Your Ad</strong>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
<div id='user-nav-bg'></div>
<div id='user-nav'>
<div class='wrap'>
<div class='row'>
<ul class='flat h-stack'>
<li>
<a href="/en/account"><i class='ico-user-ads'></i>
My ads
</a></li>
<li class='favorites'>
<a href="/en/favorites"><span>
<i class='ico-star'></i>
Favorites
</span>
</a></li>
<li class='current'>
<a href="/en/settings"><i class='ico-user-settings'></i>
Settings
</a></li>
</ul>
<ul class='polar flat h-stack'>
<li>
<a href="/en/users/log_out"><i class='ico-user-logout'></i>
Log Out
</a></li>
</ul>
</div>
</div>
</div>

<div id='site-content'>

<div class='wrap'>
<div class='inner-box'>
<div class='row'>
<div class='col6' id='details'>
<form accept-charset="UTF-8" action="/en/users/536277d0b7b4bdff540002f2" class="form-box" id="new_user" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="_method" type="hidden" value="put" /><input name="authenticity_token" type="hidden" value="iuRXUwumyEZKGQm4bz0SXDfdFRvyqJKPy63MB4kkY3k=" /></div><div class='inner-box'>
<h2>Change Details</h2>
<div class='field'>
<div class='input'>
<label>
<input checked="checked" class="required" id="user_poster_type_private" name="user[poster_type]" type="radio" value="private" />
<span>Private</span>
</label>
<label>
<input class="required" id="user_poster_type_business" name="user[poster_type]" type="radio" value="business" />
<span>Business</span>
</label>
</div>
</div>
<div class='field'>
<label for="user_name">Name</label>
<div class='input'>
<input id="user_name" name="user[name]" size="30" type="text" value="Jean Lee" />
</div>
</div>
<div class='field'>
<label for="user_phone_no">Phone number</label>
<div class='input'>
<input id="phone_no" name="user[phone_no]" type="tel" />
</div>
</div>
<div class='field'>
<label for="user_location_id">Location</label>
<div class='input'>
<div class='select_tree' id='user-locations'>
<select id='location-level-0'>
<option value=''>Select a location...</option>
<option value=''>--</option>
<option value='3811'>Accra</option>
<option value='3899'>Kumasi</option>
<option value='3948'>Sekondi Takoradi</option>
<option value=''>--</option>
<option value='3586'>Ashanti</option>
<option value='3617'>Greater Accra</option>
<option value='3634'>Eastern</option>
<option value='3661'>Western</option>
<option value='3684'>Northern</option>
<option value='3711'>Brong-Ahafo</option>
<option value='3739'>Volta</option>
<option value='3765'>Central</option>
<option value='3786'>Upper East</option>
<option value='3800'>Upper West</option>
</select>

</div>
<input class="required" id="user_location_id" name="user[location_id]" type="hidden" value="" />
<input id='location-ancestor-ids' type='hidden'>
</div>
</div>
<div class='bottom'>
<button class='btn' type='submit'>
<span>Update Details</span>
</button>
</div>
</div>
</form>

</div>
<div class='col5 polar' id='password'>
<form accept-charset="UTF-8" action="/en/users/password" class="form-box" id="edit-password" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="_method" type="hidden" value="put" /><input name="authenticity_token" type="hidden" value="iuRXUwumyEZKGQm4bz0SXDfdFRvyqJKPy63MB4kkY3k=" /></div><div class='inner-box'>
<h2>Change password</h2>
<div class='field'>
<label for="user_current_password">Current password</label>
<div class='input'>
<input class="required" id="user_current_password" name="user[current_password]" size="30" type="password" />
</div>
</div>
<div class='field'>
<label for="user_new_password">New password</label>
<div class='input'>
<input id="user_password" minlength="5" name="user[password]" size="30" type="password" />
</div>
</div>
<div class='field'>
<label for="user_password_confirmation">Password confirmation</label>
<div class='input'>
<input id="user_password_confirmation" name="user[password_confirmation]" size="30" type="password" />
</div>
</div>
<div class='bottom'>
<button class='btn' type='submit'>
<span>Change password</span>
</button>
</div>
</div>
</form>

</div>
</div>
</div>
</div>


</div>
<div id='site-floor'>
<div class='wrap'>
<div class='row'>
<div class='col5'>
<div class='no-like clearfix' id='facebook'>
<div class='fb-icon'></div>
<div class='link'><a href="http://www.facebook.com/pages/Tonaton/367377380021665" target="_blank">Find us on Facebook</a></div>
</div>

<div class='separator'></div>
<div class='muted'>
Copyright &copy; Saltside Technologies.
</div>

</div>
<div class='col7'>
<div id='floor-nav'>
<div class='quarter'>
<ul>
<lh>
<span class='heading muted'>
How To Sell Fast
</span>
</lh>
<li>
<a href="/en/help/howtosellfast">How to sell fast</a>
</li>
<li>
<a href="/en/advertising">Banner Advertising</a>
</li>
</ul>
</div>
<div class='quarter'>
<ul>
<lh>
<span class='heading muted'>
Company
</span>
</lh>
<li>
<a href="/en/help/about">About us</a>
</li>
<li>
<a href="/en/terms">Terms &amp; conditions</a>
</li>
<li>
<a href="/en/privacy_policy">Privacy policy</a>
</li>
</ul>
</div>
<div class='quarter'>
<ul>
<lh>
<span class='heading muted'>
Help &amp; support
</span>
</lh>
<li>
<a href="/en/help">FAQ</a>
</li>
<li>
<a href="/en/help/staysafe">Stay safe</a>
</li>
<li>
<a href="/en/help/contact">Contact us</a>
</li>
</ul>
</div>
<div class='quarter'>
<ul>
<lh>
<span class='heading muted'>
Social
</span>
</lh>
<li>
<a class='blog-link' href='http://blog.tonaton.com'>
Blog
</a>
</li>
<li>
<a href="http://www.facebook.com/pages/Tonaton/367377380021665" target="_blank">Facebook</a>
</li>
<li>
<a href="https://twitter.com/tonatonghana" target="_blank">Twitter</a>
</li>
<li>
<a href="http://www.youtube.com/user/Tonatonclassifieds" target="_blank">YouTube</a>
</li>
</ul>
</div>
</div>

</div>
</div>
</div>
</div>

<script src="/assets/desktop/libs-ec4e56bd66df1b251b998426da3153e1.js" type="text/javascript"></script>
<script>
  $link = $('ul#site-nav-aux');
  var user = $.cookie('user');
  if (user) {
    $link.find('span').text(user);
    $link.find('a').attr('href', '/account');
  }
  $link.removeClass('invisible');
</script>

<script src="/assets/desktop/i18n/en.tonaton-374e91e3503adc6112adc6425bb2ced9.js" type="text/javascript"></script>



<script>
  var lets_go = function() {
    moment.lang(Config.LOCALE, momentParse(i18n[Config.LOCALE]["moment"]));
    Kv2.init();
  },
  Config = {
    CDN_URL: 'http://res.cloudinary.com/saltside-production/image/private/',
    SERVER_TIME_DIFF: Math.abs(moment().zone()) - (0 / 60),
    SITE_NAME: 'tonaton',
    COUNTRY: 'GH',
    LOCALE: 'en',
    CURRENCY: 'GH₵',
    ZAP_ID: '151711/151732',
    FB_TRACK_ID: 'sx2t9a',
    FB_URL: 'http://www.facebook.com/pages/Tonaton/367377380021665',
    AD_LIST_TEMPLATE: "regular",
    EM_SESSION_ID: '6122a84228db70d95a937dc3c046e106'
  };

  function defer(c, b) {
    var a = document.createElement("script");
    a.type = "text/javascript";
    a.readyState ? a.onreadystatechange = function () {
      if (a.readyState == "loaded" || a.readyState == "complete") a.onreadystatechange = null, b()
    } : a.onload = function () {
      b()
    };
    a.src = c;
    document.getElementsByTagName("head")[0].appendChild(a)
  }
  defer('/assets/desktop/application-2044aec7de0854bfd93a3b8ef9b7e7ca.js', function() {
    lets_go();
    defer('/assets/desktop/track-ff162819382eee150b0546935c4eff2b.js', function() {
      Tr2.init();
    });
  });


var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-37478419-1']);
_gaq.push(['_setDomainName', 'tonaton.com']);
_gaq.push(['_setCustomVar', 5, 'language', 'en', 2]);

_gaq.push(['_trackPageview']);
_gaq.push(['all._setAccount', 'UA-33150711-1']);
_gaq.push(['all._setDomainName', 'tonaton.com']);
_gaq.push(['all._trackPageview']);

for (var key in UserTimings) {
  UserTimings[key].send();
}

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();


</script>



  <script>
  var google_conversion_id = "988366692";
  var google_conversion_label = "-xqHCOTPpwUQ5I6l1wM";
  var google_custom_params = window.google_tag_params;
  var google_remarketing_only = true;
</script>
<script src="http://www.googleadservices.com/pagead/conversion.js" type="text/javascript"></script>
<noscript>
  <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/988366692/?value=0&amp;label=-xqHCOTPpwUQ5I6l1wM&amp;guid=ON&amp;script=0"/>
  </div>
</noscript>



</body>
</html>

