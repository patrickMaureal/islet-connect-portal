<?php

namespace App\Services\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Keyword;
use Spatie\Csp\Policies\Policy;

class MainPolicy extends Policy
{
  public function configure()
  {

    $this
      ->addDirective(Directive::BASE, Keyword::SELF)
      ->addDirective(Directive::CONNECT, [
				Keyword::SELF,
			])
      ->addDirective(Directive::DEFAULT, Keyword::SELF)
      ->addDirective(Directive::FORM_ACTION, Keyword::SELF)
      ->addDirective(Directive::MEDIA, Keyword::SELF)
      ->addDirective(Directive::OBJECT, Keyword::NONE)
      ->addDirective(Directive::FRAME, Keyword::SELF)
      ->addDirective(Directive::MANIFEST, Keyword::SELF)
      ->addDirective(Directive::WORKER, Keyword::SELF)
      ->addDirective(Directive::SCRIPT, [
				Keyword::SELF,
			])
      ->addDirective(Directive::STYLE, [
        Keyword::SELF,
        'https://fonts.googleapis.com',
				'https://cdnjs.cloudflare.com',
				'https://cdn.jsdelivr.net',
      ])
      ->addDirective(Directive::FONT, [
        Keyword::SELF,
        'https://fonts.googleapis.com',
        'https://fonts.gstatic.com',
        'data:'
      ])
      ->addDirective(Directive::IMG, [
        Keyword::SELF,
        'data:'
      ])
      ->addNonceForDirective(Directive::STYLE)
      ->addNonceForDirective(Directive::SCRIPT);
  }
}