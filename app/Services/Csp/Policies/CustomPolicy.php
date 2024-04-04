<?php

namespace App\Services\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Policy;

class CustomPolicy extends Policy
{
  public function configure()
  {

    $this
      ->addDirective(Directive::BASE, Keyword::SELF)
      ->addDirective(Directive::CONNECT, [
				Keyword::SELF,
				'https://noembed.com',
				'https://cdn.plyr.io',
				'https://psgc.gitlab.io',
			])
      ->addDirective(Directive::DEFAULT, Keyword::SELF)
      ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
      ->addDirective(Directive::MEDIA, Keyword::SELF)
      ->addDirective(Directive::OBJECT, Keyword::NONE)
      ->addDirective(Directive::FRAME, [
				Keyword::SELF,
				'https://www.google.com',
				'https://www.youtube-nocookie.com',
			])
      ->addDirective(Directive::MANIFEST, Keyword::SELF)
      ->addDirective(Directive::WORKER, Keyword::SELF)
      ->addDirective(Directive::SCRIPT, [
				Keyword::SELF,
				'unsafe-eval',
				'https://cdn.plyr.io',
				'https://www.youtube.com',
			])
      ->addDirective(Directive::STYLE, [
        Keyword::SELF,
        'https://fonts.googleapis.com',
				'https://cdnjs.cloudflare.com',
				'https://cdn.jsdelivr.net',
				'https://cdn.plyr.io',
				'unsafe-inline',
      ])
      ->addDirective(Directive::FONT, [
        Keyword::SELF,
        'https://fonts.googleapis.com',
        'https://fonts.gstatic.com',
        'data:'
      ])
      ->addDirective(Directive::IMG, [
        Keyword::SELF,
				'https://tile.openstreetmap.org',
				'https://i.ytimg.com',
        'data:'
      ])
      ->addNonceForDirective(Directive::SCRIPT);
  }
}